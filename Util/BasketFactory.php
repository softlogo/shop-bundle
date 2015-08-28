<?php
namespace Softlogo\ShopBundle\Util;

use Softlogo\ShopBunde\Entity\Basket;
use Doctrine\Bundle\DoctrineBundle\Registry;  
use Symfony\Component\HttpFoundation\Session\Session;

class BasketFactory{

	protected $em;
	protected $session;

	public function __construct(
		Registry $doctrine, 
		Session $session
	){
		$this->em=$doctrine->getEntityManager();
		$this->session = $session;

	}


	public function getBasket(){
		//echo "getBasket ";
		$session = $this->session;
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



}








