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
    public function testExecutionResult()
    {
        $c = new \ISM\Tool\CommBuildTool;
        $result = $c->execute();
        $this->assertTrue($result, 'CommBuildTool failed');
    }

}