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
    public function goToLoginPage(&$page)
    {
        $this->click($this->baseResource->pageElements->link_to_login);
        $this->wait(2000);

        $page = $this->getPage('login');
        $page->isCurrent();
        return $page;

    }

    /**
     * @return RegistrationPage
     */
    public function goRegistrationPage(&$page)
    {
        $this->click($this->baseResource->pageElements->link_to_gegister);
        $this->wait(2000);
        $page = $this->getPage('registration');
        $page->isCurrent();
        return $page;

    }

    public function unlogin (&$page)
    {
        $this->click($this->baseResource->pageElements->unlogin);
        $this->wait(4000);
        $page = $this->getPage('home');
        $page->isCurrent();
        return $page;

    }

}