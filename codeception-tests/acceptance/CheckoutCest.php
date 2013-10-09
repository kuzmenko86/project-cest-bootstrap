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
        \ISM\Pages::setGuy($I);
        /**
         * @var $page \ISM\HomePage
         */
        $I->wantTo('make a purchase on Default magento environment');
        $page = \ISM\Pages::getPage('pdp');
        $page->amOnPage();
        $page->addProductToShoppingCart()
            ->goToCheckout();
        $I->wait(5000);



        //$page = \ISM\Pages::getPage('shopping_cart');

        //$page->amOnPage();
        //$page->isCurrent();
    }


}