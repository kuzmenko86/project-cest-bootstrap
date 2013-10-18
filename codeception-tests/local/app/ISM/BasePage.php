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

    /**
     * @return bool|BasePage|HomePage|LoginPage|PdpPage|RegistrationPage|ShoppingCartPage
     */
    public function goToLoginPage()
    {
        $this->click($this->baseResource->pageElements->link_to_login);
        $this->wait(2000);
        return $this->getPage('login');

    }

    /**
     * @return RegistrationPage
     */
    public function goRegistrationPage(&$page)
    {
        $this->click($this->baseResource->pageElements->link_to_gegister);
        $this->wait(2000);
        $page = $this->getPage('registration');
        return $page;

    }

}