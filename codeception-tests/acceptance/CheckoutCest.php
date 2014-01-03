<?php

class CheckoutCest {

    public function _before()
    {
    }

    public function _after()
    {
    }

    public  function tryToSpendCheckout(\WebGuy $I)
    {
        \ISM\PageFactory::setGuy($I);
        $page = \ISM\PageFactory::getPage('pdp');
        $page->wantTo('make a purchase on Default magento environment');
        $page->goToConfigurableProduct();
        $page->selectOption($page->pageResource->pageElements->conf_option_attribute,$page->pageResource->pageElements->conf_option_attribute_value);
        $page->addProductToShoppingCart()//get shop cart
            ->goToCheckout() //
            ->spendCheckoutMethod("Guest")
            ->spendStepShipping()
            ->spendStepPaymentInformation()
            ->spendOrderReview();

    }


}