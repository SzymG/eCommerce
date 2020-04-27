<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

use yii\helpers\Html;
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

if(empty($withoutDecorations)) {
	if(!empty($searchModel)) {
		$this->title = <?= $generator->generateString(ucfirst(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass), false)))) ?>;
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
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">

	<?= '<?php if(empty($withoutDecorations)) {' ?> ?>
    	<h1><?= "<?= " ?>Html::encode($this->title) ?></h1>
	<?= "<?php } else {" ?> ?>
    	<h2><?= "<?= ".$generator->generateString(ucfirst(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass), false))))." ?>" ?></h2>
	<?= "<?php }" ?> ?>

<?php if(!empty($generator->searchModelClass)): ?>
	<?= '<?php if(!empty($searchModel)) {' ?> ?>
		<div class="search-form" style="display:none">
<?= "\t\t\t<?php " . ($generator->indexWidgetType === 'grid' ? "// " : "") ?>echo $this->render('_search', ['model' => $searchModel]); ?>
		</div>
	<?= "<?php }" ?> ?>
<?php endif; ?>

    <p>
    	<?= '<?php if(empty($withoutCreating)) {' ?> ?>
			<?= "<?= " ?>Html::a(<?= $generator->generateString('Create ' . Inflector::camel2words(StringHelper::basename($generator->modelClass), false)) ?>, ['create'], ['class' => 'btn btn-success']) ?>
		<?= '<?php }'?> ?>
		<?= '<?php if(!empty($searchModel)) {' ?><?= "\n" ?>
			//echo '&nbsp'. Html::button(Yii::t('app', 'Filters'), ['class' => 'btn btn-primary filter-button']);
		} ?>
    </p>

<?php if ($generator->indexWidgetType === 'grid'): ?>
	<?= '<?php Pjax::begin();' ?> ?>
    	<?= "<?= " ?>GridView::widget([
        		'dataProvider' => $dataProvider,
        		'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ''],
        		<?= !empty($generator->searchModelClass) ? "'filterModel' => !empty(\$searchModel) ? \$searchModel : null,\n\t\t\t\t'columns' => [\n" : "'columns' => [\n"; ?>
<?php
$count = 0;
if(($tableSchema = $generator->getTableSchema()) === false) {
    foreach($generator->getColumnNames() as $name) {
        if(++$count < 6) {
            echo "\t\t\t\t\t\t'" . $name . "',\n";
        } 
        else {
            echo "\t\t\t\t\t\t// '" . $name . "',\n";
        }
    }
} 
else {
    foreach($tableSchema->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        if(++$count < 6) {
			if($column->name === 'id') {
				echo "\t\t\t\t\t\t[\n";
				echo "\t\t\t\t\t\t\t\t'attribute' => 'id',\n";
				echo "\t\t\t\t\t\t\t\t'contentOptions' => ['class' => 'column-id'],\n";
				echo "\t\t\t\t\t\t],\n";
			}
			else {
            	echo "\t\t\t\t\t\t'" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
            }
        } 
        else {
			if($column->name === 'id') {
				echo "\t\t\t\t\t\t//[\n";
				echo "\t\t\t\t\t\t\t\t//'attribute' => 'id',\n";
				echo "\t\t\t\t\t\t\t\t//'contentOptions' => ['class' => 'column-id'],\n";
				echo "\t\t\t\t\t\t//],\n";
			}
			else {
            	echo "\t\t\t\t\t\t// '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
            }
        }
    }
}
?>
            			[
            					'class' => 'backend\components\ActionColumn',
            					'deleteConfirmMessage' => Yii::t('app', 'Are you sure you want to delete this item?'),
            					'visibleButtons' => ['delete' => empty($withoutDeleting), 'update' => empty($withoutUpdating)],
								'contentOptions' => ['class' => 'action-column'],
            			],
        		],
    	]); ?>
	<?= '<?php Pjax::end();' ?> ?>
<?php else: ?>
    <?= "<?= " ?>ListView::widget([
	        'dataProvider' => $dataProvider,
	        'itemOptions' => ['class' => 'item'],
	        'itemView' => function ($model, $key, $index, $widget) {
	            return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
	        },
    ]) ?>
<?php endif; ?>

</div>
