<?php
/**
 * DELETE THIS FILE BEFORE LIFE
 * This test will used for create simple test page
 * need to be deleted when all tests are finished
*/
use \WebGuy;

class DefaultCest
{

    public function _before()
    {
    }

    public function _after()
    {
    }



    public function tryToSpendCheckout(WebGuy $I){
        \ISM\PageFactory::setGuy($I);
        $I->wantTo('test home page');
        $page = \ISM\PageFactory::getPage('home');
        $page->amOnPage('/electronics/computers/build-your-own/gaming-computer.html');
        $I->click('Customize and Add to Cart');
        $I->wait(3000);
        $I->selectOption("//input[@id='bundle-option*']","54");
        $I->wait(3000);
        //$page->checkBannerRotator();


    }

}