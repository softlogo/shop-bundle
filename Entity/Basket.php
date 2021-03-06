<?php

namespace Softlogo\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Softlogo\ShopBundle\Model\CustomerInterface;
use Softlogo\ShopBundle\Model\OrderInterface;
//use Softlogo\ShopBundle\Entity\BasketAddress;
//use Softlogo\CustomerBundle\Entity\SimpleCustomer;

/**
 * Basket
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Softlogo\ShopBundle\Entity\BasketRepository")
 */
class Basket implements OrderInterface, CustomerInterface
{
	public function __toString(){
		return "Koszyk ".$this->id;
	}



	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var \Softlogo\ShopBundle\Model\CustomerInterface
	 *
	 * @ORM\ManyToOne(targetEntity="Softlogo\ShopBundle\Model\CustomerInterface")
	 */
	private $customer;

	/**
	 * @ORM\OneToMany(targetEntity="BasketItem", mappedBy="basket", cascade="persist", orphanRemoval=true)
	 * @ORM\OrderBy({"itemorder" = "ASC"})
	 */
	private $basketItems;


	/**
	 * @ORM\OneToMany(targetEntity="Address", mappedBy="order", cascade="persist")
	 */
	private $addresses;


	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="status", type="boolean", nullable=true)
	 */
	private $status;

	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="paid", type="boolean", nullable=true)
	 */
	private $paid;

	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="isAccount", type="boolean", nullable=true)
	 */
	private $isAccount;

	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="isInvoice", type="boolean", nullable=true)
	 */
	private $isInvoice;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="message", type="text", nullable=true)
	 */
	private $message;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
	 */
	private $firstname;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
	 */
	private $lastname;


	/**
	 * @var string
	 *
	 * @ORM\Column(name="email", type="string", length=255, nullable=true)
	 */

	private $email;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="phone", type="string", length=255, nullable=true)
	 */
	private $phone;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="company", type="string", length=255, nullable=true)
	 */
	private $company;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="nip", type="string", length=255, nullable=true)
	 */
	private $nip;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="regon", type="string", length=255, nullable=true)
	 */
	private $regon;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="password", type="string", length=255, nullable=true)
	 */
	private $password;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="shippingCost", type="decimal", nullable=true)
	 */
	private $shippingCost;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="subTotal", type="decimal", nullable=true)
	 */
	private $subTotal;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="total", type="decimal", nullable=true)
	 */
	private $total;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="shippingMethod", type="string", length=255, nullable=true)
	 */
	private $shippingMethod;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="choicedShippingCost", type="decimal", nullable=true)
	 */
	private $choicedShippingCost;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;



	/**
	 * Get id
	 *
	 * @return integer 
	 */
	public function getTotalValue()
	{
		$totalValue=0;
		foreach ($this->getBasketItems() as $item){
			$totalValue+=$item->getPrice()*$item->getQuantity();
		}
		return $totalValue;
	}

	public function getTotalCount()
	{
		$totalCount=0;
		foreach ($this->getBasketItems() as $item){
			$totalCount+=$item->getQuantity();
		}
		return $totalCount;
	}



	/**
	 * Get id
	 *
	 * @return integer 
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set status
	 *
	 * @param boolean $status
	 * @return Basket
	 */
	public function setStatus($status)
	{
		$this->status = $status;

		return $this;
	}

	/**
	 * Get status
	 *
	 * @return boolean 
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Set paid
	 *
	 * @param boolean $paid
	 * @return Basket
	 */
	public function setPaid($paid)
	{
		$this->paid = $paid;

		return $this;
	}

	/**
	 * Get paid
	 *
	 * @return boolean 
	 */
	public function getPaid()
	{
		return $this->paid;
	}
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->basketItems = new \Doctrine\Common\Collections\ArrayCollection();
		$this->basketAddresses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setCreatedAt(new \DateTime("now"));
	}


	/**
	 * Set customer
	 *
	 * @param \Softlogo\ShopBundle\Model\CustomerInterface $customer
	 * @return Basket
	 */
	public function setCustomer(\Softlogo\ShopBundle\Model\CustomerInterface $customer = null)
	{
		$this->customer = $customer;

		return $this;
	}

	/**
	 * Get customer
	 *
	 * @return \Softlogo\ShopBundle\Model\CustomerInterface 
	 */
	public function getCustomer()
	{
		return $this->customer;
	}

	/**
	 * Add basketItems
	 *
	 * @param \Softlogo\ShopBundle\Entity\BasketItem $basketItems
	 * @return Basket
	 */
	public function addBasketItem(\Softlogo\ShopBundle\Entity\BasketItem $basketItems)
	{
		$basketItems->setBasket($this);
		$this->basketItems[] = $basketItems;

		return $this;
	}

	/**
	 * Remove basketItems
	 *
	 * @param \Softlogo\ShopBundle\Entity\BasketItem $basketItems
	 */
	public function removeBasketItem(\Softlogo\ShopBundle\Entity\BasketItem $basketItems)
	{
		$this->basketItems->removeElement($basketItems);
	}

	/**
	 * Get basketItems
	 *
	 * @return \Doctrine\Common\Collections\Collection 
	 */
	public function getBasketItems()
	{
		return $this->basketItems;
	}

	/**
	 * Set message
	 *
	 * @param string $message
	 *
	 * @return Basket
	 */
	public function setMessage($message)
	{
		$this->message = $message;

		return $this;
	}

	/**
	 * Get message
	 *
	 * @return string
	 */
	public function getMessage()
	{
		return $this->message;
	}


	/**
	 * Set firstname
	 *
	 * @param string $firstname
	 *
	 * @return Basket
	 */
	public function setFirstname($firstname)
	{
		$this->firstname = $firstname;

		return $this;
	}

	/**
	 * Get firstname
	 *
	 * @return string
	 */
	public function getFirstname()
	{
		return $this->firstname;
	}

	/**
	 * Set lastname
	 *
	 * @param string $lastname
	 *
	 * @return Basket
	 */
	public function setLastname($lastname)
	{
		$this->lastname = $lastname;

		return $this;
	}

	/**
	 * Get lastname
	 *
	 * @return string
	 */
	public function getLastname()
	{
		return $this->lastname;
	}

	/**
	 * Set email
	 *
	 * @param string $email
	 *
	 * @return Basket
	 */
	public function setEmail($email)
	{
		$this->email = $email;

		return $this;
	}

	/**
	 * Get email
	 *
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Set phone
	 *
	 * @param string $phone
	 *
	 * @return Basket
	 */
	public function setPhone($phone)
	{
		$this->phone = $phone;

		return $this;
	}

	/**
	 * Get phone
	 *
	 * @return string
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * Set company
	 *
	 * @param string $company
	 *
	 * @return Basket
	 */
	public function setCompany($company)
	{
		$this->company = $company;

		return $this;
	}

	/**
	 * Get company
	 *
	 * @return string
	 */
	public function getCompany()
	{
		return $this->company;
	}

	/**
	 * Set nip
	 *
	 * @param string $nip
	 *
	 * @return Basket
	 */
	public function setNip($nip)
	{
		$this->nip = $nip;

		return $this;
	}

	/**
	 * Get nip
	 *
	 * @return string
	 */
	public function getNip()
	{
		return $this->nip;
	}

	/**
	 * Set regon
	 *
	 * @param string $regon
	 *
	 * @return Basket
	 */
	public function setRegon($regon)
	{
		$this->regon = $regon;

		return $this;
	}

	/**
	 * Get regon
	 *
	 * @return string
	 */
	public function getRegon()
	{
		return $this->regon;
	}

	/**
	 * Set isAccount
	 *
	 * @param boolean $isAccount
	 *
	 * @return Basket
	 */
	public function setIsAccount($isAccount)
	{
		$this->isAccount = $isAccount;

		return $this;
	}

	/**
	 * Get isAccount
	 *
	 * @return boolean
	 */
	public function getIsAccount()
	{
		return $this->isAccount;
	}

	/**
	 * Set isInvoice
	 *
	 * @param boolean $isInvoice
	 *
	 * @return Basket
	 */
	public function setIsInvoice($isInvoice)
	{
		$this->isInvoice = $isInvoice;

		return $this;
	}

	/**
	 * Get isInvoice
	 *
	 * @return boolean
	 */
	public function getIsInvoice()
	{
		return $this->isInvoice;
	}

	/**
	 * Set password
	 *
	 * @param string $password
	 *
	 * @return Basket
	 */
	public function setPassword($password)
	{
		$this->password = $password;

		return $this;
	}

	/**
	 * Get password
	 *
	 * @return string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Add address
	 *
	 * @param \Softlogo\ShopBundle\Entity\Address $address
	 *
	 * @return Basket
	 */
	public function addAddress(\Softlogo\ShopBundle\Entity\Address $address)
	{
		$address->setOrder($this);
		$this->addresses[] = $address;

		return $this;
	}

	/**
	 * Remove address
	 *
	 * @param \Softlogo\ShopBundle\Entity\Address $address
	 */
	public function removeAddress(\Softlogo\ShopBundle\Entity\Address $address)
	{
		$this->addresses->removeElement($address);
	}

	/**
	 * Get addresses
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getAddresses()
	{
		return $this->addresses;
	}

	public function removeAddresses(){
		if (is_array($this->addresses) || is_object($this->addresses)){
			foreach($this->addresses as $address){
				$this->removeAddress($address);
			} 
		}
	}


	public function updateFromCustomer(\Softlogo\ShopBundle\Model\CustomerInterface $customer)
	{

		$this->setFirstname($customer->getFirstname());
		$this->setLastname($customer->getLastname());
		$this->setEmail($customer->getEmail());
		$this->setPhone($customer->getPhone());
		$this->setCompany($customer->getCompany());
		$this->setNip($customer->getNip());
		$this->setRegon($customer->getRegon());

		//$this->removeAddresses();
		$this->getAddresses()->clear();

		foreach($customer->getAddresses() as $address){
			$this->addAddress($address);
		} 
	}





	/**
	 * Get shipping
	 *
	 * @return \Softlogo\ShopBundle\Entity\Shipping
	 */
	public function getShippingCost()
	{
		$weight=0;
		$price=0;
		if($this->getBasketItems()->count()>0){
			foreach ($this->getBasketItems() as $item){
				$product=$item->getProduct();
				$calculation=$product->getShippingCalculationType();
				if($calculation=="Cena za wagę"){
					$weight+=$product->getWeight()*$item->getQuantity();
				}
			}
			$lastPrice=$calculation->getWeights()->last()->getPrice();
			$lastWeight=$calculation->getWeights()->last()->getMaxWeight();
			$restWeight=$weight % $lastWeight; 
			$restPrice=0;

			foreach($calculation->getWeights() as $rate){
				if($restWeight>=$rate->getMinWeight() && $restWeight<=$rate->getMaxWeight())
					$restPrice=$rate->getPrice();
			}
			$countMaxPrices=floor($weight/$lastWeight);
			$price=$countMaxPrices*$lastPrice+$restPrice;



		}

		return $price;

	}

	/**
	 * Set shippingCost
	 *
	 * @param string $shippingCost
	 *
	 * @return Basket
	 */
	public function setShippingCost($shippingCost)
	{
		$this->shippingCost = $shippingCost;

		return $this;
	}

	/**
	 * Set subTotal
	 *
	 * @param string $subTotal
	 *
	 * @return Basket
	 */
	public function setSubTotal($subTotal)
	{
		$this->subTotal = $subTotal;

		return $this;
	}

	/**
	 * Get subTotal
	 *
	 * @return string
	 */
	public function getSubTotal()
	{
		$subTotal=0;
		foreach ($this->getBasketItems() as $item){
			$subTotal+=$item->getPrice()*$item->getQuantity();
		}

		return $subTotal;
	}

	/**
	 * Set total
	 *
	 * @param string $total
	 *
	 * @return Basket
	 */
	public function setTotal($total)
	{
		$this->total = $total;

		return $this;
	}

	/**
	 * Get total
	 *
	 * @return string
	 */
	public function getTotal()
	{
		return $this->getSubTotal()+$this->getShippingCost();
	}

	/**
	 * Set shippingMethod
	 *
	 * @param string $shippingMethod
	 *
	 * @return Basket
	 */
	public function setShippingMethod($shippingMethod)
	{
		$this->shippingMethod = $shippingMethod;

		return $this;
	}

	/**
	 * Get shippingMethod
	 *
	 * @return string
	 */
	public function getShippingMethod()
	{
		return $this->shippingMethod;
	}

	/**
	 * Set choicedShippingCost
	 *
	 * @param string $choicedShippingCost
	 *
	 * @return Basket
	 */
	public function setChoicedShippingCost($choicedShippingCost)
	{
		$this->choicedShippingCost = $choicedShippingCost;

		return $this;
	}

	/**
	 * Get choicedShippingCost
	 *
	 * @return string
	 */
	public function getChoicedShippingCost()
	{
		if($this->getShippingMethod()=="kurier"){
			return $this->getShippingCost();
		}else return 0;
	}

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Basket
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
