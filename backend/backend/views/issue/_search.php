<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ars\IssueSearch */
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

<div class="issue-search">

    <?php $form = ActiveForm::begin([
	        'action' => ['index'],
	        'method' => 'get',
    ]); ?>

	<?= $form->field($model, 'id') ?>

	<?= $form->field($model, 'message') ?>

	<?= $form->field($model, 'timestamp') ?>

	<?= $form->field($model, 'url') ?>

	<?= $form->field($model, 'errors') ?>

	<?= $form->field($model, 'image') ?>

	<?= $form->field($model, 'agent') ?>

	<?= $form->field($model, 'cookies') ?>

	<?= $form->field($model, 'platform') ?>

	<?= $form->field($model, 'screen_size') ?>

	<?= $form->field($model, 'available_screen_size') ?>

	<?= $form->field($model, 'inner_size') ?>

	<?= $form->field($model, 'color_depth') ?>

	<?= $form->field($model, 'orientation') ?>

	<?= $form->field($model, 'date_creation') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'reset'), ['class' => 'btn btn-default reset-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
