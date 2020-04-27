<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ars\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerCssFile('@web/thirdparty/fontawesome/css/all.min.css');

if(empty($withoutDecorations)) {
	if(!empty($searchModel)) {
		$this->title = Yii::t('app', 'users');
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
<div class="user-index">

	<?php if(empty($withoutDecorations)) { ?>
    	<h1><?= Html::encode($this->title) ?></h1>
	<?php } else { ?>
    	<h2><?= Yii::t('app', 'users') ?></h2>
	<?php } ?>

	<?php if(!empty($searchModel)) { ?>
		<div class="search-form" style="display:none">
			<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
		</div>
	<?php } ?>

    <p>
    	<?php if(empty($withoutCreating)) { ?>
			<?= Html::a(Yii::t('app', 'createUser'), ['create'], ['class' => 'btn btn-success']) ?>
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
						// 'password',
						[
							'format' => 'email',
							'attribute' => 'email',
							'value' => function($model) {
								return $model->is_deleted ? Yii::t('app', 'userDeleted') : $model->email;
							}
						],
						[
							'attribute' => 'first_name',
							'value' => function($model) {
								return $model->is_deleted ? Yii::t('app', 'userDeleted') : $model->first_name;
							}
						],
						[
							'attribute' => 'last_name',
							'value' => function($model) {
								return $model->is_deleted ? Yii::t('app', 'userDeleted') : $model->last_name;
							}
						],
						// 'description:ntext',
						// 'career',
						// 'birth_year',
						// 'url_photo:url',
						// 'is_public',
						// 'region_id',
						// 'is_active',
						// 'is_deleted',
						// 'date_creation',
						// 'auth_token',
						// 'verification_code',
						// 'total_points',
						// 'rank_id',
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
