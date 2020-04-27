<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ar\RankTranslation */

$this->title = Yii::t('app', 'rankTranslation') . ' #' . $model->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rank-translation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    	<?php if(empty($withoutUpdating)) { ?>
    		<?= Html::a(Yii::t('app', 'update'), ['update', 'rank_id' => $model->rank_id, 'language_id' => $model->language_id], ['class' => 'btn btn-primary']) ?>
    	<?php } ?>
        <?php if(empty($withoutDeleting)) { ?>
	        <?= Html::a(Yii::t('app', 'delete'), ['delete', 'rank_id' => $model->rank_id, 'language_id' => $model->language_id], [
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
					'attribute' => 'rank_id',
					'value' => $model->rank->symbol,
				],
				[
					'attribute' => 'language_id',
					'value' => $model->language->name,
				],
				'name',
        	],
    ]) ?>

</div>
