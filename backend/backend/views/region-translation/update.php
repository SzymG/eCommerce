<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ar\RegionTranslation */

$this->title = Yii::t('app', 'updateRegionTranslation') . ' #' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'regionTranslation') . ' #' . $model->name, 'url' => ['view', 'region_id' => $model->region_id, 'language_id' => $model->language_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'update');
?>
<div class="region-translation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        	'model' => $model,
    ]) ?>

</div>
