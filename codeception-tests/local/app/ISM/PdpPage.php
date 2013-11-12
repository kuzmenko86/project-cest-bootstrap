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


    public function goToConfigurableProduct ()
    {
        $productId = (array)$this->pageResource->entityProductId->id;
        $qtyProductIds = count($productId);

        for ($i = 0; $i < $qtyProductIds; $i++)
        {
            $this->amOnPage("/catalog/product/view/id/$productId[$i]");
            $title = $this->callSeleniumTitle();

            if ($title != $this->baseResource->pageElements->title404)
            {
                return $this;
                break;
            }
        }
    }

    public function addSimpleProductToShoppingCart()
    {
        $this->click($this->pageResource->pageElements->add_to_cart);
        $this->wait(1000);
        $page = $this->getPage('shopping_cart');
        return $page;
    }

    public function addProductToShoppingCart()
    {
        $this->click($this->pageResource->pageElements->add_to_cart);
        $this->wait(1000);
        $page = $this->getPage('shopping_cart');
        $page->isCurrent();
        return $page;
    }

    public function checkRelated()
    {
        return TRUE;
    }

}