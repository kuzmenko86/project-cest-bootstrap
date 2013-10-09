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
        $this->click($this->pageResource->pageElements->submit_button);
        $this->see($this->pageResource->pageElements->invalid_login);

        return $this;
    }
}