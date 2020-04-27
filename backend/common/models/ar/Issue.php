<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "issue".
 *
 * @property integer $id
 * @property string $message
 * @property string $timestamp
 * @property string $url
 * @property string $errors
 * @property string $image
 * @property string $agent
 * @property string $cookies
 * @property string $platform
 * @property string $screen_size
 * @property string $available_screen_size
 * @property string $inner_size
 * @property integer $color_depth
 * @property string $orientation
 * @property string $date_creation
 */
class Issue extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'issue';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['message', 'url'], 'required'],
			[['message', 'image'], 'string'],
			[['timestamp', 'date_creation'], 'safe'],
			[['color_depth'], 'integer'],
			[['url', 'errors', 'cookies'], 'string', 'max' => 1024],
			[['agent'], 'string', 'max' => 512],
			[['platform'], 'string', 'max' => 64],
			[['screen_size', 'available_screen_size', 'inner_size', 'orientation'], 'string', 'max' => 128]
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'message' => Yii::t('app', 'message'),
            'timestamp' => Yii::t('app', 'timestamp'),
            'url' => Yii::t('app', 'url'),
            'errors' => Yii::t('app', 'errors'),
            'image' => Yii::t('app', 'image'),
            'agent' => Yii::t('app', 'agent'),
            'cookies' => Yii::t('app', 'cookies'),
            'platform' => Yii::t('app', 'platform'),
            'screen_size' => Yii::t('app', 'screenSize'),
            'available_screen_size' => Yii::t('app', 'availableScreenSize'),
            'inner_size' => Yii::t('app', 'innerSize'),
            'color_depth' => Yii::t('app', 'colorDepth'),
            'orientation' => Yii::t('app', 'orientation'),
            'date_creation' => Yii::t('app', 'dateCreation'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\IssueQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\IssueQuery(get_called_class());
    }
}
