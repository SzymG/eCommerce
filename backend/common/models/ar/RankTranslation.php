<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "rank_translation".
 *
 * @property integer $rank_id
 * @property integer $language_id
 * @property string $name
 *
 * @property Language $language
 * @property Rank $rank
 */
class RankTranslation extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'rank_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['rank_id', 'language_id', 'name'], 'required'],
            [['rank_id', 'language_id'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['rank_id', 'language_id'], 'unique', 'targetAttribute' => ['rank_id', 'language_id']],
            [['rank_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rank::className(), 'targetAttribute' => ['rank_id' => 'id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'rank_id' => Yii::t('app', 'rankId'),
            'language_id' => Yii::t('app', 'languageId'),
            'name' => Yii::t('app', 'name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage() {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRank() {
        return $this->hasOne(Rank::className(), ['id' => 'rank_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\RankTranslationQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\RankTranslationQuery(get_called_class());
    }
}
