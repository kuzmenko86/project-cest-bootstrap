<?php
/**
 * Composition of Commands.
 */
namespace ISM\Tool;

class CommCompositionTool implements \ArrayAccess
{
    protected $_data = array();

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->_data[] = $value;
        } else {
            $this->_data[$offset] = $value;
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

}