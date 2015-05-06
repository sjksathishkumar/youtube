<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \backend\models\PasswordResetRequestForm */

?>
<div class="wrapper">
   <h1><a href="#">uturn</a></h1>
   
  <div id="log_wrap" class="login-body">
    <h2>FORGOT PASSWORD</h2>
  
           <div class="control-group">
					<div class="email controls">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
             <?= $form->field($model, 'email')->textInput(['placeholder'=>'Email address', 'class' => 'input-block-level'])->label(false); ?>
            </div>
           </div>
    
                <div class="submit">
        <?php echo Html::a('Cancel', ['site/login'], ['class' => 'btn', 'style' => 'float:right; margin-left:10px;']); ?>
        <?php echo Html::submitButton('Submit', ['class' => 'btn btn-primary', 'style' => 'float:right; ']); ?>
    </div>
               
            <?php ActiveForm::end(); ?>
        
   
            
   
  </div>
  </div>


