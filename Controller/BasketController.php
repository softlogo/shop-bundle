<?php

namespace Softlogo\ShopBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Softlogo\ShopBundle\Entity\Basket;

/**
 * Basket controller.
 *
 */
class BasketController extends Controller
{
	/**
	 * Wyświetla koszyk pobierając zmienną sesji lub ustawiając i tworzac nowy.
	 *
	 */
	public function basketAction(Request $request)
	{
		$bf=$this->get('softlogo_shop');	
		$bf->initBasketForm($request);

		if($bf->isToOrderClicked()==true){
			return $this->redirectToRoute('softlogo_shop.order');


		}

		return $bf->renderBasket();


	}

	public function orderAction(Request $request){
		$bf=$this->get('softlogo_shop');	


		$bf->initBasketForm($request);

		$bf->insertAddresses();

		if($bf->isOrderClicked()==true){
			if($bf->getBasket()->getIsAccount()==true){
				$bf->createCustomer();
			}

			return $bf->renderSummary();
		}

		return $bf->renderOrder();

	}

}
