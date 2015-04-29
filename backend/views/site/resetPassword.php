<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\ResetPasswordForm;


/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

//$this->title = 'Reset password';
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="wrapper">
  <h1><a href="#">
   uturn</a></h1>
<div id="log_wrap1" class="login-body">
    <h2>RESET PASSWORD</h2>
    
      <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
      <div class="control-group">
	<div class="email controls">
          
             <?= $form->field($model, 'new_password')->passwordInput(['placeholder'=>'New Password', 'class' => 'input-block-level'])->label(false); ?>
            </div>
           </div>
    
    <div class="control-group">
	<div class="email controls">
          
             <?= $form->field($model, 'confirm_password')->passwordInput(['placeholder'=>'Confirm Password', 'class' => 'input-block-level'])->label(false); ?>
            </div>
           </div>
    
            
        
         <div class="submit">
        <?php echo Html::a('Cancel', ['site/login'], ['class' => 'btn', 'style' => 'float:right; margin-left:10px;']); ?>
        <?php echo Html::submitButton('Save', ['class' => 'btn btn-primary', 'style' => 'float:right; ']); ?>
    </div>
        
         
   
     
     <?php ActiveForm::end(); ?>
       
    </div>
</div>


