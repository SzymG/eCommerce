<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ar\RegionTranslation */

$this->title = Yii::t('app', 'createRegionTranslation');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-translation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        	'model' => $model,
    ]) ?>

</div>
