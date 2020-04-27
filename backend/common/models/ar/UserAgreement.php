<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "user_agreement".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $agreement_id
 * @property integer $is_accepted
 * @property string $date
 */
class UserAgreement extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user_agreement';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['user_id', 'agreement_id'], 'required'],
			[['user_id', 'agreement_id', 'is_accepted'], 'integer'],
			[['date'], 'safe']
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'agreement_id' => Yii::t('app', 'Agreement ID'),
            'is_accepted' => Yii::t('app', 'Is Accepted'),
            'date' => Yii::t('app', 'Date'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\UserAgreementQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\UserAgreementQuery(get_called_class());
    }
}
