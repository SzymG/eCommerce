<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ar\Issue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="issue-form">

    <?php $form = ActiveForm::begin([
    		'id' => 'issue-form-ajax',
    		'enableAjaxValidation' => true,
    ]); ?>

	<?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

	<?= $form->field($model, 'timestamp')->textInput() ?>

	<?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'errors')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'image')->textarea(['rows' => 6]) ?>

	<?= $form->field($model, 'agent')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'cookies')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'platform')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'screen_size')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'available_screen_size')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'inner_size')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'color_depth')->textInput() ?>

	<?= $form->field($model, 'orientation')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'date_creation')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'save'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>