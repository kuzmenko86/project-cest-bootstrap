<?php
/**
 * This page should contain action which are possible between header and footer block
 * except of check elements presentation
*/
namespace ISM;

class HomePage extends BasePage
{
    protected $_xmlName = 'home';

    public function __construct($xmlName = false)
    {
        if ($xmlName && is_string($xmlName)) {
            $this->_xmlName = $xmlName;
        }

        parent::__construct();
        $this->_pageResource = $this->loadConfig($this->_xmlName);
    }

    public function checkHomePageElements()
    {
        $this->isCurrent();
        return $this;
    }

    public function checkBannerRotator()
    {
        $this->seeElement();
        return $this;


    }




}