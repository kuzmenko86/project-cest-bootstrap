<?php

class MagentoCest
{

    public function _before()
    {
    }

    public function _after()
    {
    }

    public function tryHomePage(\WebGuy $I)
    {
        \ISM\Pages::setGuy($I);
        /**
         * @var $page \ISM\HomePage
         */
        $page = \ISM\Pages::getPage('home');
        $page->wantTo();
        $page->amOnPage();
        $page->isCurrent();
    }

    public function tryLoginPage(\WebGuy $I)
    {
        \ISM\Pages::setGuy($I);
        /**
         * @var $page \ISM\LoginPage
         */
        \ISM\Pages::getPage('login')
            ->wantTo()
            ->amOnPage()
            ->isCurrent()
            ->login();
    }

    // tests
    public function tryRegistrationPage(\WebGuy $I)
    {
        \ISM\Pages::setGuy($I);
        /**
         * @var $page ISMRegistrationPage
         */
        $page = \ISM\Pages::getPage('login')
            ->wantTo('check login and registration page')
            ->amOnPage()
            ->wait(1000)
            ->click('Register')
            ->getPage('registration')
            ->register()
            ->wait(5000);
    }
}