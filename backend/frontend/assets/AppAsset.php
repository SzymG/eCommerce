<?php

namespace frontend\assets;

use Yii;
use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle {
    
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/index.min.css',
    ];
    public $js = [
        
    ];
    public $depends = [
        
    ];
    
    public function init() {
        parent::init();
        Yii::$app->assetManager->bundles['yii\\bootstrap\\BootstrapAsset'] = [
            'css' => [],
            'js' => []
        ];
    }
}
