<?php
use Codeception\Util\Stub;

class CommCompositionToolsTest extends \Codeception\TestCase\Test
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
    public function testAddCommandToComposition()
    {
        $composition = new \ISM\Tool\CommCompositionTool();
        $newCom = new \ISM\Tool\CommBuildTool();
        $composition[] = $newCom;
        $saveCom = $composition[0];
        $this->assertTrue($saveCom instanceof \ISM\Intface\CommandIntface, 'Command have not command interface');
    }

}