<?php

namespace Softlogo\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShippingCalculationType
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ShippingCalculationType
{

	public function __toString(){
		return $this->getName();
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


	/**
	 * @ORM\OneToMany(targetEntity="ShippingWeight", mappedBy="calculationType", cascade="persist")
     */
    private $weights;

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
     *
     * @return ShippingCalculationType
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
     * Set description
     *
     * @param string $description
     *
     * @return ShippingCalculationType
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
     * Constructor
     */
    public function __construct()
    {
        $this->weights = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add weight
     *
     * @param \Softlogo\ShopBundle\Entity\ShippingWeight $weight
     *
     * @return ShippingCalculationType
     */
    public function addWeight(\Softlogo\ShopBundle\Entity\ShippingWeight $weight)
    {
        $this->weights[] = $weight;

        return $this;
    }

    /**
     * Remove weight
     *
     * @param \Softlogo\ShopBundle\Entity\ShippingWeight $weight
     */
    public function removeWeight(\Softlogo\ShopBundle\Entity\ShippingWeight $weight)
    {
        $this->weights->removeElement($weight);
    }

    /**
     * Get weights
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWeights()
    {
        return $this->weights;
    }
}
