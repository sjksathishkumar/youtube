<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\models\Admin;

/* @var $this \yii\web\View */
/* @var $content string */

// Defining AppAsset which have css and js files

AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

     <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/plugins/jquery-ui/jquery.ui.sortable.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/plugins/touch-punch/jquery.touch-punch.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/plugins/select2/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/plugins/bootbox/jquery.bootbox.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/plugins/form/jquery.form.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/plugins/validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/plugins/validation/additional-methods.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/plugins/wizard/jquery.form.wizard.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/plugins/mockjax/jquery.mockjax.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/eakroko.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/application.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/demonstration.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/common.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/plugins/gritter/jquery.gritter.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/plugins/fileupload/bootstrap-fileupload.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/plugins/icheck/jquery.icheck.min.js"></script>

    <?php 

    if(Yii::$app->controller->getRoute() != 'user/create' && Yii::$app->controller->getRoute() != 'user/update' && Yii::$app->controller->getRoute() != 'ticket/create' && Yii::$app->controller->getRoute() != 'ticket/update' && Yii::$app->controller->getRoute() != 'ticket/index')
    {?>
    <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/bootstrap.min.js"></script>
    <?php }?>
      
       
        <script src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/plugins/placeholder/jquery.placeholder.min.js"></script>

         <script>
                $(document).ready(function() {

                    $('input, textarea').placeholder();
                });
            </script>
            
  
</head>

