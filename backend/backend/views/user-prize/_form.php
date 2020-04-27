<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\ar\User;
use common\models\ar\Prize;
use common\models\ar\PrizeTranslation;
use common\models\ar\Language;

/* @var $this yii\web\View */
/* @var $model common\models\ar\UserPrize */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-prize-form">

    <?php $form = ActiveForm::begin([
    		'id' => 'user-prize-form-ajax',
    		'enableAjaxValidation' => true,
    ]); ?>

	<?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(
            User::find()->all(), 'id', function($item) {
                return User::discoverNameForm($item);
            }
        ))->label(Yii::t('app', 'user'));
    ?>

	<?= $form->field($model, 'prize_id')->dropDownList(ArrayHelper::map(
        Prize::find()->all(), 'id', function($item) {
            $language = Language::findOne(['symbol' => Yii::$app->language]);
            $translation = PrizeTranslation::findOne(['prize_id' => $item->id, 'language_id' => $language->id]);
            if(!empty($translation)) {
                return $translation->name;
            }
            return $item->symbol;
        }
    )) ?>

	<?= $form->field($model, 'date_creation')->textInput(['disabled' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'create') : Yii::t('app', 'save'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>