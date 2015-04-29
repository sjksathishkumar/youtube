<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
    
      
);
require(__DIR__ . '/messages.php');
require(__DIR__ . '/tables.php');

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
	'support' => [
            'class' => 'app\model\support',
        ],

	],
    'components' => [
        'user' => [
            'identityClass' => 'app\models\Admin',
            'enableAutoLogin' => false,
        ],
        
        'thumbnail' => [
        'class' => 'yii\thumbnail\EasyThumbnail',
        'cacheAlias' => 'assets/gallery_thumbnails',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'assetManager' => [
            'converter' => [
                'class' => 'yii\web\AssetConverter',
                'commands' => [
                    'less' => ['css', 'lessc {from} {to} --no-color'],
                    'ts' => ['js', 'tsc --out {to} {from}'],
                ],
            ],
        ],
        'urlManager' => [
                 'class' => 'yii\web\UrlManager',
                 'enablePrettyUrl' => true,
            
               // 'rules' => require(__DIR__ . '/routes.php'), 
        ],
    ],
    
    'params' => $params,
    'modules' => [
         'gridview' => [
'class' => '\kartik\grid\Module'
             
// enter optional module parameters below - only if you need to
// use your own export download action or custom translation
// message source
// 'downloadAction' => 'gridview/export/download',
// 'i18n' => []
]
        ],
];

