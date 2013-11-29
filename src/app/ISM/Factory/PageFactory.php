<?php
namespace ISM;

use ISM\Intface\GuyIntface;

/**
 * Factory class for pages.
 */
class PageFactory
{
    const PAGE_SUFFIX_NAME = 'Page';
    /**
     * @var \WebGuy | bool
     */
    public static $_guy = false;

    /**
     * Factory method.
     *
     * @param string $page Page name.
     * @return AbstractPage|BackOfficePage|HomePage|LoginPage|MyAccountPage|PdpPage|RegistrationPage|ShoppingCartPage|CheckoutPage|ThankYouPage
     * @throws \Exception
     */
    public static function getPage($page)
    {
        $pageClass = false;
        $pageClassName = str_replace(' ', '', ucwords(str_replace('_', ' ', $page))) . static::PAGE_SUFFIX_NAME;
        $pageClassName = '\\' . __NAMESPACE__ . '\\' . $pageClassName;

        try {
            $pageClass = new $pageClassName($page);
        } catch (\Exception $e) {
            throw new \Exception ('Cannot load class '. $pageClassName);
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