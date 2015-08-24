<?php

namespace Softlogo\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShippingWeight
 *
 * @ORM\Table(name="shipping_weight")
 * @ORM\Entity
 */
class ShippingWeight
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
     * @ORM\Column(name="minWeight", type="decimal")
     */
    private $minWeight;

    /**
     * @var string
     *
     * @ORM\Column(name="maxWeight", type="decimal")
     */
    private $maxWeight;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal")
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="itemorder", type="integer")
     */
    private $itemorder;

	/**
	 *
	 * @ORM\ManyToOne(targetEntity="ShippingCalculationType")
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
     * Set minWeight
     *
     * @param string $minWeight
     *
     * @return ShippingWeightCost
     */
    public function setMinWeight($minWeight)
    {
        $this->minWeight = $minWeight;

        return $this;
    }

    /**
     * Get minWeight
     *
     * @return string
     */
    public function getMinWeight()
    {
        return $this->minWeight;
    }

    /**
     * Set maxWeight
     *
     * @param string $maxWeight
     *
     * @return ShippingWeightCost
     */
    public function setMaxWeight($maxWeight)
    {
        $this->maxWeight = $maxWeight;

        return $this;
    }

    /**
     * Get maxWeight
     *
     * @return string
     */
    public function getMaxWeight()
    {
        return $this->maxWeight;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return ShippingWeightCost
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
     * Set itemorder
     *
     * @param integer $itemorder
     *
     * @return ShippingWeightCost
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

    /**
     * Set calculationType
     *
     * @param \Softlogo\ShopBundle\Entity\ShippingCalculationType $calculationType
     *
     * @return ShippingWeight
     */
    public function setCalculationType(\Softlogo\ShopBundle\Entity\ShippingCalculationType $calculationType = null)
    {
        $this->calculationType = $calculationType;

        return $this;
    }

    /**
     * Get calculationType
     *
     * @return \Softlogo\ShopBundle\Entity\ShippingCalculationType
     */
    public function getCalculationType()
    {
        return $this->calculationType;
    }
}
