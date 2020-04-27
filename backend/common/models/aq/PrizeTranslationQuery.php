<?php

namespace common\models\aq;

/**
 * This is the ActiveQuery class for [[\common\models\ar\PrizeTranslation]].
 *
 * @see \common\models\ar\PrizeTranslation
 */
class PrizeTranslationQuery extends \yii\db\ActiveQuery {

    /*public function active() {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ar\PrizeTranslation[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ar\PrizeTranslation|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }
}