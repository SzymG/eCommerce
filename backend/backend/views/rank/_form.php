<?php


use kartik\file\FileInput;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ar\Rank */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rank-form">

    <?php $form = ActiveForm::begin([
    		'id' => 'rank-form-ajax',
    		'enableAjaxValidation' => false,
            'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

	<?= $form->field($model, 'symbol')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'points_required')->textInput(['maxlength' => true]) ?>
    <?php if($model->url_icon):
        echo $form->field($model, 'url_icon')->textInput(['maxlength' => true]);
    endif; ?>

    <?=
        $form->field($model, 'file_photo')->fileInput();
    ?>

    <img id="url_icon-container">

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'create') : Yii::t('app', 'save'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php

$this->registerJs('
            (new RankFormScript().init());
        ', View::POS_END);
?>