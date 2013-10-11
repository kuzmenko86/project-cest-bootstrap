<?php

class BachOfficeCest {

    public function _before()
    {
    }

    public function _after()
    {
    }

    public function tryToMakeActionOnBo(\WebGuy $I)
    {
        \ISM\Pages::setGuy($I);

        $I->wantTo('DeleteCustomer');
        $page = \ISM\Pages::getPage('back_office');
        $page->amOnPage();
        $page->loginToBO();
        $page->deleteCustomer();
        $page->wait(5000);

    }


}
