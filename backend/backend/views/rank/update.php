<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ar\Rank */

$this->title = Yii::t('app', 'updateRank') . ' #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ranks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rank') . ' #' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'update');
?>
<div class="rank-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        	'model' => $model,
    ]) ?>

</div>
