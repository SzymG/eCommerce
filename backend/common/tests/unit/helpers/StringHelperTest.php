<?php
namespace common\tests\unit\helpers;

use common\helpers\StringHelper;
use common\tests\_support\TestHelper;

class StringHelperTest extends \Codeception\Test\Unit {

    protected $helper;

    protected function _before() {
        $this->helper = new TestHelper();
    }

    protected function _after() {
        //...
    }
    
    public function testToSnakeCaseWithEmpty() {
        $obj = new StringHelper();
        $actual = $obj->toSnakeCase('');
        $this->assertEquals('', $actual);
    }
    
    public function testToSnakeCaseWithSpace() {
        $obj = new StringHelper();
        $actual = $obj->toSnakeCase(' ');
        $this->assertEquals(' ', $actual);
    }
    
    public function testToSnakeCaseWithAllLow() {
        $obj = new StringHelper();
        $actual = $obj->toSnakeCase('banana');
        $this->assertEquals('banana', $actual);
    }
    
    public function testToSnakeCaseWithCapitalAndLow() {
        $obj = new StringHelper();
        $actual = $obj->toSnakeCase('baNana');
        $this->assertEquals('ba_nana', $actual);
    }
    
    public function testToSnakeCaseWithTwoSameCapitals() {
        $obj = new StringHelper();
        $actual = $obj->toSnakeCase('baNaNa');
        $this->assertEquals('ba_na_na', $actual);
    }
    
    public function testToSnakeCaseWithTwoSameCapitalsAndEnd() {
        $obj = new StringHelper();
        $actual = $obj->toSnakeCase('baNaNA');
        $this->assertEquals('ba_na_n_a', $actual);
    }
    
    public function testToSnakeCaseWithBegin() {
        $obj = new StringHelper();
        $actual = $obj->toSnakeCase('Banana');
        $this->assertEquals('_banana', $actual);
    }
    
    public function testToSnakeCaseWithTwoLowerWords() {
        $obj = new StringHelper();
        $actual = $obj->toSnakeCase('two word');
        $this->assertEquals('two word', $actual);
    }
    
    public function testToSnakeCaseWithTwoNormalWords() {
        $obj = new StringHelper();
        $actual = $obj->toSnakeCase('Two Word');
        $this->assertEquals('_two _word', $actual);
    }
    
    public function testToSnakeCaseWithVariableName() {
        $obj = new StringHelper();
        $actual = $obj->toSnakeCase('iSeeDeadPeople');
        $this->assertEquals('i_see_dead_people', $actual);
    }
    
    public function testToSnakeCaseWithSingleCapital() {
        $obj = new StringHelper();
        $actual = $obj->toSnakeCase('D');
        $this->assertEquals('_d', $actual);
    }
}