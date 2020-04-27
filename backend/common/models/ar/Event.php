<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property integer $id
 * @property string $date_start
 * @property string $date_end
 * @property string $date_publication
 * @property integer $author
 * @property integer $is_public
 * @property string $url_header_photo
 *
 * @property User $author0
 * @property EventRegion[] $eventRegions
 * @property Region[] $regions
 * @property EventTranslation[] $eventTranslations
 * @property Language[] $languages
 * @property EventUser[] $eventUsers
 * @property User[] $users
 */
class Event extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['date_start', 'date_end', 'date_publication'], 'safe'],
			[['author', 'is_public'], 'required'],
			[['author', 'is_public'], 'integer'],
			[['url_header_photo'], 'string', 'max' => 255],
			[['author'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author' => 'id']]
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'date_start' => Yii::t('app', 'Date Start'),
            'date_end' => Yii::t('app', 'Date End'),
            'date_publication' => Yii::t('app', 'Date Publication'),
            'author' => Yii::t('app', 'Author'),
            'is_public' => Yii::t('app', 'Is Public'),
            'url_header_photo' => Yii::t('app', 'Url Header Photo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor0() {
        return $this->hasOne(User::className(), ['id' => 'author']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventRegions() {
        return $this->hasMany(EventRegion::className(), ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegions() {
        return $this->hasMany(Region::className(), ['id' => 'region_id'])->viaTable('event_region', ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventTranslations() {
        return $this->hasMany(EventTranslation::className(), ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages() {
        return $this->hasMany(Language::className(), ['id' => 'language_id'])->viaTable('event_translation', ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventUsers() {
        return $this->hasMany(EventUser::className(), ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers() {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('event_user', ['event_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\EventQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\EventQuery(get_called_class());
    }
}
