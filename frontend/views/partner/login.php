<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>

      <div class="content_area min_height">
        <div class="container">
        	<div class="login">
            	<div class="topicon_wrap"><img src="../frontend/web/img_layout/login.png" align="logo"></div>
            	<div class="from">
                <h3>Login</h3>
                 <?php $form = ActiveForm::begin(['id' => 'login-form', 'class'=>'form-validate']); ?>
                <div class="inputgroup">
                    <label class="input_text" id="basic-addon1">Email Address</label>
                    <!--<div><input type="text" class="txt" placeholder="Email Addres" aria-describedby="basic"></div>-->
                    <div><?= $form->field($model, 'partnerEmail')->textInput(['placeholder'=>'Email ID', 'class' => 'txt','size' => 40, 'maxlength' => 150])->label(false); ?></div>
                </div>
                <div class="inputgroup">
                    <label class="input_text" id="basic-addon1">Password</label>
                    <!--<div><input type="password" class="txt" placeholder="Email Addres" aria-describedby="basic"></div>-->
                    <div><?= $form->field($model, 'password_hash')->passwordInput(['placeholder'=>'Password', 'class' => 'txt','size' => 40, 'maxlength' => 150])->label(false); ?></div>
                </div>
                <div class="inputgroup">
                    <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/partner/recovery" class="frm_link"><i class="fa fa-caret-right"></i> Forgot Password?</a>
                    <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/partner/joinuturn" class="frm_link"><i class="fa fa-caret-right"></i> Register Now</a>
                </div>
                <div class="inputgroup">
                    <!--<a href="#" class="btn btn-primary btn-xl">Login</a>-->
                    <?php echo Html::submitButton('Login', ['class' => 'btn btn-primary btn-xl']); ?>
                </div>
                <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
      </div>

<div class="wrapper" style="display:none">
		<h1><a href="#">Uturn</a></h1>
		<div class="login-body">
			<h2>SIGN IN</h2>
                        <div class="breadcrumbs" id="breadcrumbs-msg">
                           <?php //if(Yii::$app->params['loginPageMessage']!='') {?>
                               <ul><li><span class="readcrum_without_link_success"><?php //echo Yii::$app->params['loginPageMessage'];?></li></ul>
                          <?php // }?>
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
						<?= $form->field($model, 'partnerEmail')->textInput(['placeholder'=>'Email ID', 'class' => 'input-block-level','size' => 40, 'maxlength' => 150])->label(false); ?>
					</div>
				</div>
				<div class="control-group">
					<div class="pw controls">
						  <?= $form->field($model, 'password_hash')->passwordInput(['placeholder'=>'Password', 'class' => 'input-block-level','size' => 40, 'maxlength' => 150])->label(false); ?>
					</div>
				</div>
                    
                        
				<div class="submit">
					<div class="remember">
                                            
						<input type="checkbox" name="remember" class="icheck-me" data-skin="square" data-color="blue" id="remember"> <label for="remember">Remember me</label>
					</div>
                                    <?php echo Html::submitButton('Sign me in', ['class' => 'btn btn-primary', 'style'=>'float:right']); ?>
					
				</div>
			<?php ActiveForm::end(); ?>
			<div class="forget">
				<?= Html::a('Forgot password?', ['partner/recovery']) ?>
			</div>
		</div>
	</div>


