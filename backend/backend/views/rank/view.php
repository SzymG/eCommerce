<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ar\Rank */

$this->title = Yii::t('app', 'rank') . ' #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ranks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    	<?php if(empty($withoutUpdating)) { ?>
    		<?= Html::a(Yii::t('app', 'update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    	<?php } ?>
        <?php if(empty($withoutDeleting)) { ?>
	        <?= Html::a(Yii::t('app', 'delete'), ['delete', 'id' => $model->id], [
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
					'id',
					'symbol',
					'points_required',
					'url_icon',
        	],
    ]) ?>

	<br>
	<?= Yii::$app->controller->renderPartial('../rank-translation/index', [
		'dataProvider' => $rankTranslationProvider,
		'withoutCreating' => false,
		'withoutUpdating' => false,
		'withoutDeleting' => false,
		'withoutDecorations' => true,
		'rankId' => $model->id
	]); ?>

</div>
