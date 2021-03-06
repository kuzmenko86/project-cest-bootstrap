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
        \ISM\PageFactory::setGuy($I);

        $I->wantTo('Create new user on website');
        $page = \ISM\PageFactory::getPage('home');
        $page->amOnPage();
        $page->goRegistrationPage() // $page no is variable RegistrationPage class
            ->checkForAllFormElementsPresent()
            ->checkValidationMessage()
            ->checkInvalidEmail()
            ->makeRegister();

        $pageMyAccount = \ISM\PageFactory::getPage('my_account');
        if ((string)$I->grabFromCurrentUrl() ==  $pageMyAccount->pageResource->codeception->amonpage)    //compare url
        {
            $page = \ISM\PageFactory::getPage('my_account');
            $page->isCurrent();
        } else {
            //grab error text
            $page->see($page->pageResource->pageElements->error_for_already_existing_account);
            $page = \ISM\PageFactory::getPage('back_office');
            $page->amOnPage();
            $page->loginToBO();
            $page->deleteCustomer();
            $page = \ISM\PageFactory::getPage('registration');
            $page->amOnPage();
            $page->makeRegister();
            $page = \ISM\PageFactory::getPage('my_account');
            $page->isCurrent();

        }

    }

}