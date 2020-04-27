<?php

namespace common\models\ar;

use common\models\aq\KeywordTranslationQuery;
use Yii;

/**
 * This is the model class for table "keyword_translation".
 *
 * @property int $keyword_id
 * @property int $language_id
 * @property string $name
 *
 * @property Keyword $keyword
 * @property Language $language
 */
class KeywordTranslation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'keyword_translation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['keyword_id', 'language_id', 'name'], 'required'],
            [['keyword_id', 'language_id'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['keyword_id', 'language_id'], 'unique', 'targetAttribute' => ['keyword_id', 'language_id']],
            [['keyword_id'], 'exist', 'skipOnError' => true, 'targetClass' => Keyword::className(), 'targetAttribute' => ['keyword_id' => 'id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'keyword_id' => 'Keyword ID',
            'language_id' => 'Language ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeyword()
    {
        return $this->hasOne(Keyword::className(), ['id' => 'keyword_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

    /**
     * {@inheritdoc}
     * @return KeywordTranslationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KeywordTranslationQuery(get_called_class());
    }
}
