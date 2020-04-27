<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
        ],
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'templateFile' => 'console/templates/migration.php'
        ],
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'baseUrl' => '',
            'hostInfo' => 'http://example.com',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                    '/' => 'site/index',
                    '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                    '<controller:\w+>/<action:\w+>/<id:\d+>-<title:.*?>'=>'<controller>/<action>',
                    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                    '<controller:\w+>/<action:\w+>/<title:.*?>'=>'<controller>/<action>',
                    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ]
        ],
    ],
    'params' => $params,
];
