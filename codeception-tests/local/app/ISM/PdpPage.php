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

    /**
     * @param $page
     * @return ShoppingCartPage
     */
    public function addSimpleProductToShoppingCart(&$page)
    {
        $this->click($this->pageResource->pageElements->add_to_cart);
        $this->wait(1);
        $page = $this->getPage('shopping_cart');
        return $page;
    }

    /**
     * adding product to shopping cart and check if it present on the shopping cart product list
     * @return ShoppingCartPage
     */
    public function addProductToShoppingCart()
    {
        $productTitle = $this->grabTextFrom($this->pageResource->pageElements->product_title);

        $this->click($this->pageResource->pageElements->add_to_cart);
        $this->wait(1);
        $page = $this->getPage('shopping_cart');
        $page->isCurrent();
        $page->see($productTitle);
        return $page;
    }

    public function checkRelated()
    {
        return TRUE;
    }

}