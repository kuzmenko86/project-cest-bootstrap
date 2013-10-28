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

    // tests
    public function tryToTest35699(WebGuy $I) {

        \ISM\Pages::setGuy($I);
        $I->wantTo('test home page');
        $page = \ISM\Pages::getPage('home');
        $page->amOnPage();
        $page->checkBannerRotator();

    }

    private function tryToMakeOrder(WebGuy $I){
        $I->wantTo('make a purchase on Defoult magento environment');

        $I->amOnPage("/apparel/classic-jeans.html");

        $I->click('Add to Cart');
        $I->click('Proceed to Checkout');
        $I->checkOption('login:guest');
        $I->click('Continue');

        $I->click("//div[@id='billing-buttons-container']/button");//continue button on checkout
        $I->see('This is a required field.');
        $I->fillField("//input[@id='billing:firstname']","Volodymyr");
        $I->fillField("//input[@id='billing:lastname']","Kuzmenko");
        $I->fillField("//input[@id='billing:email']","v.kuzmenko@ism-ukraine.com");
        $I->fillField("//input[@id='billing:street1']","my test address");
        $I->fillField("//input[@id='billing:city']","Zhitomir");
        $I->fillField("//input[@id='billing:postcode']","1911JA");
        $I->fillField("//input[@id='billing:telephone']","0855555555");
        $I->click("//div[@id='billing-buttons-container']/button");//continue button on checkout

        $I->checkOption('billing:use_for_shipping_yes');
        sleep(1);
        $I->click("//div[@id='shipping-buttons-container']/button");//continue button on checkout
        //$I->click(".//*[@id='shipping-buttons-container']/button");//continue button on checkout

        sleep(1);
        $I->click("//div[@id='shipping-method-buttons-container']/button");//continue button on checkout
        //$I->checkOption('s_method_freeshipping_freeshipping');

        sleep(1);
        $I->checkOption('p_method_checkmo');
        $I->click("//div[@id='payment-buttons-container']/button");//continue button on checkout

        sleep(1);
        $I->click('Place Order');


        sleep(10);

        //$I->click('');

    }

}