<?php
namespace ISM;

class LoginPage extends BasePage
{
    protected $_xmlName = 'login';

    public function __construct($xmlName = false)
    {
        if ($xmlName && is_string($xmlName)) {
            $this->_xmlName = $xmlName;
        }

        parent::__construct();
        $this->_pageResource = $this->loadConfig($this->_xmlName);
    }

    /**
     * @return AbstractPage|BackOfficePage|CheckoutPage|HomePage|LoginPage|MyAccountPage|PdpPage|RegistrationPage|ShoppingCartPage|ThankYouPage
     */

    public function login()
    {
        $this->fillField(
            $this->pageResource->pageElements->email,
            $this->baseResource->MyData->email_address
        );
        $this->fillField(
            $this->pageResource->pageElements->password,
            $this->baseResource->MyData->password
        );
        $this->click($this->pageResource->pageElements->login_button);

        $this->wait(1);
        $this->dontSee($this->pageResource->pageElements->require_field_message);
        $this->dontSee($this->pageResource->pageElements->error_invalid_data);
        $page = $this->getPage('my_account');
        $page->isCurrent();
        return $page;

    }

    /**
     * @return $this
     */
    public function checkForLoginFormPresent ()
    {
        //$this->canSee($this->pageResource->pageElements->login_button);
        $this->seeInField($this->pageResource->pageElements->email,'');
        $this->seeInField($this->pageResource->pageElements->password,'');
        return $this;
    }

    /**
     * @param $page
     * @return AbstractPage|BackOfficePage|CheckoutPage|HomePage|LoginPage|MyAccountPage|PdpPage|RegistrationPage|ShoppingCartPage
     */
    public function checkRequireField ()
    {
        $this->fillField($this->pageResource->pageElements->email,'');
        $this->fillField($this->pageResource->pageElements->password,'');
        $this->click($this->pageResource->pageElements->login_button);
        $this->see($this->pageResource->pageElements->require_field_message);
        return $this;

    }
}