<?php

namespace Softlogo\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShippingOptions
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ShippingOptions
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
     * @var string
     *
     * @ORM\Column(name="pricePerPack", type="decimal")
     */
    private $pricePerPack;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantityInPack", type="integer")
     */
    private $quantityInPack;

    /**
     * @var string
     *
     * @ORM\Column(name="calculationType", type="string", length=255)
     */
    private $calculationType;


	/**
	 * @var \Softlogo\ShopBundle\Model\OrderInterface
	 *
	 * @ORM\ManyToOne(targetEntity="Softlogo\ShopBundle\Model\OrderInterface")
	 */
	private $order;



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
     * @return ShippingOptions
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
     * Set pricePerPack
     *
     * @param string $pricePerPack
     *
     * @return ShippingOptions
     */
    public function setPricePerPack($pricePerPack)
    {
        $this->pricePerPack = $pricePerPack;

        return $this;
    }

    /**
     * Get pricePerPack
     *
     * @return string
     */
    public function getPricePerPack()
    {
        return $this->pricePerPack;
    }

    /**
     * Set quantityInPack
     *
     * @param integer $quantityInPack
     *
     * @return ShippingOptions
     */
    public function setQuantityInPack($quantityInPack)
    {
        $this->quantityInPack = $quantityInPack;

        return $this;
    }

    /**
     * Get quantityInPack
     *
     * @return integer
     */
    public function getQuantityInPack()
    {
        return $this->quantityInPack;
    }

    /**
     * Set calculationType
     *
     * @param string $calculationType
     *
     * @return ShippingOptions
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
     * Set order
     *
     * @param \Softlogo\ShopBundle\Entity\Basket $order
     *
     * @return ShippingOptions
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
