<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ars\RankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerCssFile('@web/thirdparty/fontawesome/css/all.min.css');

if(empty($withoutDecorations)) {
	if(!empty($searchModel)) {
		$this->title = Yii::t('app', 'ranks');
		$this->params['breadcrumbs'][] = $this->title;

		$this->registerJs('
			$(".filter-button").click(function(e){
				e.preventDefault();
				$(".search-form").toggle();
			});
		');
	}
}
?>
<div class="rank-index">

	<?php if(empty($withoutDecorations)) { ?>
    	<h1><?= Html::encode($this->title) ?></h1>
	<?php } else { ?>
    	<h2><?= Yii::t('app', 'ranks') ?></h2>
	<?php } ?>

	<?php if(!empty($searchModel)) { ?>
		<div class="search-form" style="display:none">
			<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
		</div>
	<?php } ?>

    <p>
    	<?php if(empty($withoutCreating)) { ?>
			<?= Html::a(Yii::t('app', 'createRank'), ['create'], ['class' => 'btn btn-success']) ?>
		<?php } ?>
		<?php if(!empty($searchModel)) {
			//echo '&nbsp'. Html::button(Yii::t('app', 'Filters'), ['class' => 'btn btn-primary filter-button']);
		} ?>
    </p>

	<?php Pjax::begin(); ?>
    	<?= GridView::widget([
        		'dataProvider' => $dataProvider,
        		'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ''],
        		'filterModel' => !empty($searchModel) ? $searchModel : null,
				'columns' => [
						[
								'attribute' => 'id',
								'contentOptions' => ['class' => 'column-id'],
						],
						'symbol',
						'points_required',
						'url_icon',
            			[
            					'class' => 'backend\components\ActionColumn',
            					'deleteConfirmMessage' => Yii::t('app', 'Are you sure you want to delete this item?'),
            					'visibleButtons' => ['delete' => empty($withoutDeleting), 'update' => empty($withoutUpdating)],
								'contentOptions' => ['class' => 'action-column'],
            			],
        		],
    	]); ?>
	<?php Pjax::end(); ?>

</div>
