<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ar\User */

$this->title = Yii::t('app', 'updateUser') . ' #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'user') . ' #' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'update');
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        	'model' => $model,
            'isUpdate' => true
    ]) ?>

</div>
