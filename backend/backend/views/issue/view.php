<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ar\Issue */

$this->title = Yii::t('app', 'issue') . ' #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'issues'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issue-view">

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
					'message:ntext',
					'timestamp',
					'url:url',
					'errors',
					'image:ntext',
					'agent',
					'cookies',
					'platform',
					'screen_size',
					'available_screen_size',
					'inner_size',
					'color_depth',
					'orientation',
					'date_creation',
        	],
    ]) ?>

</div>
