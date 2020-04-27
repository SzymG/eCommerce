<?php

use yii\helpers\Html;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\ar\Region;
use common\models\ar\InformationPage;
use common\models\ar\Language;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model common\models\ar\InformationPageTranslation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="information-page-translation-form">

    <?php $form = ActiveForm::begin([
    		'id' => 'information-page-translation-form-ajax',
    		'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($model, 'information_page_id')->dropDownList(ArrayHelper::map(
		InformationPage::find()->orderBy('symbol')->all(), 'id', 'symbol'
	), ['disabled' => true]) ?>

    <?= $form->field($model, 'language_id')->dropDownList(ArrayHelper::map(
		Language::find()->orderBy('name')->all(), 'id', 'name'
	)) ?>
    <?= $form->field($model, 'name')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => Yii::$app->language,
        'clientOptions' => [
            'force_br_newlines' => true,
            'force_p_newlines' => false,
            'forced_root_block' => '',


            'file_picker_callback' => new JsExpression("function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function() {
                  var file = this.files[0];
   
                  var reader = new FileReader();
                  reader.onload = function () {
     
                  var id = 'blobid' + (new Date()).getTime();
                  var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                  var base64 = reader.result.split(',')[1];
                  var blobInfo = blobCache.create(id, file, base64);
                  blobCache.add(blobInfo);

                  cb(blobInfo.blobUri(), { title: file.name });
                };
                reader.readAsDataURL(file);
            };
            input.click();
            }"),
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste image imagetools"
            ],

            'menubar'=> ["insert"],
            'automatic_uploads' => true,
            'file_picker_types'=> 'image',

            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image imageupload | fontselect | cut copy paste"
        ]
    ]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'create') : Yii::t('app', 'save'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>