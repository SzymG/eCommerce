<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ar\InformationPageTranslation */

$this->title = Yii::t('app', 'updateInformationPageTranslation') . ' #' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'informationPageTranslation'), 'url' => ['view', 'information_page_id' => $model->information_page_id, 'language_id' => $model->language_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'update');
?>
<div class="information-page-translation-update">

    <?= $this->render('_form', [
        	'model' => $model,
    ]) ?>
</div>
