<?php

namespace app\models\aq;

use app\models\ar\UserKeyword;

/**
 * This is the ActiveQuery class for [[UserKeyword]].
 *
 * @see UserKeyword
 */
class UserKeywordQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserKeyword[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserKeyword|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
