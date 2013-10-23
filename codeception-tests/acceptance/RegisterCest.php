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
        $page->goRegistrationPage($page) // $page no is variable RegistrationPage class
            ->isCurrent()
            ->checkForAllFormElementsPresent()
            ->checkValidationMessage()
            ->checkInvalidEmail()
            ->makeRegister();

        $pageMyAccount = \ISM\Pages::getPage('my_account');
        if ((string)$I->grabFromCurrentUrl() == $page->baseResource->projectSettings->url.$pageMyAccount->pageResource->codeception->amonpage)    //compare url
        {
            $page = \ISM\Pages::getPage('my_account');
            $page->isCurrent();
        }
        else
        {
            //grab error text
            $page = \ISM\Pages::getPage('back_office');
            $page->amOnPage();
            $page->loginToBO();
            $page->deleteCustomer();
            $page = \ISM\Pages::getPage('registration');
            $page->amOnPage();
            $page->makeRegister();
        }

    }

}