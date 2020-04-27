<?php
return [
    'bootstrap' => ['gii'],
    'modules' => [
        'gii' => [
            'class' => 'yii\gii\Module',
            'generators' => [
                'model' => [
                    'class' => 'yii\gii\generators\model\Generator',
                    'templates' => [
                        'custom-template' => '@common/templates/gii/model',
                    ]
                ]
            ]
        ],
    ],
];
