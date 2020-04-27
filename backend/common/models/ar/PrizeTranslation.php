<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "prize_translation".
 *
 * @property integer $prize_id
 * @property integer $language_id
 * @property string $name
 *
 * @property Language $language
 * @property Prize $prize
 */
class PrizeTranslation extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'prize_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['prize_id', 'language_id', 'name'], 'required'],
			[['prize_id', 'language_id'], 'integer'],
			[['name'], 'string', 'max' => 64],
			[['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
			[['prize_id'], 'exist', 'skipOnError' => true, 'targetClass' => Prize::className(), 'targetAttribute' => ['prize_id' => 'id']]
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'prize_id' => Yii::t('app', 'prize'),
            'language_id' => Yii::t('app', 'language'),
            'name' => Yii::t('app', 'name'),
            'prize' => Yii::t('app', 'prize'),
            'language' => Yii::t('app', 'language'),
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
    public function getPrize() {
        return $this->hasOne(Prize::className(), ['id' => 'prize_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\PrizeTranslationQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\PrizeTranslationQuery(get_called_class());
    }
}
