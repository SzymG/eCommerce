<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "event_user".
 *
 * @property integer $event_id
 * @property integer $user_id
 * @property integer $is_confirmed
 *
 * @property Event $event
 * @property User $user
 */
class EventUser extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'event_user';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['event_id', 'user_id', 'is_confirmed'], 'required'],
			[['event_id', 'user_id', 'is_confirmed'], 'integer'],
			[['event_id', 'user_id'], 'unique', 'targetAttribute' => ['event_id', 'user_id']],
			[['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
			[['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']]
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'event_id' => Yii::t('app', 'Event ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'is_confirmed' => Yii::t('app', 'Is Confirmed'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent() {
        return $this->hasOne(Event::className(), ['id' => 'event_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\EventUserQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\EventUserQuery(get_called_class());
    }
}
