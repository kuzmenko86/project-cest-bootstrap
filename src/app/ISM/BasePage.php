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
    public function grabTextFrom($p)
    {
        return $this->getGuy()->grabTextFrom((string)$p);
    }

    public function grabValueFrom($p)
    {
        return $this->getGuy()->grabValueFrom((string)$p);
    }

    public function canSee($p)
    {
        return $this->getGuy()->canSee((string)$p);
    }

    public function callSeleniumTitle ()
    {
        $pageTitle = NULL;

        $this->getGuy()->executeInSelenium(function(\WebDriver $webdriver) use (&$pageTitle) {
            $pageTitle = $webdriver->getTitle();
        });

        return $pageTitle;
    }

    public function isCurrent()
    {
        $this->see();
        $this->seeInTitle();
        return $this;
    }

    /**
     * @return bool|LoginPage
     */
    public function goToLoginPage()
    {
        $this->click($this->baseResource->pageElements->link_to_login);
        $this->wait(2);

        $page = $this->getPage('login');
        $page->isCurrent();
        return $page;

    }

    /**
     * @return RegistrationPage
     */
    public function goRegistrationPage()
    {
        $this->click($this->baseResource->pageElements->link_to_gegister);
        $this->wait(2);
        $page = $this->getPage('registration');
        $page->isCurrent();
        return $page;

    }

    /**
     * @param $page
     * @return AbstractPage|BackOfficePage|CheckoutPage|HomePage|LoginPage|MyAccountPage|PdpPage|RegistrationPage|ShoppingCartPage|ThankYouPage
     */
    public function unlogin ()
    {
        $this->click($this->baseResource->pageElements->unlogin);
        $this->wait(6);
        $page = $this->getPage('home');
        $page->isCurrent();
        return $page;

    }

}