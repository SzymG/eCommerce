<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "region_translation".
 *
 * @property integer $region_id
 * @property integer $language_id
 * @property string $name
 *
 * @property Language $language
 * @property Region $region
 */
class RegionTranslation extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'region_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['region_id', 'language_id', 'name'], 'required'],
			[['region_id', 'language_id'], 'integer'],
			[['name'], 'string', 'max' => 128],
			[['region_id', 'language_id'], 'unique', 'targetAttribute' => ['region_id', 'language_id']],
			[['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
			[['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']]
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'region_id' => Yii::t('app', 'Region ID'),
            'language_id' => Yii::t('app', 'Language ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage() {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion() {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\RegionTranslationQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\RegionTranslationQuery(get_called_class());
    }
}
