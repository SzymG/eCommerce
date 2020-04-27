<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "event_translation".
 *
 * @property integer $event_id
 * @property integer $language_id
 * @property string $title
 * @property string $description
 *
 * @property Event $event
 * @property Language $language
 */
class EventTranslation extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'event_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['event_id', 'language_id'], 'required'],
			[['event_id', 'language_id'], 'integer'],
			[['description'], 'string'],
			[['title'], 'string', 'max' => 255],
			[['event_id', 'language_id'], 'unique', 'targetAttribute' => ['event_id', 'language_id']],
			[['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
			[['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']]
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'event_id' => Yii::t('app', 'Event ID'),
            'language_id' => Yii::t('app', 'Language ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
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
    public function getLanguage() {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\EventTranslationQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\EventTranslationQuery(get_called_class());
    }
}
