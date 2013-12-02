<?php
use Codeception\Util\Stub;

class CommBuildToolTest extends \Codeception\TestCase\Test
{
   /**
    * @var \CodeGuy
    */
    protected $codeGuy;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testExecutionWithOpenSrc()
    {
        $c = new \ISM\Tool\CommBuildTool;
        $srcOld = __DIR__ . DS . ".." . DS . ".." . DS . ".." . DS . 'codeception-tests' . DS . 'acceptance' . DS . 'WebGuy.php';
        $src = realpath($srcOld);
        // check does file exist
        $this->assertTrue( !  empty($src),  'File not found =>' . $srcOld);

        $c->setSource($src);
        $result = $c->openSrcFile();
        $this->assertTrue($result, 'CommBuildTool open src file failed');

        $result = $c->execute();
        $this->assertTrue($result, 'CommBuildTool failed');
    }

    // tests
    public function testExecutionWithSetResult()
    {
        $c = new \ISM\Tool\CommBuildTool;
        $srcOld = __DIR__ . DS . ".." . DS . ".." . DS . ".." . DS . 'codeception-tests' . DS . 'acceptance' . DS . 'WebGuy.php';
        $src = realpath($srcOld);
        // check does file exist
        $this->assertTrue( !  empty($src),  'File not found =>' . $srcOld);

        $c->setSource($src);
        $result = $c->execute();
        $this->assertTrue($result, 'CommBuildTool failed');
    }

}