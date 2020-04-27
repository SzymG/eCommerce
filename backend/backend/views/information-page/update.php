<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ar\InformationPage */

$this->title = Yii::t('app', 'updateInformationPage') . ' #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'informationPages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'informationPage') . ' #' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'update');
?>
<div class="information-page-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        	'model' => $model,
    ]) ?>

</div>
