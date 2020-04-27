<?php

namespace common\models\aq;

/**
 * This is the ActiveQuery class for [[\common\models\ar\Language]].
 *
 * @see \common\models\ar\Language
 */
class LanguageQuery extends \yii\db\ActiveQuery {

    /*public function active() {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ar\Language[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ar\Language|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }
}