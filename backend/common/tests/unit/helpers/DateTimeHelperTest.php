<?php
namespace common\tests\unit\helpers;

use common\helpers\DateTimeHelper;
use common\tests\_support\TestHelper;

class DateTimeHelperTest extends \Codeception\Test\Unit {

    protected $helper;

    protected function _before() {
        $this->helper = new TestHelper();
    }

    protected function _after() {
        //...
    }

    public function testNormalizeDateWithBefore2000AndSlashes() {
        $obj = new DateTimeHelper();
		$actual = $obj->normalizeDate('10/10/1995');
		$this->assertEquals('1995-10-10', $actual);
    }
	
	public function testNormalizeDateWithBefore2000AndDots() {
        $obj = new DateTimeHelper();
		$actual = $obj->normalizeDate('10.10.1995');
		$this->assertEquals('1995-10-10', $actual);
    }
	
	public function testNormalizeDateWithAfter2000AndSlashesAndDayGreaterThan12() {
        $obj = new DateTimeHelper();
		$actual = $obj->normalizeDate(new \DateTime('12/20/2008'));
		$this->assertEquals('2008-12-20', $actual);
    }
	
	public function testNormalizeDateWithAfter2000AndDotsAndDayGreaterThan12() {
        $obj = new DateTimeHelper();
		$actual = $obj->normalizeDate(new \DateTime('20.12.2008'));
		$this->assertEquals('2008-12-20', $actual);
    }
	
	public function testFormatDateForPolishWithBefore2000() {
		$obj = new DateTimeHelper();
		$actual = $obj->formatDate(new \DateTime('1995-10-10'));
		$this->assertEquals('10.10.1995', $actual);
	}
	
	public function testFormatDateForPolishWithAfter2000() {
		$obj = new DateTimeHelper();
		$actual = $obj->formatDate(new \DateTime('2008-12-20'));
		$this->assertEquals('20.12.2008', $actual);
	}
	
	public function testFormatTimeForPolishAndSecondsWith0Seconds() {
		$obj = new DateTimeHelper();
		$actual = $obj->formatTime(new \DateTime('1990-01-01 11:36:00'), true);
		$this->assertEquals('11:36:00', $actual);
	}
	
	public function testFormatTimeForPolishAndSecondsWith30Seconds() {
		$obj = new DateTimeHelper();
		$actual = $obj->formatTime(new \DateTime('1990-01-01 11:36:30'), true);
		$this->assertEquals('11:36:30', $actual);
	}
	
	public function testFormatTimeForPolishAndSecondsWith59Seconds() {
		$obj = new DateTimeHelper();
		$actual = $obj->formatTime(new \DateTime('1990-01-01 11:36:59'), true);
		$this->assertEquals('11:36:59', $actual);
	}
	
	public function testFormatTimeForPolishAndNotSecondsWith0Seconds() {
		$obj = new DateTimeHelper();
		$actual = $obj->formatTime(new \DateTime('1990-01-01 11:36:00'), false);
		$this->assertEquals('11:36', $actual);
	}
	
	public function testFormatTimeForPolishAndNotSecondsWith30Seconds() {
		$obj = new DateTimeHelper();
		$actual = $obj->formatTime(new \DateTime('1990-01-01 11:36:30'), false);
		$this->assertEquals('11:36', $actual);
	}
	
	public function testFormatTimeForPolishAndNotSecondsWith59Seconds() {
		$obj = new DateTimeHelper();
		$actual = $obj->formatTime(new \DateTime('1990-01-01 11:36:59'), false);
		$this->assertEquals('11:36', $actual);
	}
	
	public function testFormatTimeForPolishAndNotSecondsWith30SecondsAndNotSecondParameter() {
		$obj = new DateTimeHelper();
		$actual = $obj->formatTime(new \DateTime('1990-01-01 11:36:30'));
		$this->assertEquals('11:36', $actual);
	}

}