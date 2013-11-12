<?php
use \WebGuy;
/**
 * test will go from page to page and check for elements present on page
 */
class CheckPagesElementsCest
{

    public function _before()
    {
    }

    public function _after()
    {
    }

    // tests
    public function tryToTestElementsPresenceHomePage(WebGuy $I) {
        \ISM\PageFactory::setGuy($I);
        $I->wantToTest('elements presence on Home page');
        $page = \ISM\PageFactory::getPage('home');
        $page->amOnPage();
        $page->seeElement();
    }

    public function tryToTestElementsPresenceLogin(WebGuy $I) {
        \ISM\PageFactory::setGuy($I);
        $I->wantToTest('elements presence on Login page');
        $page = \ISM\PageFactory::getPage('login');
        $page->amOnPage();
        $page->seeElement();
    }

    public function tryToTestElementsPresenceRegistration(WebGuy $I) {
        \ISM\PageFactory::setGuy($I);
        $I->wantToTest('elements presence on Registration page');
        $page = \ISM\PageFactory::getPage('registration');
        $page->amOnPage();
        $page->seeElement();
    }
//not done
    protected  function tryToTestElementsPresenceSearch(WebGuy $I) {
        \ISM\PageFactory::setGuy($I);
        $I->wantToTest('elements presence on search page');
        $page = \ISM\PageFactory::getPage('search');
        $page->amOnPage();
        $page->seeElement();
    }

    protected function tryToTestElementsPresencePDP(WebGuy $I) {
        \ISM\PageFactory::setGuy($I);
        $I->wantToTest('elements presence on product detail page');
        $page = \ISM\PageFactory::getPage('pdp');
        $page->amOnPage();
        $page->seeElement();
    }

}