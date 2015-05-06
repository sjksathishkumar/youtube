<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
//use app\models\Admin;

use yii as YII;
use frontend\widgets\Alert;
use yii\widgets\ActiveForm;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
    
<html lang="<?= Yii::$app->language ?>">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Uturn</title>

    <!-- Bootstrap Core CSS -->
    <!--<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">-->
    <link rel="stylesheet" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/css_layout/bootstrap.min.css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!--<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">-->
    <link rel="stylesheet" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/font-awesome/css/font-awesome.min.css">

    <!-- Plugin CSS -->
    <!--<link rel="stylesheet" href="css/animate.min.css" type="text/css">-->
    <link rel="stylesheet" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/css_layout/animate.min.css">
    <!-- Custom CSS -->
    <!--<link rel="stylesheet" href="css/creative.css" type="text/css">-->
    <link rel="stylesheet" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/css_layout/creative.css">
    
    <!--Plugin JS-->
    <link rel="stylesheet" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js_layout/jquery.easing.min.js">
    <link rel="stylesheet" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js_layout/jquery.fittext.js">
    <link rel="stylesheet" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js_layout/wow.min.js">
    <link rel="stylesheet" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js_layout/jquery.checkradios.js">
    <link rel="stylesheet" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js_layout/chosen.jquery.min.js">
    <link rel="stylesheet" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js_layout/bootstrap-datetimepicker.min.js">
    <link rel="stylesheet" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js_layout/custom.js">
    
     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

 <body <?php if (!isset(Yii::$app->user->id)) echo 'class="login"'; ?> data-layout-sidebar="fixed" data-layout-topbar="fixed" class="sidebar-left">
<?php $this->beginBody() ?> 
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/frontend/web/img_layout/logo.png" align="logo"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">English <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Hindi</a></li>
                                <li><a href="#">Spanish</a></li>
                                <li><a href="#">Chinese</a></li>
                            
                            </ul>
                    </li>
      
                    <li>
                        <?php echo Html::a('<span>Join Uturn</span>', ['partner/joinuturn'], []); ?>
                    </li>
                    <li>
                        <?php echo Html::a('Sign In', ['partner/login'], []); ?>
                    </li>
                    <li>
                        <a class="" href="#">Contact Us</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
 
     <header>
        <?php echo $content; ?> 
     </header> 

     <footer>
<div class="container"><img src="img/pawered.png" align="logo"></div>
</footer>

<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript 
    <script src="js/creative.js"></script>-->

</body>
</html>

<?php $this->endPage() ?>
