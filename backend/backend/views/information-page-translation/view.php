<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ar\InformationPageTranslation */

$this->title = Yii::t('app', 'informationPageTranslation');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="information-page-translation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    	<?php if(empty($withoutUpdating)) { ?>
    		<?= Html::a(Yii::t('app', 'update'), ['update', 'information_page_id' => $model->information_page_id, 'language_id' => $model->language_id], ['class' => 'btn btn-primary']) ?>
    	<?php } ?>
        <?php if(empty($withoutDeleting)) { ?>
	        <?= Html::a(Yii::t('app', 'delete'), ['delete', 'information_page_id' => $model->information_page_id, 'language_id' => $model->language_id], [
		            'class' => 'btn btn-danger',
		            'data' => [
			                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
			                'method' => 'post',
		            ],
	        ]) ?>
		<?php } ?>
    </p>

    <?= DetailView::widget([
	        'model' => $model,
	        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ''],
	        'attributes' => [
				[
					'attribute' => 'information_page_id',
					'value' => $model->informationPage->symbol,
				],
				[
					'attribute' => 'language_id',
					'value' => substr($model->language->name, 0, 40)
				],
				'name',
        	],
    ]) ?>

</div>
