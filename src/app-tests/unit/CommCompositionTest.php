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
    public function testArrayBehavoir()
    {
        $composition = new \ISM\Tools\CommCompositionTools();
        var_dump($composition);
    }

}