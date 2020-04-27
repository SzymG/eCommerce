<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ar\Prize */

$this->title = Yii::t('app', 'updatePrize') . ' #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'prizes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prize') . ' #' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'update');
?>
<div class="prize-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        	'model' => $model,
    ]) ?>

</div>
