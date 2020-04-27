<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ar\Prize */

$this->title = Yii::t('app', 'createPrize');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'prizes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prize-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        	'model' => $model,
    ]) ?>

</div>
