<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ars\RankSearch */
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

<div class="rank-search">

    <?php $form = ActiveForm::begin([
	        'action' => ['index'],
	        'method' => 'get',
    ]); ?>

	<?= $form->field($model, 'id') ?>

	<?= $form->field($model, 'symbol') ?>

	<?= $form->field($model, 'points_required') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default reset-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
