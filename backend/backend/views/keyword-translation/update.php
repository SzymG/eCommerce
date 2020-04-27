<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ar\KeywordTranslation */

$this->title = Yii::t('app', 'updateKeywordTranslation') . ' #' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'keywordTranslation') . ' #' . $model->name, 'url' => ['view', 'keyword_id' => $model->keyword_id, 'language_id' => $model->language_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'update');
?>
<div class="keyword-translation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        	'model' => $model,
    ]) ?>
</div>
