<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $author
 * @property string $date_publication
 * @property integer $is_global
 * @property integer $status_id
 * @property string $url_header_photo
 *
 * @property ArticleStatus $status
 * @property User $author0
 * @property ArticleRegion[] $articleRegions
 * @property Region[] $regions
 */
class Article extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['title', 'author', 'status_id'], 'required'],
			[['content'], 'string'],
			[['author', 'is_global', 'status_id'], 'integer'],
			[['date_publication'], 'safe'],
			[['title', 'url_header_photo'], 'string', 'max' => 255],
			[['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => ArticleStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
			[['author'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author' => 'id']]
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'author' => Yii::t('app', 'Author'),
            'date_publication' => Yii::t('app', 'Date Publication'),
            'is_global' => Yii::t('app', 'Is Global'),
            'status_id' => Yii::t('app', 'Status ID'),
            'url_header_photo' => Yii::t('app', 'Url Header Photo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus() {
        return $this->hasOne(ArticleStatus::className(), ['id' => 'status_id']);
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
    public function getArticleRegions() {
        return $this->hasMany(ArticleRegion::className(), ['article_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegions() {
        return $this->hasMany(Region::className(), ['id' => 'region_id'])->viaTable('article_region', ['article_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\ArticleQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\ArticleQuery(get_called_class());
    }
}
