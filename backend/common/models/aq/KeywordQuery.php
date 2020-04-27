<?php

namespace common\models\aq;

use common\models\ar\Keyword;

/**
 * This is the ActiveQuery class for [[\common\models\ar\Keyword]].
 *
 * @see Keyword
 */
class KeywordQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Keyword[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Keyword|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
