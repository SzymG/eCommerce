<?php

namespace common\models\ar;

/**
 * This is the ActiveQuery class for [[InformationPageTranslation]].
 *
 * @see InformationPageTranslation
 */
class InformationPageTranslationQuery extends \yii\db\ActiveQuery {

    /*public function active() {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return InformationPageTranslation[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return InformationPageTranslation|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }
}