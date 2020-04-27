<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ar\RankTranslation */

$this->title = Yii::t('app', 'updateRankTranslation') . ' #' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'rankTranslation') . ' #' . $model->name, 'url' => ['view', 'rank_id' => $model->rank_id, 'language_id' => $model->language_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'update');
?>
<div class="rank-translation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        	'model' => $model,
    ]) ?>
</div>
