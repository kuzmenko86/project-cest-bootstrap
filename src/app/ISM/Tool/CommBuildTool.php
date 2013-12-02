<?php

namespace ISM\Tool;

use \ISM\Intface\CommandIntface;

class CommBuildTool implements CommandIntface
{
    protected $_src = null;
    protected $_trg = null;
    protected $_srcHandle = null;


    public function execute()
    {
        $result = true;
        if (is_null($this->_src)) {
            return false;
        }
        if (is_null($this->_srcHandle)) {
            $result = $this->openSrcFile();
        }

        return $result;
    }

    public function setSource($src)
    {
        $this->_src = $src;
    }

    public function openSrcFile()
    {
        if ($this->_srcHandle) {
            return true;
        }
        $handle = @fopen($this->_src, "r");
        if ($handle) {
            $this->_srcHandle = $handle;
            return true;
        } else {
            return false;
        }

    }
}