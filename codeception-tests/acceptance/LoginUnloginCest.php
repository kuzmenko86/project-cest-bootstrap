<?php
use \WebGuy;

class LoginUnloginCest
{

    public function _before()
    {
    }

    public function _after()
    {
    }

    // tests
    public function tryToLoginUnlogin(WebGuy $I)
    {
        \ISM\Pages::setGuy($I);

        $I->wantToTest('login on website');
        $page = \ISM\Pages::getPage('home');
        $page->amOnPage();
        $page->isCurrent();
        $page->goToLoginPage($page)
            ->checkForLoginFormPresent()
            ->checkRequireField()
            ->login($page)
            ->unlogin($page);






    }

}