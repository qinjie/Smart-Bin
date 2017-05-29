<?php

$db = require(__DIR__ . '/../../config/db.php');
$params = array_merge(
    require(__DIR__ . '/../../config/params.php'),
    require(__DIR__ . '/params.php')
);

$config = [
    'id' => 'api',
    'name' => 'Smart Bins',
    // Need to get one level up:
    'basePath' => dirname(__DIR__) . '/..',
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            'class' => 'app\api\modules\v1\Module',
        ],
    ],
    'components' => [
        'authManager' => [
            'class' => 'app\components\PhpManager',
            'defaultRoles' => ['user', 'manager', 'admin', 'master'],
            # if need to configure following files outside default folder (rbac)
//            'itemFile' => 'app\api\data\items.php', //Default path to items.php
//            'assignmentFile' => 'app\api\data\assignments.php', //Default path to assignments.php
//            'ruleFile' => 'app\api\data\rules.php', //Default path to rules.php
        ],
        'request' => [
            // Enable JSON Input
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
            'cookieValidationKey' => 'MXtBcX_ZOCJVA4g9MOz6JoHtUvNFgkv8',
        ],
        'response' => [
            'format' => 'json',
//            'class' => 'yii\web\Response',
//            'on beforeSend' => function ($event) {
//                $response = $event->sender;
//                if ($response->data !== null) {
//                    $response->data = [
//                        'success' => $response->isSuccessful,
//                        'data' => $response->data,
//                    ];
//                    $response->statusCode = 200;
//                }
//            },
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    // Create API log in the standard log dir
                    // But in file 'api.log':
                    'logFile' => '@app/runtime/logs/api.log',
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
//                # API for Account
//                'GET <version:\w+>/account/login' => '<version>/account/login',
//                'GET <version:\w+>/account/logout-all-sessions' => '<version>/account/logout-all-sessions',
//                'GET <version:\w+>/account/logout-current-session' => '<version>/account/logout-current-session',
                # API for ActiveRecords
                ['class' => 'yii\rest\UrlRule', 'pluralize' => false,
                    'controller' => [
                        'v1/project', 'v1/project-setting', 'v1/project-user',
                        'v1/node', 'v1/node-setting', 'v1/node-ping', ],
                    'extraPatterns' => ['GET search' => 'search'],
                ],
                ['class' => 'yii\rest\UrlRule', 'pluralize' => false,
                    'controller' => 'v1/node-data',
                    'extraPatterns' => [
                        'GET search' => 'search',
                        'GET latest-by-project/{projectId}' => 'latest-by-project',
                        'GET latest-all-labels-by-project/{projectId}' => 'latest-all-labels-by-project',
                        'GET latest-by-project-and-label/{projectId}/{label}' => 'latest-by-project-and-label',
                        'GET latest-all-labels-in-days-by-project/{projectId}/{pastDays}' => 'latest-all-labels-in-days-by-project',
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\w+>',
                        '{projectId}' => '<projectId:\\w+>',
                        '{label}' => '<label:[\\w+\\s+]+>',
                        '{pastDays}' => '<pastDays:\\w+>',
                    ],
                ],
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            # Settings for Restful API
            'enableAutoLogin' => false,
            'enableSession' => false,
            'loginUrl' => null
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'db' => $db,
    ],
    'params' => $params,
];

return $config;

