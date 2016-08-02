<?php

$params = require(__DIR__ . '/params.php');

$lists_module = ['admin','posts','videos','albums','category'];
$module_path = realpath(__DIR__.'/../modules');
Yii::setAlias('@module_path',$module_path);
Yii::setAlias('@modules',json_encode($lists_module));
 
foreach($lists_module as $v){
    $modules[$v] =  [
        
            'class' => 'app\modules\\'.$v.'\Module',
        
    ];
  

}

$modules['redactor'] = [
    'class' => 'yii\redactor\RedactorModule',
    'uploadDir' => '@webroot/upload',
    'uploadUrl' => '@web/upload',
    'imageAllowExtensions'=>['jpg','png','gif']
];


$config = [
    'id' => 'basic',
    'language'=>'zh-CN',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => $modules,
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '25NHlMcuLGHYNhu5iZkGwx_r_RYWUN_P',
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

       'mongodb' => [
            'class' => '\yii\mongodb\Connection',
            'dsn' => 'mongodb://localhost:27017/classcart',
        ],

        'db' => [
            'class' => '\yii\mongodb\Database',
           // 'dsn' => 'mongodb://localhost:27017/classcart',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,

            'suffix' => '.html',
            'rules' => [
            ],
        ],
        

        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators'=>['modelClass'=>'yii\mongodb\gii\model\Generator'],
        'allowedIPs' => ['127.0.0.1', '::1',],
    ];
}

return $config;
