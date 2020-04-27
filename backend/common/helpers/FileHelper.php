<?php
namespace common\helpers;

use yii;
use yii\helpers\Json;

class FileHelper extends \yii\helpers\FileHelper {
    
    public function getFile($file) {
        $originalKey = $file;
		$file = static::normalizePath(UploadHelper::getUploadPath().'/'.$file);

		if(!file_exists($file)) {
			throw new BadRequestHttpException(Yii::t('app', 'The requested page does not exist. Please verify the address of the page.'));
		}		
		
		Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;

		header('Content-Type: ' . mime_content_type($file));
		if(!empty($originalKey)) {
			header('Content-Disposition: inline; filename="'.$originalKey.'"');
		}
		return file_get_contents($file);
    }
    
}