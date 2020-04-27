<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ar\UserPrize */

$this->title = Yii::t('app', 'createUserPrize');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'userPrizes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-prize-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        	'model' => $model,
    ]) ?>

</div>
