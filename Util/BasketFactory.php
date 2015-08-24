<?php
namespace Softlogo\ShopBundle\Util;

use Softlogo\ShopBunde\Model\ProductInterface;
use Softlogo\ProductBunde\Entity\Product;
use Softlogo\ShopBunde\Entity\Basket;
use Softlogo\ShopBunde\Entity\BasketItem;
use Softlogo\ShopBunde\Form\BasketItemType;
use Softlogo\ShopBunde\Entity\AddressType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Bundle\DoctrineBundle\Registry;  
use Symfony\Component\Form\FormFactoryInterface; 
use Symfony\Component\HttpFoundation\RedirectResponse; 
use Symfony\Component\Routing\RouterInterface;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use FOS\UserBundle\Model\UserManager;
use Symfony\Component\Security\Core\SecurityContext;

class BasketFactory{

	protected $doctrine;
	protected $formFactory;
	protected $router;
	protected $userManager;
	protected $basket;
	protected $product;
	protected $basketForm;
	protected $productForm;
	protected $em;
	protected $isValid=false;
	protected $isToOrderClicked;
	protected $isOrderClicked=false;
	protected $request;
	protected $security;
	//protected $customer;

	public function __construct(
		Registry $doctrine, 
		FormFactoryInterface $formFactory,
		RouterInterface $router,	
		EngineInterface $templating,
		UserManager $userManager,
		SecurityContext $security
	){
		$this->doctrine    = $doctrine;
		$this->router    = $router;
		$this->formFactory = $formFactory;
		$this->em=$doctrine->getEntityManager();
		$this->templating = $templating;
		$this->userManager = $userManager;
		$this->security = $security;
	}

	public function setProduct($product){
		$this->product=$product;	
	}
	public function getProduct(){
		return $this->product;	
	}


	
	public function initProductForm(Request $request,$product){
		$this->request=$request;
		$item = new \Softlogo\ShopBundle\Entity\BasketItem();
		$item->setPrice($product->getPrice());
		$item->setQuantity(1);
		$item->setProduct($product);
		$item->setBasket($this->getBasket($request));
		$this->productForm = $this->formFactory->create(new \Softlogo\ShopBundle\Form\BasketItemType(), $item);  
		$this->productForm->handleRequest($request);
		if ($this->productForm->isValid()) {

			if ($this->productForm->get('submit')->isClicked()) {
				$this->em->persist($item);
				$this->em->flush();
				$this->isValid=true;
			}

		}
	}

	public function getProductForm(){
		return $this->productForm->createView();
	}



	public function isValid(){
		return $this->isValid;	
	}

	public function isToOrderClicked(){
		return $this->isToOrderClicked;	
	}

	public function isOrderClicked(){
		return $this->isOrderClicked;	
	}

	public function createCustomer(){
		$order=$this->getBasket();
		$um=$this->userManager;
		if($user=$um->findUserBy(array('username'=>$order->getEmail()))){
		}else{
			$user = $um->createUser();
		}
		$user->updateFromOrder($order);
		$user->setPlainPassword($order->getPassword());
		$user->setUsername($order->getEmail());
		$user->addCustomerOrder($order);
		$this->userManager->updateUser($user);
		//$this->customer=$user;
	
	}

	public function isCustomerLogged(){
		if ($this->security->isGranted('IS_AUTHENTICATED_FULLY')) {
			return true;
		}else return false;
	}


	public function fillOrder(){
		//echo "fillorder ";
		$order=$this->getBasket();
		$customer=$this->security->getToken()->getUser();
		$order->updateFromCustomer($customer);
		$customer->addCustomerOrder($order);
		
		$this->em->persist($order);
		$this->em->flush();
		//$this->basketForm=$this->setBasketForm();
	
	}

	public function getBasket(){
		//echo "getBasket ";
		$session = $this->request->getSession();
		if($session->get('basket_id')==false){
			$basket=new \Softlogo\ShopBundle\Entity\Basket();
			$this->em->persist($basket);
			$this->em->flush();
			$session->set('basket_id',$basket->getId());
		};
		$basketId=$session->get('basket_id');
		$basket = $this->em->getRepository('SoftlogoShopBundle:Basket')->find($basketId);

		return $basket;
	}

	public function getBasketForm(){
		$basketForm = $this->formFactory->create(new \Softlogo\ShopBundle\Form\BasketType(), $this->getBasket());
		return $basketForm;

	}

	public function insertAddresses(){
			if($this->basket->getAddresses()->count()==0){

			$shippingAddress=new  \Softlogo\ShopBundle\Entity\Address();
			$invoiceAddress=new  \Softlogo\ShopBundle\Entity\Address();
			$saType = $this->em->getRepository('SoftlogoShopBundle:AddressType')->findOneByName("Shipping");
			$iaType = $this->em->getRepository('SoftlogoShopBundle:AddressType')->findOneByName("Invoice");
			$shippingAddress->setType($saType);
			$invoiceAddress->setType($iaType);
		
			$this->basket->addAddress($shippingAddress);
			$this->basket->addAddress($invoiceAddress);
		}

	
	}

	public function initBasketForm(Request $request){

		$this->request=$request;
		$this->basket=$this->getBasket();

		if($this->isCustomerLogged()){
			$this->fillOrder();
		}

		$basketForm=$this->getBasketForm();

		$basketForm->handleRequest($this->request);

		if ($basketForm->isValid()) {

			if ($basketForm->get('submit')->isClicked()) {
				$this->em->persist($this->basket);
				$this->em->flush();
			}

			if ($basketForm->get('submit2')->isClicked()) {
				$this->em->persist($this->basket);
				$this->em->flush();
				$this->isToOrderClicked=true;
			}

			if ($basketForm->get('submit3')->isClicked()) {
				$this->em->persist($this->basket);
				$this->em->flush();
				$this->isOrderClicked=true;
			}
		}


	}
	public function renderOrder(){

		//echo "renderorder ";

		return $this->templating->renderResponse(  
			'SoftlogoShopBundle:Basket:order.html.twig',
			array(
				'basket' => $this->getBasket(),
				'form'   => $this->getBasketForm()->createView(),
			)
		);
	}

	public function renderBasket(){

		return $this->templating->renderResponse(  
			'SoftlogoShopBundle:Basket:basket.html.twig',
			array(
				'basket'      => $this->getBasket(),
				'form'   => $this->getBasketForm()->createView(),
			)
		);
	}

	public function renderSummary(){


		return $this->templating->renderResponse(  
			'SoftlogoShopBundle:Basket:summary.html.twig',
			array(
				'basket' => $this->getBasket(),
			)
		);
	}


}








