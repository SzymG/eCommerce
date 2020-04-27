<?php
    /* @var $this \yii\web\View */
    /* @var $content string */

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
		
		<div class="wrap">
 			<div class="container">
        		<?= Alert::widget() ?>
        		<?= $content ?>
    		</div>
		</div>

		<?php 
            echo Yii::$app->controller->renderPartial('//layouts/inc/scripts');
			echo $this->endBody(); 
        ?>
	</body>
</html>

<?php $this->endPage() ?>
