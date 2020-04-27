<?php

namespace common\models\ar;

use app\models\ar\UserKeyword;
use common\models\aq\KeywordQuery;
use Yii;

/**
 * This is the model class for table "keyword".
 *
 * @property int $id
 * @property string $symbol
 *
 * @property KeywordTranslation[] $keywordTranslations
 * @property Language[] $languages
 * @property UserKeyword[] $userKeywords
 */
class Keyword extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'keyword';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['symbol'], 'required'],
            [['symbol'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'symbol' => 'Symbol',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeywordTranslations()
    {
        return $this->hasMany(KeywordTranslation::className(), ['keyword_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasMany(Language::className(), ['id' => 'language_id'])->viaTable('keyword_translation', ['keyword_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserKeywords()
    {
        return $this->hasMany(UserKeyword::className(), ['keyword_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return KeywordQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KeywordQuery(get_called_class());
    }
}
