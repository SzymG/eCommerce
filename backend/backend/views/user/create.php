<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ar\User */

$this->title = Yii::t('app', 'createUser');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        	'model' => $model,
            'isUpdate' => false
    ]) ?>

</div>
