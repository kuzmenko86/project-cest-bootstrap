<?php

class RegisterCest {

    public function _before()
    {
    }

    public function _after()
    {
    }

    public function tryToRegister(\WebGuy $I)
    {
        \ISM\Pages::setGuy($I);

        $I->wantTo('Create new user on website');
        $page = \ISM\Pages::getPage('home');
        $page->amOnPage();
        $page->goRegistrationPage();



        $page->addProductToShoppingCart()
            ->goToCheckout();
        $I->wait(5000);

    }


}