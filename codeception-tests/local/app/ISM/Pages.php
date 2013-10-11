<?php
namespace ISM;

use ISM\Intface\GuyIntface;

class Pages
{
    public static $_guy = false;

    public static function getPage($page)
    {
        $pageClass = false;

        switch ($page) {
            case 'home' :
                $pageClass = new HomePage('home');
                break;
            case 'registration' :
                $pageClass = new RegistrationPage('registration');
                break;
            case 'login' :
                $pageClass = new LoginPage('login');
                break;
            case 'pdp' :
                $pageClass = new PdpPage('pdp');
                break;
            case 'shopping_cart':
                $pageClass = new ShoppingCartPage('shopping_cart');
                break;
            case 'my_account':
                $pageClass = new MyAccountPage('my_account');
                break;
            case 'back_office':
                $pageClass = new BackOfficePage('back_office');
                break;
            default : return false;
        }

        if ($pageClass && ($pageClass instanceof GuyIntface) && self::$_guy && (self::$_guy instanceof \WebGuy)) {
            $pageClass->setGuy(self::$_guy);
        }

        return $pageClass;
    }

    public static function setGuy(\WebGuy $guy)
    {
        self::$_guy = $guy;
    }
}