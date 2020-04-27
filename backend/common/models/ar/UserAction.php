<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "user_action".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $ip_address
 * @property string $date_creation
 * @property string $action
 * @property integer $rank_action_id
 *
 * @property RankAction $rankAction
 * @property User $user
 */
class UserAction extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user_action';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['user_id', 'action'], 'required'],
			[['user_id', 'rank_action_id'], 'integer'],
			[['date_creation'], 'safe'],
			[['ip_address'], 'string', 'max' => 50],
			[['action'], 'string', 'max' => 64],
			[['rank_action_id'], 'exist', 'skipOnError' => true, 'targetClass' => RankAction::className(), 'targetAttribute' => ['rank_action_id' => 'id']],
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
            'ip_address' => Yii::t('app', 'Ip Address'),
            'date_creation' => Yii::t('app', 'Date Creation'),
            'action' => Yii::t('app', 'Action'),
            'rank_action_id' => Yii::t('app', 'Rank Action ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRankAction() {
        return $this->hasOne(RankAction::className(), ['id' => 'rank_action_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\UserActionQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\UserActionQuery(get_called_class());
    }
}
