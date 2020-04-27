<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "agreement_translation".
 *
 * @property integer $agreement_id
 * @property integer $language_id
 * @property string $content
 *
 * @property Agreement $agreement
 * @property Language $language
 */
class AgreementTranslation extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'agreement_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['agreement_id', 'language_id'], 'required'],
			[['agreement_id', 'language_id'], 'integer'],
			[['content'], 'string'],
			[['agreement_id'], 'exist', 'skipOnError' => true, 'targetClass' => Agreement::className(), 'targetAttribute' => ['agreement_id' => 'id']],
			[['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']]
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'agreement_id' => Yii::t('app', 'Agreement ID'),
            'language_id' => Yii::t('app', 'Language ID'),
            'content' => Yii::t('app', 'Content'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgreement() {
        return $this->hasOne(Agreement::className(), ['id' => 'agreement_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage() {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\AgreementTranslationQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\AgreementTranslationQuery(get_called_class());
    }
}
