<?php

if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "10.0.0.88")
{
	$arrConfig['dbHost'] = 'localhost';
	$arrConfig['dbName'] = 'uturn';
	$arrConfig['dbUser'] = 'root';
	$arrConfig['dbPass'] = 'root';
	$siteUrl = "http://localhost/uturn/";
	$rootURL = "http://localhost/uturn";
}

else if($_SERVER['HTTP_HOST'] == "dev.iworklab.com" && substr(trim($_SERVER['PHP_SELF'],'/'),0,strpos(trim($_SERVER['PHP_SELF'],'/'),'/')) == 'uturn')
{
	$arrConfig['dbHost'] = 'localhost';	
	$arrConfig['dbName'] = 'devilabc_uturn';
	$arrConfig['dbUser'] = 'devilabc_uturn';
	$arrConfig['dbPass'] = 'muk~Nl;Jk3H}';
	$siteUrl = "http://i.vinove.com/uturn/";
	$rootURL = "http://i.vinove.com/uturn";
      
}
else{
    $arrConfig['dbHost'] = 'localhost';	
	$arrConfig['dbName'] = 'uturn';
	$arrConfig['dbUser'] = 'sandbox';
	$arrConfig['dbPass'] = 'vinove';
	$siteUrl = "http://i.vinove.com/uturn/";
	$rootURL = "http://i.vinove.com";
}
############### End DB configure here ######################


return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone' => 'Asia/Calcutta',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => 'false'
        ],
        
       'mail' => [
      'class' => 'yii\swiftmailer\Mailer',
       'viewPath' => '@common/mail',
        'useFileTransport' => false,
           
      'transport' => [
        'class' => 'Swift_SmtpTransport',
        'host' => 'localhost',
        'username' => '',
        'password' => '',
        'port' => '25',
      
      ],
          
    ],
    ],
];

