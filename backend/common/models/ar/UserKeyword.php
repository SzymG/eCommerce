<?php

namespace app\models\ar;

use app\models\aq\UserKeywordQuery;
use common\models\ar\Keyword;
use common\models\ar\User;
use Yii;

/**
 * This is the model class for table "user_keyword".
 *
 * @property int $user_id
 * @property int $keyword_id
 *
 * @property Keyword $keyword
 * @property User $user
 */
class UserKeyword extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_keyword';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'keyword_id'], 'required'],
            [['user_id', 'keyword_id'], 'integer'],
            [['keyword_id'], 'exist', 'skipOnError' => true, 'targetClass' => Keyword::className(), 'targetAttribute' => ['keyword_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'keyword_id' => 'Keyword ID',
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return UserKeywordQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserKeywordQuery(get_called_class());
    }
}
