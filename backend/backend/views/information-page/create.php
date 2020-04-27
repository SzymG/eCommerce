<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ar\InformationPage */

$this->title = Yii::t('app', 'createInformationPage');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'informationPages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="information-page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        	'model' => $model,
    ]) ?>

</div>
