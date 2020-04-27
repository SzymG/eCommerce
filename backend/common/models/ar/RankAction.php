<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "rank_action".
 *
 * @property integer $id
 * @property string $symbol
 * @property integer $points
 *
 * @property UserAction[] $userActions
 */
class RankAction extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'rank_action';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['points'], 'integer'],
			[['symbol'], 'string', 'max' => 64]
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'symbol' => Yii::t('app', 'Symbol'),
            'points' => Yii::t('app', 'Points'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserActions() {
        return $this->hasMany(UserAction::className(), ['rank_action_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\RankActionQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\RankActionQuery(get_called_class());
    }
}
