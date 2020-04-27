<?php

namespace frontend\components;

use Yii;

class Module extends \yii\base\Module {

    /**
     * {@inheritdoc}
     */
    public function init() {
        parent::init();
        $this->controllerNamespace = 'frontend\modules\\'.$this->getModuleName().'\controllers';
        $this->registerTranslations();
    }

    protected function registerTranslations() {
        Yii::$app->i18n->translations['modules/'.$this->getModuleName().'/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en',
            'basePath' => '@app/modules/'.$this->getModuleName().'/messages',
            'fileMap' => $this->getFileMap(),
        ];
    }

    protected function getModuleName() {
        return null;
    }

    protected function getFileMap() {
        return [];
    }
}