<body <?php if (!isset(Yii::$app->user->id)) echo 'class="login"'; ?> data-layout-sidebar="fixed" data-layout-topbar="fixed" class="sidebar-left">
<?php $this->beginBody() ?>   
    <?php if (isset(Yii::$app->user->id)){ ?>
            <!-- NAVIGATION STARTS-->
            <div id="navigation">
                <div class="container-fluid">
                <?php echo Html::a('', ['site/index'], ['id' => 'brand']); ?>
                    <?php echo Html::a('<i class="icon-reorder"></i>', '#', array('class' => 'toggle-nav', 'rel' => 'tooltip', 'title' => 'Toggle navigation', 'data-placement' => 'bottom')); ?>

                    <ul class='main-nav'>
                        <?php
                        //$controllerName =Yii::app()->getController()->getId();
                        //$this->varActionName1 = Yii::app()->controller->action->id;
                        ?>
                        
                        <li <?php if (Yii::$app->controller->getUniqueId() == 'site') echo 'class="active"'; ?>>
                            <?php echo Html::a('Dashboard', ['site/index']); ?>
                        </li>
                        
                        <li <?php if (Yii::$app->controller->getUniqueId() == 'user' ) echo 'class="active"'; ?>>
                            <?php echo Html::a('<span>Partners</span> <span class="caret"></span>', 'javascript:void(0);', ['data-toggle' => 'dropdown','class' => 'dropdown-toggle']); ?>
                            <ul class="dropdown-menu">
                                <li class='dropdown'>
                                    <?php echo Html::a('New Partners', Yii::$app->urlManager->createUrl('/email-templates')); ?>
                                </li>
                                <li class='dropdown'>
                                    <?php echo Html::a('Manage Partners', Yii::$app->urlManager->createUrl('/email-templates')); ?>
                                </li>
                            </ul>
                        </li>

                        <li <?php if (Yii::$app->controller->getUniqueId() == 'cms' || Yii::$app->controller->getUniqueId() == 'faq' || Yii::$app->controller->getUniqueId() == 'homebanner') echo 'class="active"'; ?>>
                            <?php echo Html::a('<span>Email Template</span> <span class="caret"></span>', 'javascript:void(0);', ['data-toggle' => 'dropdown', 'class' => 'dropdown-toggle']); ?>
                            <ul class="dropdown-menu">
                                <li class='dropdown'>
                                    <?php echo Html::a('Manage Template', ['../email-templates']); ?>
                                </li>
                            </ul>
                        </li>

                        <li <?php if (Yii::$app->controller->getUniqueId() == 'user' ) echo 'class="active"'; ?>>
                            <?php echo Html::a('<span>Assets Management</span> <span class="caret"></span>', 'javascript:void(0);', ['data-toggle' => 'dropdown','class' => 'dropdown-toggle']); ?>
                            <ul class="dropdown-menu">
                                <li class='dropdown'>
                                    <?php echo Html::a('Bank Details', Yii::$app->urlManager->createUrl('/bank')); ?>
                                </li>
                                <li class='dropdown'>
                                    <?php echo Html::a('Channel Category details', Yii::$app->urlManager->createUrl('/channel-category')); ?>
                                </li>
                                <li class='dropdown'>
                                    <?php echo Html::a('Channels details', Yii::$app->urlManager->createUrl('/channel')); ?>
                                </li>                                
                            </ul>
                        </li>
                        
                        <li <?php if (Yii::$app->controller->getUniqueId() == 'uturnsetup') echo 'class="active"'; ?>>
                            <?php echo Html::a('<span>Settings</span> <span class="caret"></span>', 'javascript:void(0);', ['data-toggle' => 'dropdown', 'class' => 'dropdown-toggle']); ?>
                            <ul class="dropdown-menu">
                                <li>
                                    <?php echo Html::a('Message', ['../email-templates'], []); ?>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                    
                    <div class="user">
                        <div class="dropdown">
                            <a href="javascript:void(0);" class='dropdown-toggle' data-toggle="dropdown">
                                <?php echo 'Welcome '.Yii::$app->user->identity['username'].'  !'; ?>
                                <?php $sql = 'SELECT picture FROM admin where id='.Yii::$app->user->id;
                                       $admin = Admin::findBySql($sql)->all();
                                       $pic=$admin[0]->getattribute('picture');
                                ?>
                                <?php if($pic!=null || $pic!='') { ?>
                                    <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/uploaded_files/member/thumb/<?php echo $pic;?>" alt="" width="30px;height:30px;">
                                <?php }else{ ?>
                                    <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/img/demo/admin.png" alt="">
                                <?php }?>
                            </a>
                            
                            <ul class="dropdown-menu">
                                <li>
                                    <?php echo Html::a('Edit Profile', ['/member/editprofile'], []); ?>
                                </li>
                                <li>
                                    <?php echo Html::a('Change Password', ['/member/changepassword'], []); ?>
                                </li>
                                <li>
                                    <?php echo Html::a('Logout', ['site/logout']); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- NAVIGATION ENDS-->

            <div class="container-fluid" id="content" style="">
                <div id="left">
                    <!--<div class="subnav">
                        <div class="subnav-title">
                            <a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Quick stats</span></a>
                        </div>
                        <div class="subnav-content">
                            <ul class="quickstats">
                              
                            </ul>
                        </div>
                    </div>-->
                    <div class="subnav">
                        <div class="subnav-title">
                            <a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Quick Links</span></a>
                        </div>

                        <ul class="subnav-menu">
                            <?php if(Yii::$app->controller->getUniqueId() == 'cms' || Yii::$app->controller->getUniqueId() == 'faq' || Yii::$app->controller->getUniqueId() == 'homebanner' || Yii::$app->controller->getUniqueId() == 'product' || Yii::$app->controller->getUniqueId() == 'combo' || Yii::$app->controller->getUniqueId() == 'orders' || Yii::$app->controller->getUniqueId() == 'discount' || Yii::$app->controller->getUniqueId() == 'category') { ?>
                                <li>
                                    <?php echo Html::a('Email Template', ['/email-templates']); ?>
                                </li>
                                <li>
                                    <?php echo Html::a('Email Template', ['/email-templates']); ?>
                                </li>
                                <li>
                                    <?php echo Html::a('Email Template', ['/email-templates']); ?>
                                </li>
                                <li>
                                    <?php echo Html::a('Email Template', ['/email-templates']); ?>
                                </li>
                                <li>
                                    <?php echo Html::a('Email Template', ['/email-templates']); ?>
                                </li>
                                <li>
                                    <?php echo Html::a('Email Template', ['/email-templates']); ?>
                                </li>
                                <li>
                                    <?php echo Html::a('Email Template', ['/email-templates']); ?>
                                </li>
                                <li>
                                    <?php echo Html::a('Email Template', ['/email-templates']); ?>
                                </li>
                                    <?php } else if(Yii::$app->controller->getUniqueId() == 'department' || Yii::$app->controller->getUniqueId() == 'helptopic' || Yii::$app->controller->getUniqueId() == 'ticket' || Yii::$app->controller->getUniqueId() == 'staff') { ?>
                                <li>
                                      <?php echo Html::a('Email Template', Yii::$app->urlManager->createUrl('/email-templates')); ?>
                                </li>
                                <li>
                                    <?php echo Html::a('Email Template', Yii::$app->urlManager->createUrl('/email-templates')); ?>
                                </li>
                                <li>
                                    <?php echo Html::a('Email Template', Yii::$app->urlManager->createUrl('/email-templates')); ?>
                                </li>
                                <li>
                                    <?php echo Html::a('Email Template', Yii::$app->urlManager->createUrl('/email-templates')); ?>
                                </li>
                                <li>
                                    <?php echo Html::a('Email Template' , Yii::$app->urlManager->createUrl('/email-templates')); ?>
                                </li>
                            <?php } else if(Yii::$app->controller->getUniqueId() == 'member' ) { ?>
                                <li class='dropdown'>
                                    <?php echo Html::a('Email Template', Yii::$app->urlManager->createUrl('/email-templates')); ?>
                                </li>
                                <li class='dropdown'>
                                    <?php echo Html::a('Email Template', Yii::$app->urlManager->createUrl('/email-templates')); ?>
                                </li>
                            <?php } else if(Yii::$app->controller->getUniqueId() == 'user' || Yii::$app->controller->getUniqueId() == 'customer') { ?> 
                                <li><?php echo Html::a('Email Template', Yii::$app->urlManager->createUrl('/email-templates')); ?></li>
                                <li> <?php echo Html::a('Email Template', Yii::$app->urlManager->createUrl('/email-templates')); ?></li>
                                <li> <?php echo Html::a('Email Template', Yii::$app->urlManager->createUrl('/member/email-templates')); ?></li>
                            <?php } else { ?>
                                <li>
                                    <?php echo Html::a('Email Template', ['/email-templates']); ?>
                                </li>
                                <li>
                                    <?php echo Html::a('Email Template', ['/email-templates']); ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!--<div class="subnav subnav">
                        <div class="subnav-title">
                            <a href="#" class='toggle-subnav'><i class="icon-angle-right"></i><span>Global Settings</span></a>
                        </div>
                    </div>-->
                </div>
                <div id="main">
                    <div class="container-fluid">
                        <!--<div class="page-header">-->
                      
                        <!--</div>-->
                        <?php } echo $content;
                            if (isset(Yii::$app->user->id))
                            {
                        ?>
                    </div>
                </div>
            </div>
            <!-- <div id="footer">
                <p>uturn- All Rights Reserved</p>
                    <?php //echo Html::a('<i class="icon-arrow-up"></i>', '#', ['class' => 'gototop']); ?>
            </div> -->
            <script type="text/javascript">
                window.onload = function(){
                    setTimeout(function () {
                        $("#breadcrumbs-msg").fadeOut('slow');
                    }, 5000);
                };
            </script>
            <?php } ?>
            <?php $this->endBody() ?>
    </body>
</html>

<?php $this->endPage() ?>
