<?php

use common\models\types\RoleType;
use yii\filters\AccessControl;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'ecommerce',
    'name' => 'Ecommerce - panel administracyjny',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'class' => 'common\components\Request',
            'web'=> '/backend/web',
            'adminUrl' => '/admin',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\ar\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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

                    '<controller:[a-z\-]+>/view/<id:\d+>'=>'<controller>/view',
                    '<controller:[a-z\-]+>/<action:[a-z\-]+>/<id:\d+>'=>'<controller>/<action>',
                    '<controller:[a-z\-]+>/<action:[a-z\-]+>'=>'<controller>/<action>',
            ]
        ],
        'urlManagerFrontend' => [
                'class' => 'yii\web\UrlManager',
                'baseUrl' => '/',
                'enablePrettyUrl' => true,
                'showScriptName' => false,
                'enableStrictParsing' => false
        ],
    ],
    'params' => $params,
    'as access' => [
        'class' => AccessControl::className(),
        'rules' => [
            [
                'actions' => ['login', 'index'],
                'allow' => true,
                'controllers' => ['site'],
            ],
            [
                'actions' => ['logout'],
                'allow' => true,
                'controllers' => ['site'],
                'roles' => ['@'],
            ],
            [
                'allow' => true,
                'roles' => [RoleType::ADMIN],
            ],
        ],
    ],
];
