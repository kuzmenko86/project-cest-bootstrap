<?php
namespace ISM;
use ISM\PageFactory;

/**
 * Class AbstractPage
 * Proxied methods from WebGuy parents
 * @method \ISM\BasePage execute($callable)
 * @method \ISM\BasePage wantToTest($text)
 * @method \ISM\BasePage wantTo($text = null)
 * @method \ISM\BasePage expectTo($prediction)
 * @method \ISM\BasePage expect($prediction)
 * @method \ISM\BasePage amGoingTo($argumentation)
 * @method \ISM\BasePage am($role)
 * @method \ISM\BasePage lookForwardTo($achieveValue)
 * @method \ISM\BasePage offsetGet($offset)
 * @method \ISM\BasePage offsetSet($offset, $value)
 * @method \ISM\BasePage offsetExists($offset)
 * @method \ISM\BasePage offsetUnset($offset)
 *
 * Proxied methods from WebGuy
 *
 * @method \ISM\BasePage executeInSelenium($function)
 * @method \ISM\BasePage click($link, $context = null, $strict = null)
 * @method \ISM\BasePage acceptPopup()
 * @method \ISM\BasePage cancelPopup()
 * @method \ISM\BasePage canSeeInPopup($text)
 * @method \ISM\BasePage seeInPopup($text)
 * @method \ISM\BasePage cantSeeInPopup($text)
 * @method \ISM\BasePage dontSeeInPopup($text)
 * @method \ISM\BasePage switchToWindow($name = null)
 * @method \ISM\BasePage switchToIFrame($name = null)
 * @method \ISM\BasePage resizeWindow($width, $height)
 * @method \ISM\BasePage canSeeInTitle($title = null )
 * @method \ISM\BasePage seeInTitle($title = null)
 * @method \ISM\BasePage cantSeeInTitle($title = null)
 * @method \ISM\BasePage dontSeeInTitle($title)
 * @method \ISM\BasePage checkOption($option)
 * @method \ISM\BasePage uncheckOption($option)
 * @method \ISM\BasePage doubleClick($link)
 * @method \ISM\BasePage clickWithRightButton($link)
 * @method \ISM\BasePage moveMouseOver($link)
 * @method \ISM\BasePage focus($el)
 * @method \ISM\BasePage blur($el)
 * @method \ISM\BasePage dragAndDrop($el1, $el2)
 * @method \ISM\BasePage canSeeElement($selector)
 * @method \ISM\BasePage seeElement($selector = null)
 * @method \ISM\BasePage pressKey($element, $char, $modifier = null)
 * @method \ISM\BasePage pressKeyUp($element, $char, $modifier = null)
 * @method \ISM\BasePage pressKeyDown($element, $char, $modifier = null)
 * @method \ISM\BasePage wait($milliseconds)
 * @method \ISM\BasePage waitForJS($milliseconds, $jsCondition)
 * @method \ISM\BasePage executeJs($jsCode)
 * @method \ISM\BasePage amOnPage($page = null)
 * @method \ISM\BasePage amOnSubdomain($subdomain)
 * @method \ISM\BasePage cantSee($text = null, $selector = null)
 * @method \ISM\BasePage dontSee($text = null, $selector = null)
 * @method \ISM\BasePage canSee($text = null, $selector = null)
 * @method \ISM\BasePage see($text = null, $selector = null)
 * @method \ISM\BasePage canSeeLink($text, $url = null)
 * @method \ISM\BasePage seeLink($text, $url = null)
 * @method \ISM\BasePage cantSeeLink($text, $url = null)
 * @method \ISM\BasePage dontSeeLink($text, $url = null)
 * @method \ISM\BasePage cantSeeElement($selector)
 * @method \ISM\BasePage dontSeeElement($selector)
 * @method \ISM\BasePage reloadPage()
 * @method \ISM\BasePage moveBack()
 * @method \ISM\BasePage moveForward()
 * @method \ISM\BasePage fillField($field, $value)
 * @method \ISM\BasePage selectOption($select, $option)
 * @method \ISM\BasePage canSeeInCurrentUrl($uri)
 * @method \ISM\BasePage seeInCurrentUrl($uri)
 * @method \ISM\BasePage cantSeeInCurrentUrl($uri)
 * @method \ISM\BasePage dontSeeInCurrentUrl($uri)
 * @method \ISM\BasePage canSeeCurrentUrlEquals($uri)
 * @method \ISM\BasePage seeCurrentUrlEquals($uri)
 * @method \ISM\BasePage cantSeeCurrentUrlEquals($uri)
 * @method \ISM\BasePage dontSeeCurrentUrlEquals($uri)
 * @method \ISM\BasePage canSeeCurrentUrlMatches($uri)
 * @method \ISM\BasePage seeCurrentUrlMatches($uri)
 * @method \ISM\BasePage cantSeeCurrentUrlMatches($uri)
 * @method \ISM\BasePage dontSeeCurrentUrlMatches($uri)
 * @method \ISM\BasePage canSeeCookie($cookie)
 * @method \ISM\BasePage seeCookie($cookie)
 * @method \ISM\BasePage cantSeeCookie($cookie)
 * @method \ISM\BasePage dontSeeCookie($cookie)
 * @method \ISM\BasePage setCookie($cookie, $value)
 * @method \ISM\BasePage resetCookie($cookie)
 * @method \ISM\BasePage grabCookie($cookie)
 * @method \ISM\BasePage grabFromCurrentUrl($uri = null)
 * @method \ISM\BasePage attachFile($field, $filename)
 * @method \ISM\BasePage canSeeOptionIsSelected($select, $text)
 * @method \ISM\BasePage seeOptionIsSelected($select, $text)
 * @method \ISM\BasePage cantSeeOptionIsSelected($select, $text)
 * @method \ISM\BasePage dontSeeOptionIsSelected($select, $text)
 * @method \ISM\BasePage canSeeCheckboxIsChecked($checkbox)
 * @method \ISM\BasePage seeCheckboxIsChecked($checkbox)
 * @method \ISM\BasePage cantSeeCheckboxIsChecked($checkbox)
 * @method \ISM\BasePage dontSeeCheckboxIsChecked($checkbox)
 * @method \ISM\BasePage canSeeInField($field, $value)
 * @method \ISM\BasePage seeInField($field, $value)
 * @method \ISM\BasePage cantSeeInField($field, $value)
 * @method \ISM\BasePage dontSeeInField($field, $value)
 * @method \ISM\BasePage grabTextFrom($cssOrXPathOrRegex)
 * @method \ISM\BasePage grabValueFrom($field)
 *
 */
