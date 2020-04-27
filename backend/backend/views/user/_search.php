<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ars\UserSearch */
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

<div class="user-search">

    <?php $form = ActiveForm::begin([
	        'action' => ['index'],
	        'method' => 'get',
    ]); ?>

	<?= $form->field($model, 'id') ?>

	<?= $form->field($model, 'password') ?>

	<?= $form->field($model, 'email') ?>

	<?= $form->field($model, 'first_name') ?>

	<?= $form->field($model, 'last_name') ?>

	<?= $form->field($model, 'description') ?>

	<?= $form->field($model, 'career') ?>

	<?= $form->field($model, 'birth_year') ?>

	<?= $form->field($model, 'url_photo') ?>

	<?= $form->field($model, 'is_public') ?>

	<?= $form->field($model, 'region_id') ?>

	<?= $form->field($model, 'is_active') ?>

	<?= $form->field($model, 'is_deleted') ?>

	<?= $form->field($model, 'date_creation') ?>

	<?= $form->field($model, 'auth_token') ?>

	<?= $form->field($model, 'verification_code') ?>

	<?= $form->field($model, 'total_points') ?>

	<?= $form->field($model, 'rank_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default reset-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
