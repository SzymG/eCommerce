<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "event_region".
 *
 * @property integer $event_id
 * @property integer $region_id
 *
 * @property Event $event
 * @property Region $region
 */
class EventRegion extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'event_region';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['event_id', 'region_id'], 'required'],
			[['event_id', 'region_id'], 'integer'],
			[['event_id', 'region_id'], 'unique', 'targetAttribute' => ['event_id', 'region_id']],
			[['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
			[['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']]
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'event_id' => Yii::t('app', 'Event ID'),
            'region_id' => Yii::t('app', 'Region ID'),
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
    public function getRegion() {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\EventRegionQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\EventRegionQuery(get_called_class());
    }
}
