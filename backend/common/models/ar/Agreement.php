<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "agreement".
 *
 * @property integer $id
 * @property string $symbol
 * @property integer $is_required
 *
 * @property AgreementTranslation[] $agreementTranslations
 */
class Agreement extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'agreement';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['symbol'], 'required'],
			[['is_required'], 'integer'],
			[['symbol'], 'string', 'max' => 32],
			[['symbol'], 'unique']
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'symbol' => Yii::t('app', 'Symbol'),
            'is_required' => Yii::t('app', 'Is Required'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgreementTranslations() {
        return $this->hasMany(AgreementTranslation::className(), ['agreement_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\AgreementQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\AgreementQuery(get_called_class());
    }
}
