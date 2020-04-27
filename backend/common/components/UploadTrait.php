<?php
namespace common\components;

use common\helpers\UploadHelper;

trait UploadTrait {

	public function uploadFile($attribute) {
		$nameSet = UploadHelper::generatePath($this->{$attribute}->extension);		

		return $this->{$attribute}->saveAs($nameSet['fullName']) ? $nameSet['fullName'] : false;
	}

	public function uploadFiles($attribute) {
		$names = [];

		foreach($this->{$attribute} as $file) {
			$nameSet = UploadHelper::generatePath($file->extension);

			if($file->saveAs($nameSet['fullName'])) {
				$names[] = $nameSet['fullName'];
			}
		}

		return $names;
	}

}
?>
