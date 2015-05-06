<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Uturn';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper">
    
    <h1><b>There was an unknown error with this YouTube account.</b></h1>
    <p>
Please contact,
<a href='mailto:support@uturn.com'>support@uturn.com</a>
if you need additional help.
</p>
<?php echo Html::a('', ['site/index'], ['id' => 'brand']); ?>
</div>
