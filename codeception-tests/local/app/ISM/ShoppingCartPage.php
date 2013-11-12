<?php
namespace ISM;

class ShoppingCartPage extends BasePage
{
    protected $_xmlName = 'shopping_cart';

    public function __construct($xmlName = false)
    {
        if ($xmlName && is_string($xmlName)) {
            $this->_xmlName = $xmlName;
        }

        parent::__construct();
        $this->_pageResource = $this->loadConfig($this->_xmlName);
    }

    public function goToCheckout()
    {

        $this->click($this->pageResource->pageElements->go_to_checkout);

    }

}