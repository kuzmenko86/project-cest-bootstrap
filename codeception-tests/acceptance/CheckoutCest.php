<?php

class CheckoutCest {

    public function _before()
    {
    }

    public function _after()
    {
    }

    public function tryToSpendCheckout(\WebGuy $I)
    {
        \ISM\PageFactory::setGuy($I);
        $I->wantTo('make a purchase on Default magento environment');
        $page = \ISM\PageFactory::getPage('pdp');
        $page->goToConfigurableProduct();
        $I->selectOption(
            $page->pageResource->pageElements->conf_option_attribute,
            $page->pageResource->pageElements->conf_option_attribute_value);
        $page->addProductToShoppingCart()
            ->goToCheckout()
            ->spendCheckoutAsGuest();

    }


}