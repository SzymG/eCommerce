<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "article_status".
 *
 * @property integer $id
 * @property string $symbol
 *
 * @property Article[] $articles
 * @property ArticleStatusTranslation[] $articleStatusTranslations
 * @property Language[] $languages
 */
class ArticleStatus extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'article_status';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['symbol'], 'string', 'max' => 32]
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
    public function getArticles() {
        return $this->hasMany(Article::className(), ['status_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleStatusTranslations() {
        return $this->hasMany(ArticleStatusTranslation::className(), ['article_status_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages() {
        return $this->hasMany(Language::className(), ['id' => 'language_id'])->viaTable('article_status_translation', ['article_status_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\ArticleStatusQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\ArticleStatusQuery(get_called_class());
    }
}
