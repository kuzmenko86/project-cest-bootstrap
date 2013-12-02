<?php
use Codeception\Util\Stub;

class CommBuildToolTest extends \Codeception\TestCase\Test
{
    private $_srcPath;
    private $_trgPath;

   /**
    * @var \CodeGuy
    */
    protected $codeGuy;

    protected function _before()
    {
        $this->_srcPath = __DIR__ . DS . ".." . DS . ".." . DS . ".." . DS . 'codeception-tests' . DS . 'acceptance' . DS . 'WebGuy.php';
        $this->_trgPath = __DIR__ . DS . ".."  . DS . "..". DS . 'app' . DS . 'ISM' . DS . "AbstractPage.php";
    }

    protected function _after()
    {
    }

    // tests
    public function testExecutionWithOpenSrcTrg()
    {
        $c = new \ISM\Tool\CommBuildTool;
        $src = realpath($this->_srcPath);
        // check does file exist
        $this->assertTrue( !  empty($src),  'Src file not found => ' . $this->_srcPath);
        $c->setSource($src);
        $result = $c->openSrcFile();
        $this->assertTrue($result, 'CommBuildTool open src file failed');

        $trg = realpath($this->_trgPath);
        // check does file exist
        $this->assertTrue( ! empty($trg),  'Trg file not found => ' . $this->_trgPath);

        $c->setTarget($trg);
        $result = $c->openTrgFile();

        $this->assertTrue($result, 'CommBuildTool open trg file failed');

        $result = $c->execute();
        $this->assertTrue($result, 'CommBuildTool failed');
    }

    public function testExecutionWithSetSourceResult()
    {
        $c = new \ISM\Tool\CommBuildTool;
        $src = realpath($this->_srcPath);
        // check does file exist
        $this->assertTrue( !  empty($src),  'File not found =>' . $this->_srcPath);
        $c->setSource($src);

        $trg = realpath($this->_trgPath);
        // check does file exist
        $this->assertTrue( ! empty($trg),  'Trg file not found => ' . $this->_trgPath);
        $c->setTarget($trg);

        $result = $c->execute();
        $this->assertTrue($result, 'CommBuildTool method execution() failed');
    }

}
