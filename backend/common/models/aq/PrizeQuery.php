<?php

namespace common\models\aq;

/**
 * This is the ActiveQuery class for [[\common\models\ar\Prize]].
 *
 * @see \common\models\ar\Prize
 */
class PrizeQuery extends \yii\db\ActiveQuery {

    /*public function active() {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ar\Prize[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ar\Prize|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }
}