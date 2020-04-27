<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ar\UserPrize */

$this->title = Yii::t('app', 'updateUserPrize') . ' #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'userPrizes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'userPrize') . ' #' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'update');
?>
<div class="user-prize-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        	'model' => $model,
    ]) ?>

</div>
