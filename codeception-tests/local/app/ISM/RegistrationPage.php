<?php
namespace ISM;

class RegistrationPage extends BasePage
{
    protected $_xmlName = 'registration';

    public function __construct($xmlName = false)
    {
        if ($xmlName && is_string($xmlName)) {
            $this->_xmlName = $xmlName;
        }

        parent::__construct();

        $this->_pageResource = $this->loadConfig($this->_xmlName);
    }

    /**
     * @return $this ISMRegistrationPage
     */
    public function register()
    {
        $this->isCurrent();
        $this->fillField(
            $this->pageResource->registrationForm->firstname,
            $this->baseResource->MyData->firstname
        );
        $this->fillField(
            $this->pageResource->registrationForm->lastname,
            $this->baseResource->MyData->lastname
        );
        $this->fillField(
            $this->pageResource->registrationForm->email_address,
            $this->baseResource->MyData->email_address
        );
        $this->fillField(
            $this->pageResource->registrationForm->password,
            $this->baseResource->MyData->password
        );
        $this->fillField(
            $this->pageResource->registrationForm->confirmation,
            $this->baseResource->MyData->confirmation
        );
        $this->click($this->pageResource->registrationForm->submit_button);
        return $this;
    }
}