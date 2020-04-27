<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ar\InformationPage */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="information-page-form">

    <?php $form = ActiveForm::begin([
    		'id' => 'information-page-form-ajax',
    		'enableAjaxValidation' => true,
    ]); ?>

	<?= $form->field($model, 'symbol')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'create') : Yii::t('app', 'save'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>