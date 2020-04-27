<?php

namespace common\models\aq;

use common\models\ar\EmailConfig;

/**
 * This is the ActiveQuery class for [[\common\models\ar\EmailConfig]].
 *
 * @see \common\models\ar\EmailConfig
 */
class EmailConfigQuery extends \yii\db\ActiveQuery {

    /*public function active() {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ar\EmailConfig[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ar\EmailConfig|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

    public static function getDefaultEmailConfig() {
    	return EmailConfig::find()->orderBy('id')->limit(1)->one();
    }
}