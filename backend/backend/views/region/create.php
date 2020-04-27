<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ar\Region */

$this->title = Yii::t('app', 'createRegion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'regions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        	'model' => $model,
    ]) ?>

</div>
