<?php

namespace ISM\Tool;

use \ISM\Intface\CommandIntface;

class CommBuildTool implements CommandIntface
{
    protected $_src = null;
    protected $_trg = null;
    protected $_srcHandle = null;
    protected $_trgHandle = null;

    public function execute()
    {
        $result = true;
        if (is_null($this->_src) || is_null($this->_trg)) {
            return false;
        }
        if (is_null($this->_srcHandle)) {
            $result = $this->openSrcFile();
        }

        if (is_null($this->_trgHandle)) {
            $result = $this->openTrgFile();
        }

        return $result;
    }

    public function setSource($src)
    {
        $this->_src = $src;
    }

    public function setTarget($trg)
    {
        $this->_trg = $trg;
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

    public function openTrgFile($mode = 'r')
    {
        if ($this->_trgHandle) {
            return true;
        }
        $handle = @fopen($this->_trg, $mode);
        if ($handle) {
            $this->_trgHandle= $handle;
            return true;
        } else {
            return false;
        }

    }
}