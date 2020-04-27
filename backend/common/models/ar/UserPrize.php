<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "user_prize".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $prize_id
 * @property string $date_creation
 *
 * @property Prize $prize
 * @property User $user
 */
class UserPrize extends \yii\db\ActiveRecord {

    const SCENARIO_PRIZE_REQUIRED = 'prize_required';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user_prize';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['user_id', 'prize_id'], 'integer'],
			[['date_creation'], 'safe'],
			[['prize_id'], 'exist', 'skipOnError' => true, 'targetClass' => Prize::className(), 'targetAttribute' => ['prize_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['user_id', 'prize_id'], 'required', 'on' => self::SCENARIO_PRIZE_REQUIRED],
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'userId'),
            'prize_id' => Yii::t('app', 'prize'),
            'date_creation' => Yii::t('app', 'dateCreation'),
            'userEmail' => Yii::t('app', 'email'),
            'prize' => Yii::t('app', 'prize'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrize() {
        return $this->hasOne(Prize::className(), ['id' => 'prize_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\UserPrizeQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\UserPrizeQuery(get_called_class());
    }
}
