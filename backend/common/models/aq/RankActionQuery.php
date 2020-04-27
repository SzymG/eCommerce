<?php

namespace common\models\aq;

/**
 * This is the ActiveQuery class for [[\common\models\ar\RankAction]].
 *
 * @see \common\models\ar\RankAction
 */
class RankActionQuery extends \yii\db\ActiveQuery {

    /*public function active() {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ar\RankAction[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ar\RankAction|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }
}