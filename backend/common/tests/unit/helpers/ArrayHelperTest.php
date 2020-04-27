<?php
namespace common\tests\unit\helpers;

use common\helpers\ArrayHelper;
use common\tests\_support\TestHelper;
use common\tests\_support\DummyClass;

class ArrayHelperTest extends \Codeception\Test\Unit {

    protected $helper;

    protected function _before() {
        $this->helper = new TestHelper();
    }

    protected function _after() {
        //...
    }
    
    public function testConvertObjectToArrayWithNull() {
        $helper = new ArrayHelper();
        $actual = $helper->convertObjectToArray(null);
        $this->assertNull($actual);
    }
    
    public function testConvertObjectToArrayWithDummyAndPublic() {
        $helper = new ArrayHelper();
        $dummy = new DummyClass(3, 5);
        $actual = $helper->convertObjectToArray($dummy);
        $this->assertEquals([
            'publicParam1' => '3',
            'publicParam2' => '5',
        ], $actual);
    }
}