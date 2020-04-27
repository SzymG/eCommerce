<?php 
namespace common\components;

use yii\helpers\StringHelper;

class Request extends \yii\web\Request {
	
	public $web;
	public $adminUrl;

	public function getBaseUrl() {		
		return str_replace($this->web, "", parent::getBaseUrl()) . $this->adminUrl;
	}


	/*
	 If you don't have this function, the admin site will 404 if you leave off
	the trailing slash.

	E.g.:

	Wouldn't work:
	site.com/admin

	Would work:
	site.com/admin/

	Using this function, both will work.
	*/
	public function resolvePathInfo(){
		if($this->getUrl() === $this->adminUrl) {
			return "";
		}
		else {
			return parent::resolvePathInfo();
		}
	}
	
	public function getFrontendBaseUrl() {
		$pathInfo = $this->resolveRequestUri();
		$pathInfo = trim($pathInfo, '/');
		 
		if(!empty($pathInfo)) {
			$pathInfo = explode('/', $pathInfo, 2)[0];
			$pathInfo = StringHelper::startsWith($pathInfo, 'my-project') ? $pathInfo.'/' : '';
		}
		 
		return $this->getHostInfo().'/'.$pathInfo;
	}
}