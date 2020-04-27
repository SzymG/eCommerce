<?php

namespace common\models\ar;

use common\models\aq\InformationPageQuery;
use Yii;

/**
 * This is the model class for table "information_page_translation".
 *
 * @property integer $information_page_id
 * @property integer $language_id
 * @property string $name
 *
 * @property InformationPage $informationPage
 * @property Language $language
 */
class InformationPageTranslation extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'information_page_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['information_page_id', 'language_id', 'name'], 'required'],
			[['information_page_id', 'language_id'], 'integer'],
			[['name'], 'string'],
            [['information_page_id', 'language_id'], 'unique', 'targetAttribute' => ['information_page_id', 'language_id']],
			[['information_page_id'], 'exist', 'skipOnError' => true, 'targetClass' => InformationPage::className(), 'targetAttribute' => ['information_page_id' => 'id']],
			[['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']]
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'information_page_id' => Yii::t('app', 'Information Page ID'),
            'language_id' => Yii::t('app', 'Language ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInformationPage() {
        return $this->hasOne(InformationPage::className(), ['id' => 'information_page_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage() {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

    /**
     * @inheritdoc
     * @return InformationPageQuery the active query used by this AR class.
     */
    public static function find() {
        return new InformationPageQuery(get_called_class());
    }
}
