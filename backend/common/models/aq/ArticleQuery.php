<?php

namespace common\models\aq;

/**
 * This is the ActiveQuery class for [[\common\models\ar\Article]].
 *
 * @see \common\models\ar\Article
 */
class ArticleQuery extends \yii\db\ActiveQuery {

    /*public function active() {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ar\Article[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ar\Article|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }
}