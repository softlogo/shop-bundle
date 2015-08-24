<?php

namespace Softlogo\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shipping
 *
 * @ORM\Table(name="shipping")
 * @ORM\Entity
 */
class Shipping
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="weight", type="decimal")
     */
    private $weight;

	/**
	 *
	 * @ORM\ManyToOne(targetEntity="ShippingPack")
	 */
	private $package;

    /**
     * @var string
     *
     * @ORM\Column(name="calculationType", type="string", length=255)
     */

    private $calculationType;


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
     * Set weight
     *
     * @param string $weight
     *
     * @return Shipping
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set calculationType
     *
     * @param string $calculationType
     *
     * @return Shipping
     */
    public function setCalculationType($calculationType)
    {
        $this->calculationType = $calculationType;

        return $this;
    }

    /**
     * Get calculationType
     *
     * @return string
     */
    public function getCalculationType()
    {
        return $this->calculationType;
    }

    /**
     * Set package
     *
     * @param \Softlogo\ShopBundle\Entity\ShippingPack $package
     *
     * @return Shipping
     */
    public function setPackage(\Softlogo\ShopBundle\Entity\ShippingPack $package = null)
    {
        $this->package = $package;

        return $this;
    }

    /**
     * Get package
     *
     * @return \Softlogo\ShopBundle\Entity\ShippingPack
     */
    public function getPackage()
    {
        return $this->package;
    }

}
