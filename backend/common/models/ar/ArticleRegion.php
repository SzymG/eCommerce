<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "article_region".
 *
 * @property integer $article_id
 * @property integer $region_id
 *
 * @property Article $article
 * @property Region $region
 */
class ArticleRegion extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'article_region';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['article_id', 'region_id'], 'required'],
			[['article_id', 'region_id'], 'integer'],
			[['article_id', 'region_id'], 'unique', 'targetAttribute' => ['article_id', 'region_id']],
			[['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['article_id' => 'id']],
			[['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']]
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'article_id' => Yii::t('app', 'Article ID'),
            'region_id' => Yii::t('app', 'Region ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle() {
        return $this->hasOne(Article::className(), ['id' => 'article_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion() {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\ArticleRegionQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\ArticleRegionQuery(get_called_class());
    }
}
