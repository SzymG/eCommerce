<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "prize".
 *
 * @property integer $id
 * @property string $symbol
 *
 * @property PrizeTranslation[] $prizeTranslations
 * @property UserPrize[] $userPrizes
 */
class Prize extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'prize';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['symbol'], 'string', 'max' => 128]
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

    public function getTranslation() {
    	$translations = $this->prizeTranslations;
    	if(empty($translations)) {
    		return $this->symbol;
    	}
    
    	foreach($translations as $t) {
    		if($t->language->symbol === Yii::$app->language) {
    			return $t->name;
    		}
    	}
    
    	return $translations[0];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrizeTranslations() {
        return $this->hasMany(PrizeTranslation::className(), ['prize_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserPrizes() {
        return $this->hasMany(UserPrize::className(), ['prize_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\PrizeQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\PrizeQuery(get_called_class());
    }
}
