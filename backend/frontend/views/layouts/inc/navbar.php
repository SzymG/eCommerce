<?php

use yii\helpers\Url;
$this->registerCssFile('@web/thirdparty/fontawesome/css/all.min.css');
?>

<header>
	<nav class="navbar navbar-expand-md navbar-blue">
		<a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>"><img src="<?= Url::to('@web/img/logo.png') ?>" alt="Logo" class="header-logo" /></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="fas fa-bars blue-toggler-icon"></i>
            </span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			</ul>
		</div>
	</nav>
</header>