<?php

namespace common\models\aq;

use common\models\ar\KeywordTranslation;

/**
 * This is the ActiveQuery class for [[KeywordTranslation]].
 *
 * @see KeywordTranslation
 */
class KeywordTranslationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return KeywordTranslation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return KeywordTranslation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
