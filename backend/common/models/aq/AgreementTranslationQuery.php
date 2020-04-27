<?php

namespace common\models\aq;

/**
 * This is the ActiveQuery class for [[\common\models\ar\AgreementTranslation]].
 *
 * @see \common\models\ar\AgreementTranslation
 */
class AgreementTranslationQuery extends \yii\db\ActiveQuery {

    /*public function active() {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ar\AgreementTranslation[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ar\AgreementTranslation|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }
}