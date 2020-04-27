<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "user_history".
 *
 * @property integer $id
 * @property integer $user_subject_id
 * @property integer $user_id
 * @property string $data_before
 * @property string $data_after
 * @property string $date_creation
 */
class UserHistory extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user_history';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['user_subject_id', 'user_id'], 'required'],
			[['user_subject_id', 'user_id'], 'integer'],
			[['data_before', 'data_after'], 'string'],
			[['date_creation'], 'safe']
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_subject_id' => Yii::t('app', 'User Subject ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'data_before' => Yii::t('app', 'Data Before'),
            'data_after' => Yii::t('app', 'Data After'),
            'date_creation' => Yii::t('app', 'Date Creation'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\UserHistoryQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\UserHistoryQuery(get_called_class());
    }
}
