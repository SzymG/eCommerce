<?php
    use yii\web\JqueryAsset;

    echo $this->registerJsFile('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', ['depends' => [JqueryAsset::className()]]);
    echo $this->registerJsFile('@web/js/main.js', ['depends' => [JqueryAsset::className()]]);
    echo $this->registerJsFile('@web/js/grid.js', ['depends' => [JqueryAsset::className()]]);
?>