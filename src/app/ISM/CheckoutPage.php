<?php
namespace ISM;

class CheckoutPage extends BasePage
{
    protected $_xmlName = 'checkout';

    public function __construct($xmlName = false)
    {
        if ($xmlName && is_string($xmlName)) {
            $this->_xmlName = $xmlName;
        }

        parent::__construct();
        $this->_pageResource = $this->loadConfig($this->_xmlName);
    }

    public function spendCheckoutMethod($likeWho)
    {
        if ($likeWho == "Login"){
            $this->fillField($this->pageResource->addressFormFields->login_eamil, $this->baseResource->MyData->email_address);
            $this->fillField($this->pageResource->addressFormFields->login_password, $this->baseResource->MyData->password);
            $this->click($this->pageResource->pageElements->button_login);
        }
        elseif ($likeWho == "Guest"){
            $this->selectOption($this->pageResource->pageElements->as_who, $this->pageResource->pageElements->radio_as_guest);
            //$this->click('#login:register'); can be used
            $this->click($this->pageResource->pageElements->button_next_step);
        }
        elseif ($likeWho == "Register"){
            $this->selectOption($this->pageResource->pageElements->as_who, $this->pageResource->pageElements->radio_as_register);
            $this->click($this->pageResource->pageElements->button_next_step);
        }

        $this->wait(1);
        $this->spendStepBilling($likeWho);

        return $this;

    }

    public function spendStepBilling($Im)
    {
        if ($Im != "Login"){
            $this->click($this->pageResource->pageElements->button_next_on_billing);//continue button on checkout
            $this->see($this->pageResource->pageElements->alert_require_field);
            $this->fillField($this->pageResource->addressFormFields->firstname,$this->baseResource->MyData->firstname);
            $this->fillField($this->pageResource->addressFormFields->lastname,$this->baseResource->MyData->lastname);
            $this->fillField($this->pageResource->addressFormFields->email,$this->baseResource->MyData->email_address);
            $this->fillField($this->pageResource->addressFormFields->street1,"my test address");
            $this->fillField($this->pageResource->addressFormFields->city,"test city");
            $this->fillField($this->pageResource->addressFormFields->postcode,$this->baseResource->MyData->postcode);
            $this->fillField($this->pageResource->addressFormFields->telephone,$this->baseResource->MyData->telephone);

            if ($Im == "Register"){
                $this->fillField($this->pageResource->addressFormFields->pasword,$this->baseResource->MyData->password);
                $this->fillField($this->pageResource->addressFormFields->confirmation,$this->baseResource->MyData->confirmation);
            }
            $this->selectOption($this->pageResource->pageElements->billing_form, $this->pageResource->pageElements->radio_use_for_shipping);
        }

        $this->click($this->pageResource->pageElements->button_next_on_billing);
        $this->wait(3);//go to shipping step
        return $this;

    }

    public function spendStepShipping()
    {
        $this->click($this->pageResource->pageElements->button_next_on_shipping);//continue button lead us to payment method step
        $this->wait(3);
        return $this;

    }

    public function spendStepPaymentInformation()
    {
        $this->selectOption($this->pageResource->pageElements->pyment_method_form, $this->pageResource->pageElements->radio_check_many_order);
        $this->click($this->pageResource->pageElements->button_next_on_payment);//continue button lead us to order review
        $this->wait(3);
        return $this;
    }

    /**
     * last step of checkout
     * @return AbstractPage|BackOfficePage|CheckoutPage|HomePage|LoginPage|MyAccountPage|PdpPage|RegistrationPage|ShoppingCartPage|ThankYouPage
     */
    public function spendOrderReview()
    {
        $this->click($this->pageResource->pageElements->button_place_order);
        $this->wait(3);
        $page = $this->getPage('thank_you');
        return $page;
    }
}