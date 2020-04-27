<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ar\InformationPageTranslation */

$this->title = Yii::t('app', 'createInformationPageTranslation');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="information-page-translation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        	'model' => $model,
    ]) ?>

</div>
