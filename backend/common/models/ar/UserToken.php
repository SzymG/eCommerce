<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "user_token".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $reset_token
 * @property integer $attempts
 *
 * @property User $user
 */
class UserToken extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user_token';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['user_id', 'attempts'], 'integer'],
			[['reset_token'], 'string', 'max' => 64],
			[['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']]
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'reset_token' => Yii::t('app', 'Reset Token'),
            'attempts' => Yii::t('app', 'Attempts'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\UserTokenQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\UserTokenQuery(get_called_class());
    }
}
