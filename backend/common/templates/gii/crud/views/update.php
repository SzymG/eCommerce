<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString('Update '.Inflector::camel2words(StringHelper::basename($generator->modelClass), false)) ?> . ' #' . $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(ucfirst(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass), false)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(ucfirst(Inflector::camel2words(StringHelper::basename($generator->modelClass), false))) ?> . ' #' . $model-><?= $generator->getNameAttribute() ?>, 'url' => ['view', <?= $urlParams ?>]];
$this->params['breadcrumbs'][] = <?= $generator->generateString('Update') ?>;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-update">

    <h1><?= "<?= " ?>Html::encode($this->title) ?></h1>

    <?= "<?= " ?>$this->render('_form', [
        	'model' => $model,
    ]) ?>

</div>