abstract class AbstractPage implements Intface\GuyIntface
{
    protected $_guy = false;
    protected $_isDebug = true;

    /**
     * @var bool|\SimpleXMLElement
     */
    protected $_pageResource;

    /**
     * @var bool|\SimpleXMLElement
     */
    protected $_baseResource;

    protected $_properties = array(
        'pageResource',
        'baseResource'
    );

    /**
     * Set webguy.
     *
     * @param \WebGuy $guy Setup guy.
     */
    public function setGuy(\WebGuy $guy)
    {
        $this->_guy = $guy;
    }

    /**
     * Retrieve web guy.
     *
     * @return \WebGuy | bool
     */
    public function getGuy()
    {
        return $this->_guy;
    }

    public function getPage($pageName)
    {
        return PageFactory::getPage($pageName);
    }

    public function loadConfig($xmlName)
    {
        $xmlFullName =  realpath(__DIR__ . DS . '..' . DS . '..'. DS . 'etc' . DS . $xmlName . ".xml");
        if ( file_exists($xmlFullName) ) {
            $this->_logMessage("Loading page conf from ".$xmlFullName);
            $this->_xmlFullName = $xmlFullName;
            return simplexml_load_file($xmlFullName);
        } else {
            echo "\nCannot load file ".$xmlFullName;
        }
        return false;
    }

    /**
     * Retrieve page resource property.
     *
     * @return \SimpleXMLElement pageResource object
     */
    public function getPageResource()
    {
        return $this->_pageResource;
    }

    public function setPageResource(\SimpleXMLElement $pageResource)
    {
        $this->_pageResource = $pageResource;
    }

    /**
     * Retrieve base resource property.
     *
     * @return bool | \SimpleXMLElement Base resource object.
     */
    public function getBaseResource()
    {
        return $this->_baseResource;
    }

    public function setBaseResource(\SimpleXMLElement $baseResource)
    {
        $this->_baseResource = $baseResource;
    }

    public function isDebugEnabled()
    {
        return isset($this->getPageResource()->debug) ? $this->getPageResource()->debug : $this->_isDebug;
    }

    public function __call($nameMethod, $arguments)
    {
        if (! $this->_guy) {
            throw new \Exception('Class '.get_class($this).' say - please call setGuy method before');
        }

        $args = $arguments;
        if (count($arguments) == 0) {
            $nodeName = strtolower($nameMethod);
            $this->_callExtractedArgs($nameMethod, $nodeName);
            return $this;
        } else {
            call_user_func_array(array($this->_guy, $nameMethod), $args);
            $this->_logCallWebGuy($nameMethod, implode(',', $arguments));
            return $this;
        }

    }

    public function __get($name)
    {
        if (($result = $this->_getProperties($name)) !== null) {
            return $result;
        }

        $this->_logMessage("Try get pageResource->$name in class ".get_class($this));
        if ( isset($this->getPageResource()->$name) ) {
            return $this->getPageResource()->$name;
        }

        $this->_logMessage("Try get baseResource->$name in class ".get_class($this));
        if ( isset($this->getBaseResource()->$name) ) {
            return $this->getBaseResource()->$name;
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name . ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE
        );
        return null;
    }

    protected function _callExtractedArgs($nameMethod, $nameArgNode)
    {
        if (! isset($this->getPageResource()->codeception->$nameArgNode->row)) {
            if ( isset($this->getPageResource()->codeception->$nameArgNode) ) {
                $argNode =  $this->getPageResource()->codeception->$nameArgNode;
                $args = explode(',', $argNode);
                $this->_logCallWebGuy($nameMethod, $argNode);
                call_user_func_array(array($this->_guy, $nameMethod), $args);
            }

        } else {
            $arrayOfArgs = (array) $this->getPageResource()->codeception->$nameArgNode->row;
            foreach ($arrayOfArgs as $args) {
                $this->_logCallWebGuy($nameMethod, $args);
                $args = explode(',', $args);
                call_user_func_array(array($this->_guy, $nameMethod), $args);
            }
        }
    }

    protected function _getProperties($name)
    {
        if (array_search($name, $this->_properties) !== false) {
            $method = 'get'.ucfirst($name);
            if (method_exists($this, $method)) {
                return $this->$method();
            }
        }
        return null;
    }

    protected function _logCallWebGuy($nameMethod, $args)
    {
        $this->_logMessage("Call WebGuy.$nameMethod(". $args . ") in class ".get_class($this));
    }

    protected function _logMessage($messageTxt)
    {
        if ($this->isDebugEnabled()) {
            echo "\n".$messageTxt."\n";
        }
    }
}