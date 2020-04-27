<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\ar\Region;
use common\models\ar\Rank;
use dosamigos\multiselect\MultiSelect;

/* @var $this yii\web\View */
/* @var $model common\models\ar\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
    		'id' => 'user-form-ajax',
    		'enableAjaxValidation' => true,
    ]); ?>

    <?php if($isUpdate): ?>
	    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'value'=> '']) ?>
    <?php else: ?>
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    <?php endif; ?>

	<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

	<?= $form->field($model, 'career')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'birth_year')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'url_photo')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'is_public')->checkbox() ?>

    <?= $form->field($model, 'is_success_story_public')->checkbox() ?>

    <?= $form->field($model, 'is_fate_accepted')->checkbox() ?>

	<?= $form->field($model, 'region_id')->dropDownList(ArrayHelper::map(
		Region::find()->orderBy('symbol')->all(), 'id', 'symbol'
	)) ?>

	<?= $form->field($model, 'is_active')->checkbox() ?>

	<?= $form->field($model, 'is_deleted')->checkbox() ?>

	<?= $form->field($model, 'date_creation')->textInput() ?>

	<?= $form->field($model, 'auth_token')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'verification_code')->textInput() ?>

	<?= $form->field($model, 'total_points')->textInput() ?>

	<?= $form->field($model, 'rank_id')->dropDownList(ArrayHelper::map(
		Rank::find()->orderBy('symbol')->all(), 'id', 'symbol'
	)) ?>

	<div class="form-group">
        <label><?= Yii::t('app', 'rolesName') ?></label>
        <div class="multi">
            <?=  MultiSelect::widget([
                            'id' => 'roles',
                            "options" => ['multiple' => 'multiple', 'class' => 'form-control'],
                            'data' => $model->getRolesArray(),
                            'name' => Html::getInputName($model, 'roleArray'),
                            'value' => $model->getUserRolesArray(),
                            "clientOptions" => [
                                'nonSelectedText' => '',
                                'nSelectedText' => mb_strtolower(Yii::t('app', 'Selected'), 'UTF-8'),
                                'buttonWidth' => '100%',
                            ],
                        ]); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'create') : Yii::t('app', 'save'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>