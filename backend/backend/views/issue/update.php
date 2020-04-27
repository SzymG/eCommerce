<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ar\Issue */

$this->title = Yii::t('app', 'updateIssue') . ' #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'issues'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'issue') . ' #' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'update');
?>
<div class="issue-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        	'model' => $model,
    ]) ?>

</div>
