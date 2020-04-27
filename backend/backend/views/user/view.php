<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ar\User */

$this->title = Yii::t('app', 'user') . ' #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

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
					// 'password',
					'email:email',
					'first_name',
					'last_name',
					'description:ntext',
					'career',
					'birth_year',
					[
						'format' => 'raw',
						'attribute' => 'url_photo',
						'value' => Html::a($model->url_photo, ['user/photo/', 'f' => $model->url_photo]),
					],
					[
						'format' => 'boolean',
						'attribute' => 'is_public',
						'filter' => [0 => Yii::t('app', 'No'), 1 => Yii::t('app', 'Yes')],
					],
					[
						'format' => 'boolean',
						'attribute' => 'is_success_story_public',
						'filter' => [0 => Yii::t('app', 'No'), 1 => Yii::t('app', 'Yes')],
					],
					[
						'format' => 'boolean',
						'attribute' => 'is_fate_accepted',
						'label' => Yii::t('app','isFateAccepted'),
						'filter' => [0 => Yii::t('app', 'No'), 1 => Yii::t('app', 'Yes')],
					],
					[
						'attribute' => 'region_id',
						'value' => $model->region->symbol ?? '',
					],
					[
						'format' => 'boolean',
						'attribute' => 'is_active',
						'filter' => [0 => Yii::t('app', 'No'), 1 => Yii::t('app', 'Yes')],
					],
					[
						'format' => 'boolean',
						'attribute' => 'is_deleted',
						'filter' => [0 => Yii::t('app', 'No'), 1 => Yii::t('app', 'Yes')],
					],
					'date_creation',
					'auth_token',
					'verification_code',
					'total_points',
					[
						'attribute' => 'rank_id',
						'value' => $model->rank->symbol ?? '',
					],
					'rolesName',
        	],
    ]) ?>

	<br>
	<?= Yii::$app->controller->renderPartial('../user-prize/index', [
		'dataProvider' => $userPrizeProvider,
		'withoutCreating' => false,
		'withoutUpdating' => false,
		'withoutDeleting' => false,
		'withoutDecorations' => true,
		'userId' => $model->id
	]); ?>

</div>
