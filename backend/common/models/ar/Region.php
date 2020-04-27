<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property integer $id
 * @property string $symbol
 *
 * @property ArticleRegion[] $articleRegions
 * @property Article[] $articles
 * @property EventRegion[] $eventRegions
 * @property Event[] $events
 * @property RegionTranslation[] $regionTranslations
 * @property Language[] $languages
 * @property User[] $users
 */
class Region extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'region';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['symbol'], 'required'],
			[['symbol'], 'string', 'max' => 128]
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'symbol' => Yii::t('app', 'Symbol'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleRegions() {
        return $this->hasMany(ArticleRegion::className(), ['region_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles() {
        return $this->hasMany(Article::className(), ['id' => 'article_id'])->viaTable('article_region', ['region_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventRegions() {
        return $this->hasMany(EventRegion::className(), ['region_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents() {
        return $this->hasMany(Event::className(), ['id' => 'event_id'])->viaTable('event_region', ['region_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegionTranslations() {
        return $this->hasMany(RegionTranslation::className(), ['region_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages() {
        return $this->hasMany(Language::className(), ['id' => 'language_id'])->viaTable('region_translation', ['region_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers() {
        return $this->hasMany(User::className(), ['region_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\RegionQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\RegionQuery(get_called_class());
    }
}
