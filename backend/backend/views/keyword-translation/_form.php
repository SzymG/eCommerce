<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\ar\Region;
use common\models\ar\Keyword;
use common\models\ar\Language;

/* @var $this yii\web\View */
/* @var $model common\models\ar\KeywordTranslation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="keyword-translation-form">

    <?php $form = ActiveForm::begin([
    		'id' => 'keyword-translation-form-ajax',
    		'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($model, 'keyword_id')->dropDownList(ArrayHelper::map(
		Keyword::find()->orderBy('symbol')->all(), 'id', 'symbol'
	), ['disabled' => true]) ?>

    <?= $form->field($model, 'language_id')->dropDownList(ArrayHelper::map(
		Language::find()->orderBy('name')->all(), 'id', 'name'
	)) ?>

	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'create') : Yii::t('app', 'save'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>