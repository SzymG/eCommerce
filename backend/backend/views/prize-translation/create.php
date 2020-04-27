<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ar\PrizeTranslation */

$this->title = Yii::t('app', 'createPrizeTranslation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'prizeTranslations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prize-translation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        	'model' => $model,
    ]) ?>

</div>
