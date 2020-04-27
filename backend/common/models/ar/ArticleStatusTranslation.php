<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "article_status_translation".
 *
 * @property integer $article_status_id
 * @property integer $language_id
 * @property string $name
 *
 * @property ArticleStatus $articleStatus
 * @property Language $language
 */
class ArticleStatusTranslation extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'article_status_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['article_status_id', 'language_id', 'name'], 'required'],
			[['article_status_id', 'language_id'], 'integer'],
			[['name'], 'string', 'max' => 128],
			[['article_status_id', 'language_id'], 'unique', 'targetAttribute' => ['article_status_id', 'language_id']],
			[['article_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => ArticleStatus::className(), 'targetAttribute' => ['article_status_id' => 'id']],
			[['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']]
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'article_status_id' => Yii::t('app', 'Article Status ID'),
            'language_id' => Yii::t('app', 'Language ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleStatus() {
        return $this->hasOne(ArticleStatus::className(), ['id' => 'article_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage() {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\ArticleStatusTranslationQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\ArticleStatusTranslationQuery(get_called_class());
    }
}
