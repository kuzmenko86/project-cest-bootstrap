<?php
namespace ISM;
/**
 * Class BasePage
 * @property SimpleXMLElement pageResource
 * @property SimpleXMLElement baseResource
 */

class BasePage extends AbstractPage
{
    private $_baseName = 'page';
    protected $_xmlFullName = '';
    protected $_pageResource;

    /**
     * @var bool|\SimpleXMLElement
     */
    protected $_baseResource;
    protected $_guy = false;
    protected $_isDebug = true;

    protected $_properties = array(
        'pageResource',
        'baseResource'
    );

    public function __construct($xmlName = false)
    {
        if ($xmlName && is_string($xmlName)) {
            $this->_baseName = $xmlName;
        }
        $this->_baseResource = $this->loadConfig($this->_baseName);
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

    public function setGuy(\WebGuy $guy)
    {
        $this->_guy = $guy;
    }

    /**
     * @return  \WebGuy | bool
     */
    public function getGuy()
    {
        return $this->_guy;
    }

    /**
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
     * @return bool|\SimpleXMLElement Base resource object
     */
    public function getBaseResource()
    {
        return $this->_baseResource;
    }

    public function setBaseResource(\SimpleXMLElement $baseResource)
    {
        $this->_baseResource = $baseResource;
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

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name . ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE
        );
        return null;
    }

    public function isDebugEnabled()
    {
        return isset($this->getPageResource()->debug) ? $this->getPageResource()->debug : $this->_isDebug;
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
    //all code befor this  comment need to be removed from this file, because this is settings
    public function isCurrent()
    {
        $this->see();
        $this->seeInTitle();
        return $this;
    }

    public function goToLoginPage()
    {
        $this->click($this->baseResource->pageElements->link_to_login);
        return $page = \ISM\Pages::getPage('');

    }
    public function goRegistrationPage()
    {
        $this->click($this->baseResource->pageElements->link_to_gegister);
        return $page = \ISM\Pages::getPage('');

    }

}