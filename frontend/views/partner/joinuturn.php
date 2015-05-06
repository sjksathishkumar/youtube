<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Join Uturn';
//$this->params['breadcrumbs'][] = $this->title;
require_once '../web/inc/youtube_oAuth.php';
?>
    
<div class="header-content">
    <div class="header-content-inner">
        <h1>Thanks for your interest in Uturn</h1>
        <p><strong>Let's get started! </strong> The first step in joining Uturn is to authorize us to connect with your YouTube channel to start the application process.</p>
        <p><a href="<?php echo $loginUrl; ?>" target="_blank" class="btn btn-primary btn-xl page-scroll">Connect</a></p>
        <p>FYI: When you click CONNECT, you'll see a quick authorization page from YouTube before you're routed back to Uturn.</p>
        <p>If you have multiple YouTube channels, be sure you connect the right one (the one that you want to partner with Uturn).</p>
        <div class="btn_wrap" style='display: none'>
            <a href="#" class="btn btn-primary btn-xl page-scroll">Cancel</a>
            <a href="#" class="btn btn-primary btn-xl page-scroll">Accept</a>
        </div>
    </div>
</div>


