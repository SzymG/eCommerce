<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=mysql3.mydevil.net;dbname=m1558_absolwencidev',
            'username' => 'm1558_absolwenta',
            'password' => 'YCn5jojg6gJ5mSYSzr3T',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
    ],
];
