<?php
namespace ISM;
/**
 * Class BasePage
 * @property SimpleXMLElement pageResource
 * @property SimpleXMLElement baseResource
 */

class BasePage extends AbstractPage
{
    private $_baseName = 'page';
    protected $_xmlFullName = '';

    public function __construct($xmlName = false)
    {
        if ($xmlName && is_string($xmlName)) {
            $this->_baseName = $xmlName;
        }
        $this->_baseResource = $this->loadConfig($this->_baseName);
    }

    public function isCurrent()
    {
        $this->see();
        $this->seeInTitle();
        return $this;
    }

    public function goToLoginPage()
    {
        $this->click($this->baseResource->pageElements->link_to_login);
        return $this->getPage('login');

    }

    public function goRegistrationPage()
    {
        $this->click($this->baseResource->pageElements->link_to_gegister);
        return $this->getPage('registration');

    }

}