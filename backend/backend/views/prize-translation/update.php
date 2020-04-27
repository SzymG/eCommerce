<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ar\PrizeTranslation */

$this->title = Yii::t('app', 'updatePrizeTranslation') . ' #' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'prizeTranslations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'prizeTranslation') . ' #' . $model->name, 'url' => ['view', 'prize_id' => $model->prize_id, 'language_id' => $model->language_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'update');
?>
<div class="prize-translation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        	'model' => $model,
    ]) ?>

</div>
