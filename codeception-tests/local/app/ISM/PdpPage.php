<?php
namespace ISM;

class PdpPage extends BasePage
{
    protected $_xmlName = 'pdp';

    public function __construct($xmlName = false)
    {
        if ($xmlName && is_string($xmlName)) {
            $this->_xmlName = $xmlName;
        }

        parent::__construct();
        $this->_pageResource = $this->loadConfig($this->_xmlName);
    }

    public function addProductToShoppingCart()
    {
        $this->click($this->pageResource->pageElements->addToCart);
        $page = \ISM\Pages::getPage('shopping_cart');
        return $page;
    }

    public function addConfigurableProductToShoppingCart($link)
    {
        $this->amOnPage("$link");
        //select conf option
        $this->click($this->pageResource->pageElements->addToCart);
        $page = \ISM\Pages::getPage('shopping_cart');
        return $page;
    }

    public function checkRelated()
    {
        return TRUE;
    }

}