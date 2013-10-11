<?php
namespace ISM;

class BackOfficePage extends BasePage
{
    protected $_xmlName = 'back_office';

    public function __construct($xmlName = false)
    {
        if ($xmlName && is_string($xmlName)) {
            $this->_xmlName = $xmlName;
        }

        parent::__construct();

        $this->_pageResource = $this->loadConfig($this->_xmlName);
    }

    protected $login = 'ISM';
    protected $password = 'abcABC123';

    public function loginToBO()
    {
        $this->wait(30000);
        $this->fillField(
            $this->pageResource->pageElements->login_field,
            $this->login
        );
$this->wait(3000);
        $this->fillField(
            $this->pageResource->pageElements->password_field,
            $this->password
        );

        $this->click($this->pageResource->pageElements->login_to_bo_button);
$this->wait(3000);
    }

    public function goToSystem ($item)
    {
        $this->click('$item');
        //return this;

    }
    public function deleteCustomer()
    {
        $this->click($this->pageResource->customers->managecustomers);
        return this;
    }


}