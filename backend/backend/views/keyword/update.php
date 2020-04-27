<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ar\Keyword */

$this->title = Yii::t('app', 'updateKeyword') . ' #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'keywords'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Keyword') . ' #' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'update');
?>
<div class="keyword-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        	'model' => $model,
    ]) ?>

</div>
