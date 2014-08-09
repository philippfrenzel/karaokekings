<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'cassandrapate',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'user' => [
          'class' => 'dektrium\user\Module',
          'admins' => ['philippfrenzel'],
          'components'=>[
            'manager' => [
                'userClass' => 'frenzelgmbh\appcommon\components\User'
            ]
          ]
        ],
        'appcommon'=>[
            'class'=>'frenzelgmbh\appcommon\Module',
        ],
        'pages'=>[
            'class'=>'frenzelgmbh\scms\Module',
        ],
        'packaii' => [
              'class' => 'schmunk42\packaii\Module',
              'gitHubUsername' => 'philippfrenzel',
              'gitHubPassword' => 'cassandra0903'
        ],
        'gridview' =>  [
              'class' => '\kartik\grid\Module'
        ]
    ],
    'components' => [
        'assetManager' => [
            'bundles' => [
                'yii\web\BootstrapAsset' => [
                     'sourcePath' => NULL,
                     'js' => ['amoeba/css/bootstrap.css']
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'fbUknSGWOIPHJh-Ddag27aG8zWJepKWO',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
