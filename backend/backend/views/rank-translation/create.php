<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ar\RankTranslation */

$this->title = Yii::t('app', 'createRankTranslation');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rank-translation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        	'model' => $model,
    ]) ?>

</div>
