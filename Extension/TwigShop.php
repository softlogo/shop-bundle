<?php

namespace Softlogo\ShopBundle\Extension;

class TwigShop extends \Twig_Extension{

	private $shop;

	protected $container;

	/**
	 * Constructor.
	 *
	 * @param ContainerInterface $container
	 */
	public function __construct($container, $em, $basketFactory)
	{
		$this->container = $container;
		$this->em = $em;
		$this->basketFactory = $basketFactory;
	}

	public function getBasket(){
		return $this->basketFactory->getBasket();
	}

	public function getName()
	{
		return 'softlogo_shop';
	}

	public function getFunctions()
	{
		return array(
			'render_shop_top_basket' => new \Twig_Function_Method($this, 'getTopBasket' ,array('is_safe' => array('html'))),
		);
	}

	public function getTopBasket($parameters = array())
	{
		$basket= $this->getBasket();
		$parameters = $parameters + array(
			'basket' => $basket,
			//'category' => $parameters['category'],
		);

		return $this->container->get('softlogo.ShopHelper')->topBasket($parameters);
	}


}
