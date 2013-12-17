<?php
/**
 * Composition of Commands.
 */
namespace ISM\Tool;

use \ISM\Factory\CmdToolFactory;
use \ISM\Intface\CommandIntface;

class CommCompositionTool implements \ArrayAccess
{
    protected $_factory = null;
    protected $_data = array();

    public function offsetSet($offset, $value)
    {
        if ($value instanceof CommandIntface) {
            $setValue = $value;
        }  else {
            $setValue = $this->_getFactory()->getCommand($value);
        }
        if (is_null($offset)) {
            $this->_data[] = $setValue;
        } else {
            $this->_data[$offset] = $setValue;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->_data[$offset]);
    }

    public function offsetUnset($offset)
    {
        if (isset($this->_data[$offset])) {
            unset($this->_data[$offset]);
        }
    }

    public function offsetGet($offset)
    {
        return isset($this->_data[$offset]) ? $this->_data[$offset] : null;
    }

    protected function _getFactory()
    {
        if (is_null($this->_factory)) {
            $this->_factory = new CmdToolFactory();
        }

        return $this->_factory;
    }
}
