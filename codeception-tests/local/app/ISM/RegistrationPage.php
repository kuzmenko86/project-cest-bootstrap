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

    public function checkForAllFormElementsPresent()
    {
        $this->seeInField($this->pageResource->registrationForm->firstname,'');
        $this->seeInField($this->pageResource->registrationForm->lastname,'');
        $this->seeInField($this->pageResource->registrationForm->email_address,'');
        $this->seeInField($this->pageResource->registrationForm->password,'');
        $this->seeInField($this->pageResource->registrationForm->confirmation,'');
        return $this;
    }


    public function checkValidationMessage()
    {
        $this->fillField($this->pageResource->registrationForm->firstname,'');
        $this->fillField($this->pageResource->registrationForm->lastname,'');
        $this->fillField($this->pageResource->registrationForm->email_address,'');
        $this->fillField($this->pageResource->registrationForm->password,'');
        $this->fillField($this->pageResource->registrationForm->confirmation,'');
        $this->click($this->pageResource->registrationForm->submit_button);
        $this->see($this->pageResource->registrationForm->validation_message);
        return $this;
    }

    public function checkInvalidEmail()
    {
        $this->fillField($this->pageResource->registrationForm->email_address,'fake');
        $this->click($this->pageResource->registrationForm->submit_button);
        $this->see($this->pageResource->registrationForm->validation_email_message);
        return $this;
    }


    public function makeRegister()
    {
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
        $this->wait(1000);
        //return $this; //should be return my account

    }


}