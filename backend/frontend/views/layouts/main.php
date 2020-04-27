<?php
    /* @var $this \yii\web\View */
    /* @var $content string */

    use common\widgets\Breadcrumbs;
    use frontend\assets\AppAsset;
    use common\widgets\Alert;
    
    AppAsset::register($this);
    $this->beginPage();
?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<?= Yii::$app->controller->renderPartial('//layouts/inc/head'); ?>
	<body>
		<?php $this->beginBody() ?>
		
        <?= Yii::$app->controller->renderPartial('//layouts/inc/navbar'); ?>

		<div class="wrap">
 			<div class="container">
        		<?= Breadcrumbs::widget([
					'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
					'homeLink' => false,
                ]) ?>
    	    	<?= Alert::widget() ?>
        		<?= $content ?>
    		</div>
		</div>

		<?= Yii::$app->controller->renderPartial('//layouts/inc/footer'); ?>

		<?php 
            echo Yii::$app->controller->renderPartial('//layouts/inc/scripts');
			echo $this->endBody(); 
        ?>
	</body>
</html>

<?php $this->endPage() ?>
