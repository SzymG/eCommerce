<?php

namespace common\models\aq;

/**
 * This is the ActiveQuery class for [[\common\models\ar\UserHistory]].
 *
 * @see \common\models\ar\UserHistory
 */
class UserHistoryQuery extends \yii\db\ActiveQuery {

    /*public function active() {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ar\UserHistory[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ar\UserHistory|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }
}