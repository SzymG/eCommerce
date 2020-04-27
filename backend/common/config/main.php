<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages'
                ],
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
            'assignmentFile' => '@common/rbac/assignments.php',
            'itemFile' => '@common/rbac/items.php',
            'ruleFile' => '@common/rbac/rules.php'
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null, // do not publish the bundle
                    'js' => [
                        [
                            'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',
                            'integrity' => 'sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT',
                            'crossorigin' => 'anonymous',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'language' => 'pl',
    'sourceLanguage' => 'en',
    'timeZone' => 'Europe/Berlin',
];
