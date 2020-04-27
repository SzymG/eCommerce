<?php 
namespace common\components;

abstract class MessageHelper {
	
	const STATUS_OK = 1;
	const STATUS_ERROR = 0;
	const STATUS_DISABLED = -1;
	const STATUS_NO_CONTENT = -2;
	
	protected $status = self::STATUS_ERROR;
	protected $result = '';
	
	public function getStatus() {
		return $this->status;
	}
	
	public function getResult() {
		return $this->result;
	}
	
	abstract public function send($params);
}