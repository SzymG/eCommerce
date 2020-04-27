<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString(ucfirst(Inflector::camel2words(StringHelper::basename($generator->modelClass), false))) ?> . ' #' . $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(ucfirst(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass), false)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">

    <h1><?= "<?= " ?>Html::encode($this->title) ?></h1>

    <p>
    	<?= '<?php if(empty($withoutUpdating)) {' ?> ?>
    		<?= "<?= " ?>Html::a(<?= $generator->generateString('Update') ?>, ['update', <?= $urlParams ?>], ['class' => 'btn btn-primary']) ?>
    	<?= "<?php }" ?> ?>
        <?= '<?php if(empty($withoutDeleting)) {' ?> ?>
	        <?= "<?= " ?>Html::a(<?= $generator->generateString('Delete') ?>, ['delete', <?= $urlParams ?>], [
		            'class' => 'btn btn-danger',
		            'data' => [
			                'confirm' => <?= $generator->generateString('Are you sure you want to delete this item?') ?>,
			                'method' => 'post',
		            ],
	        ]) ?>
		<?= "<?php }" ?> ?>
    </p>

    <?= "<?= " ?>DetailView::widget([
	        'model' => $model,
	        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ''],
	        'attributes' => [
<?php
if(($tableSchema = $generator->getTableSchema()) === false) {
    foreach($generator->getColumnNames() as $name) {
        echo "\t\t\t\t\t'" . $name . "',\n";
    }
} 
else {
    foreach($generator->getTableSchema()->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        echo "\t\t\t\t\t'" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
    }
}
?>
        	],
    ]) ?>

</div>
