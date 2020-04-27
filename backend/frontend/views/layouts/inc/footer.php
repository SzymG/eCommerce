<?php
    use yii\helpers\Html;
    
    // TODO: Znaleźć najlepsze rozwiązanie na przechowywanie danych firmy w jednym miejscu
?>

<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6 text-center text-lg-left">
				&copy; <?= 
				    Html::encode(Yii::$app->name).' '.date('Y')
				    .', '.mb_strtolower(Yii::t('app', 'createdBy'), 'utf-8').' Wilda Software'; 
                ?>
			</div>
			<div class="col-12 col-lg-6 text-center text-lg-right">
			</div>
		</div>
	</div>
</footer>