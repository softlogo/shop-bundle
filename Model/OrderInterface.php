<?php

namespace Softlogo\ShopBundle\Model;

interface OrderInterface
{
    /**
     * @return string
     */
    public function getTotalValue();

}
