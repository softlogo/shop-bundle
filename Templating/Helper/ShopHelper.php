<?php

namespace Softlogo\ShopBundle\Templating\Helper;

use Symfony\Component\Templating\Helper\Helper;
use Symfony\Component\Templating\EngineInterface;

class ShopHelper extends Helper
{
	protected $templating;

	public function __construct(EngineInterface $templating)
	{
		$this->templating  = $templating;
	}


	public function topBasket($parameters)
	{
		return $this->templating->render("SoftlogoShopBundle:Basket:!topbasket.html.twig", $parameters);
	}


	public function getName()
	{
		return 'shop';
	}
}
