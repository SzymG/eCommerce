<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ar\PrizeTranslation */

$this->title = Yii::t('app', 'prizeTranslation') . ' #' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'prizeTranslations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prize-translation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    	<?php if(empty($withoutUpdating)) { ?>
    		<?= Html::a(Yii::t('app', 'update'), ['update', 'prize_id' => $model->prize_id, 'language_id' => $model->language_id], ['class' => 'btn btn-primary']) ?>
    	<?php } ?>
        <?php if(empty($withoutDeleting)) { ?>
	        <?= Html::a(Yii::t('app', 'delete'), ['delete', 'prize_id' => $model->prize_id, 'language_id' => $model->language_id], [
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
					'attribute' => 'prize_id',
					'value' => $model->prize->symbol,
				],
				[
					'attribute' => 'language_id',
					'value' => $model->language->name,
				],
				'name',
        	],
    ]) ?>

</div>
