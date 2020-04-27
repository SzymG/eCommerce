<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "information_page".
 *
 * @property integer $id
 * @property string $symbol
 *
 * @property InformationPageTranslation[] $informationPageTranslations
 */
class InformationPage extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'information_page';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['symbol'], 'required'],
			[['symbol'], 'string']
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'symbol' => Yii::t('app', 'Symbol'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInformationPageTranslations() {
        return $this->hasMany(InformationPageTranslation::className(), ['information_page_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\InformationPageQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\InformationPageQuery(get_called_class());
    }
}
