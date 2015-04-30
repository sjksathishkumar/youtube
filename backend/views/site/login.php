<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper">
		<h1><a href="#">Uturn</a></h1>
		<div class="login-body">
			<h2>SIGN IN</h2>
                        <div class="breadcrumbs" id="breadcrumbs-msg">
                           <?php if(Yii::$app->params['loginPageMessage']!='') {?>
                               <ul><li><span class="readcrum_without_link_success"><?php echo Yii::$app->params['loginPageMessage'];?></li></ul>
                          <?php  }?>
                        <?php  if( (Yii::$app->session->hasFlash('success')) || (Yii::$app->session->hasFlash('update')) || (Yii::$app->session->hasFlash('editprofile'))){ ?>
		<ul>
		  <?php
			if(Yii::$app->session->getFlash('success'))
			{
                            
			    echo '<li><span class="readcrum_without_link_success">'.Yii::$app->session->getFlash('success').'</li>';
			}else if(Yii::$app->session->getFlash('update'))
			{
			    echo '<li><span class="readcrum_without_link_success">'.EDIT_CMS_SUCCESS.'</li>';
			}else if(Yii::$app->session->getFlash('editprofile'))
			{
			    echo '<li><span class="readcrum_without_link_success">'.EDIT_PROFILE_UPDATE.'</li>';
			}
		  ?>						
	      </ul>
	<?php } ?>
                        </div>
                        
			  <?php $form = ActiveForm::begin(['id' => 'login-form', 'class'=>'form-validate']); ?>
				<div class="control-group">
					<div class="email controls">
						<?= $form->field($model, 'email')->textInput(['placeholder'=>'Email ID', 'class' => 'input-block-level','size' => 60, 'maxlength' => 150])->label(false); ?>
					</div>
				</div>
				<div class="control-group">
					<div class="pw controls">
						  <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password', 'class' => 'input-block-level','size' => 60, 'maxlength' => 150])->label(false); ?>
					</div>
				</div>
                    
                        
				<div class="submit" align="center">
					
                        <?php echo Html::submitButton('Sign In', ['class' => 'btn btn-primary']); ?>
					
					
				</div>
			<?php ActiveForm::end(); ?>
			<div class="forget">
				<?= Html::a('Forgot password?', ['site/recovery']) ?>
			</div>
		</div>
	</div>
