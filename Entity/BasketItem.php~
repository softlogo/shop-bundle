<?php

namespace Softlogo\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//use Softlogo\ShopBundle\Entity\SimpleProduct as Product;
use Softlogo\ShopBundle\Model\ProductInterface;

/**
 * BasketItem
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class BasketItem
{
	public function __toString(){
		return $this->getProduct()? $this->getProduct()->getName(). ", ".$this->getPrice()."PLN".", ".$this->getQuantity()."szt.": $this->getDescription();
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
     * @var integer
     *
     * @ORM\Column(name="itemorder", type="integer", nullable=true)
     */
    private $itemorder;


	/**
	 * @var \Basket
	 *
	 * @ORM\ManyToOne(targetEntity="Basket")
	 */
	private $basket;

	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Softlogo\ShopBundle\Model\ProductInterface")
	 */
	private $product;


	/**
	 * @var string
	 *
	 * @ORM\Column(name="product_code", type="string", length=255, nullable=true)
	 */
	private $productCode;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal")
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;


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
     * Set productCode
     *
     * @param string $productCode
     * @return BasketItem
     */
    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;

        return $this;
    }

    /**
     * Get productCode
     *
     * @return string 
     */
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return BasketItem
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return BasketItem
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return BasketItem
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set basket
     *
     * @param \Softlogo\ShopBundle\Entity\Basket $basket
     * @return BasketItem
     */
    public function setBasket(\Softlogo\ShopBundle\Entity\Basket $basket = null)
    {
        $this->basket = $basket;

        return $this;
    }

    /**
     * Get basket
     *
     * @return \Softlogo\ShopBundle\Entity\Basket 
     */
    public function getBasket()
    {
        return $this->basket;
    }

    /**
     * Set product
     *
     * @param \Softlogo\ShopBundle\Model\ProductInterface $product
     * @return BasketItem
     */
    public function setProduct(\Softlogo\ShopBundle\Model\ProductInterface $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \Softlogo\ShopBundle\Model\ProductInterface 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set itemorder
     *
     * @param integer $itemorder
     * @return BasketItem
     */
    public function setItemorder($itemorder)
    {
        $this->itemorder = $itemorder;

        return $this;
    }

    /**
     * Get itemorder
     *
     * @return integer 
     */
    public function getItemorder()
    {
        return $this->itemorder;
    }
}
