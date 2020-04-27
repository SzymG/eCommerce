<?php

namespace common\models\aq;

/**
 * This is the ActiveQuery class for [[\common\models\ar\Role]].
 *
 * @see \common\models\ar\Role
 */
class RoleQuery extends \yii\db\ActiveQuery {

    /*public function active() {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ar\Role[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ar\Role|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }
}