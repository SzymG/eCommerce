<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ars\RegionTranslationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerCssFile('@web/thirdparty/fontawesome/css/all.min.css');

if(empty($withoutDecorations)) {
	if(!empty($searchModel)) {
		$this->title = Yii::t('app', 'regionTranslations');
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
<div class="region-translation-index">

	<?php if(empty($withoutDecorations)) { ?>
    	<h1><?= Html::encode($this->title) ?></h1>
	<?php } else { ?>
    	<h2><?= Yii::t('app', 'regionTranslations') ?></h2>
	<?php } ?>

	<?php if(!empty($searchModel)) { ?>
		<div class="search-form" style="display:none">
			<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
		</div>
	<?php } ?>

    <p>
    	<?php if(empty($withoutCreating)) {
			$url = ['region-translation/create'];
            if(isset($regionId)) {
                $url += ['id' => $regionId];
            }
			echo Html::a(Yii::t('app', 'createRegionTranslation'), $url, ['class' => 'btn btn-success']);
		} ?>
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
							'attribute' => 'region',
							'value' => 'region.symbol'
						],
						[
							'attribute' => 'language',
							'value' => 'language.name'
						],
						'name',
            			[
            					'class' => 'backend\components\ActionColumn',
            					'deleteConfirmMessage' => Yii::t('app', 'Are you sure you want to delete this item?'),
            					'visibleButtons' => ['delete' => empty($withoutDeleting), 'update' => empty($withoutUpdating)],
								'contentOptions' => ['class' => 'action-column'],
								'controller' => 'region-translation',
            			],
        		],
    	]); ?>
	<?php Pjax::end(); ?>

</div>
