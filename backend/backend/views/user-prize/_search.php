<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ars\UserPrizeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$this->registerJs('
	$(".reset-button").click(function(e){
		e.preventDefault();
		$(".form-control").val("");
	});
');
?>

<div class="user-prize-search">

    <?php $form = ActiveForm::begin([
	        'action' => ['index'],
	        'method' => 'get',
    ]); ?>

	<?= $form->field($model, 'id') ?>

	<?= $form->field($model, 'user_id') ?>

	<?= $form->field($model, 'prize_id') ?>

	<?= $form->field($model, 'date_creation') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'reset'), ['class' => 'btn btn-default reset-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
