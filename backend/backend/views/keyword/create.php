<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ar\Keyword */

$this->title = Yii::t('app', 'createKeyword');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'keywords'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keyword-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        	'model' => $model,
    ]) ?>

</div>
