<?php
// src/Softlogo/ShopBundle/Model/CustomerInterface.php

namespace Softlogo\ShopBundle\Model;

/**
 * An interface that the invoice Subject object should implement.
 * In most circumstances, only a single object should implement
 * this interface as the ResolveTargetEntityListener can only
 * change the target to a single object.
 */
interface CustomerInterface
{
    // List any additional methods that your InvoiceBundle
    // will need to access on the subject so that you can
    // be sure that you have access to those methods.

    /**
     * @return string
     */
    public function getFirstname();

    //public function setFirstname();

    /**
     * @return string
     */
    public function getLastname();

    //public function setLastname();

    /**
     * @return string
     */
    public function getEmail();

    //public function setEmail();



    public function getPhone();
    public function getCompany();
    public function getNip();
    public function getRegon();

}
