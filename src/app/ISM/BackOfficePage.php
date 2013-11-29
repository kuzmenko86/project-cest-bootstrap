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

    /**
     * @return $this
     */
    public function loginToBO()
    {
        $this->fillField(
            $this->pageResource->pageElements->login_field,
            $this->login
        );
        $this->fillField(
            $this->pageResource->pageElements->password_field,
            $this->password
        );

        $this->click($this->pageResource->pageElements->login_to_bo_button);
        return $this;


    }

    /**
     * Lead to proper place in BO
     * Here will be a lot of cases
     *
     * @param $item
     * @return $this
     */
    public function goToBOPage ($item)
    {
        switch($item)
        {
            case 'manage_customers' :
                $this->moveMouseOver($this->pageResource->customers->customer_item);
                $this->click($this->pageResource->customers->managecustomers);
                $this->wait('2');
                break;

        }
        return $this;

    }

    /**
     * Delete customer by BO
     *
     * @return $this
     */
    public function deleteCustomer()
    {

        $this->goToBOPage('manage_customers');
        $this->fillField($this->pageResource->customers->email_filter, $this->baseResource->MyData->email_address);
        $this->click("//td[@class='filter-actions a-right']/button[2]");    //search button
        $this->dontSee('No records found.');
        $this->checkOption($this->pageResource->customers->first_option);   //select one available item (emai)
        $this->click("//option[@value='delete']");  //check option delete
        $this->click($this->pageResource->customers->button_submit);    //click submit button
        $this->acceptPopup('Weet u het zeker?');
        $this->wait(1);
        return $this;
    }


}