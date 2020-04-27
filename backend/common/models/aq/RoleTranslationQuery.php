<?php

namespace common\models\aq;

/**
 * This is the ActiveQuery class for [[\common\models\ar\RoleTranslation]].
 *
 * @see \common\models\ar\RoleTranslation
 */
class RoleTranslationQuery extends \yii\db\ActiveQuery {

    /*public function active() {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ar\RoleTranslation[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ar\RoleTranslation|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }
}