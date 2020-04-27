<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'name' => 'Absolwenci',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'class' => 'common\components\Request',
            'web'=> '/frontend/web',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\ar\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
            'loginUrl' => '@web/auth/default/login',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info'],
                    'logFile' => '@runtime/logs/info.log',
                    'logVars' => [],
                    'categories' => ['info']
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                '/' => 'site/index',
                
                '<controller:[a-z\-]+>/<id:\d+>'=>'<controller>/view',
                '<controller:[a-z\-]+>/<action:[a-z\-]+>/<id:\d+>-<title:.*?>'=>'<controller>/<action>',
                '<controller:[a-z\-]+>/<action:[a-z\-]+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:[a-z\-]+>/<action:[a-z\-]+>/<name:.*?>'=>'<controller>/<action>',
                '<controller:[a-z\-]+>/<action:[a-z\-]+>/<title:.*?>'=>'<controller>/<action>',
                '<controller:[a-z\-]+>/<action:[a-z\-]+>'=>'<controller>/<action>',
            ]
        ],
        'jwt' => [
            'class' => 'sizeg\jwt\Jwt',
            'key'   => '6PjpH7GMEupz6dZt',
        ],
    ],
    'modules' => [
        'product' => [
            'class' => 'frontend\modules\product\Product',
        ],
    ],
    'params' => $params,
];
