<?php

namespace Softlogo\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="shop_address")
 * @ORM\Entity
 */

class Address
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

	/**
	 *@ORM\ManyToOne(targetEntity="AddressType");
	 */
	private $type;

	/**
	 * @var \Softlogo\ShopBundle\Model\CustomerInterface
	 *
	 * @ORM\ManyToOne(targetEntity="Softlogo\ShopBundle\Model\CustomerInterface")
	 */
	private $customer;

	/**
	 * @var \Softlogo\ShopBundle\Model\OrderInterface
	 *
	 * @ORM\ManyToOne(targetEntity="Softlogo\ShopBundle\Model\OrderInterface")
	 * @ORM\JoinColumn(name="order_id", referencedColumnName="id", onDelete="SET NULL")
	 */
	private $order;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    protected $address;

    /**
     * @var string
     *
     * @ORM\Column(name="postalcode", type="string", length=255, nullable=true)
     */
    protected $postalcode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    protected $city;


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
     * Set name
     *
     * @param string $name
     * @return Address
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Address
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set postalcode
     *
     * @param string $postalcode
     * @return Address
     */
    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    /**
     * Get postalcode
     *
     * @return string 
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }


    /**
     * Set type
     *
     * @param \Softlogo\ShopBundle\Entity\AddressType $type
     *
     * @return Address
     */
    public function setType(\Softlogo\ShopBundle\Entity\AddressType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Softlogo\ShopBundle\Entity\AddressType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set customer
     *
     * @param \Softlogo\CustomerBundle\Entity\Customer $customer
     *
     * @return Address
     */
    public function setCustomer(\Softlogo\CustomerBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \Softlogo\CustomerBundle\Entity\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set order
     *
     * @param \Softlogo\ShopBundle\Entity\Basket $order
     *
     * @return Address
     */
    public function setOrder(\Softlogo\ShopBundle\Entity\Basket $order = null)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \Softlogo\ShopBundle\Entity\Basket
     */
    public function getOrder()
    {
        return $this->order;
    }
}
