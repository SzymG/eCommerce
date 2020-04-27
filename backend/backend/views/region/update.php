<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ar\Region */

$this->title = Yii::t('app', 'updateRegion') . ' #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'regions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Region') . ' #' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'update');
?>
<div class="region-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        	'model' => $model,
    ]) ?>

</div>
