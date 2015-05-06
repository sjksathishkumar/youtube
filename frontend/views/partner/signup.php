<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\partner */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="content_area min_height">
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
    
    <div class="breadcrumbs" id="breadcrumbs-msg">
    <?php  if( (Yii::$app->session->hasFlash('success')) || (Yii::$app->session->hasFlash('fail')) || (Yii::$app->session->hasFlash('error'))){ ?>
            <ul>
              <?php
                    if(Yii::$app->session->getFlash('success'))
                    {
                        echo '<li><span class="sucess_txt">'.Yii::$app->session->getFlash('success').'</li>';
                    }else if(Yii::$app->session->getFlash('fail'))
                    {
                        echo '<li><span class="readcrum_without_link_success">'.USER_SIGNUP_FAIL.'</li>';
                    }
                    else if(Yii::$app->session->getFlash('error'))
                    {
                        echo '<li><span class="error_txt">'.Yii::$app->session->getFlash('error').'</li>';
                    }
              ?>						
          </ul>
    <?php } ?>
    </div>  
        <div class="container">
        	<div class="login">
            	<div class="topicon_wrap"><img src="../frontend/web/img_layout/login.png" align="logo"></div>
            	<div class="from">
                <h3>Register here</h3>
                <div class="inputgroup">
                    <label class="input_text" id="basic-addon1">First Name</label>
                    <div><?= $form->field($model, 'partnerFirstName')->textInput(['placeholder'=>'First Name','maxlength' => 150]) ?></div>
                </div>
                
                <div class="inputgroup">
                    <label class="input_text" id="basic-addon1">Last Name</label>
                    <div><?= $form->field($model, 'partnerLastName')->textInput(['placeholder'=>'Last Name','maxlength' => 150]) ?></div>
                </div>
                
                <div class="inputgroup">
                    <label class="input_text" id="basic-addon1">Email Address</label>
                    <div><?= $form->field($model, 'partnerEmail')->textInput(['placeholder'=>'Email','maxlength' => 150]) ?></div>
                </div>
                
                <div class="inputgroup">
                    <label class="input_text" id="basic-addon1">Confirm Your Email ID</label>
                    <div><?= $form->field($model, 'partnerConfirmEmail')->textInput(['placeholder'=>'Email','maxlength' => 150]) ?></div>
                </div>

                <div class="inputgroup">
                    <label class="input_text" id="basic-addon1">Date of Birth</label>
                    <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                        <?= $form->field($model, 'partnerDateOfBirth')->textInput() ?>
                        <!--<input class="form-control myInput txt" size="16" type="text" value="" readonly placeholder="Date" />-->
                    <span class="input-group-addon"><span class="glyphicon-calendar newCalander"><img src="../frontend/web/img_layout/calender.png" /></span></span>
                </div>
                </div>
                
                <div class="inputgroup">
                    <label class="input_text" id="basic-addon1">Category of Channel</label>
                    <?= $form->field($model, 'channelCategory')->dropDownList(['' => 'Select Channel Category', '1' => 'Music', '2' => 'Entertainment'],['class'=>'chosen-select'])->label(false); ?>
                </div>
                
                <div class="inputgroup">
                    <label class="input_text" id="basic-addon1">How did you hear about us?</label>
                    <?= $form->field($model, 'partnerKnowHow')->dropDownList(['' => 'Select Hear about us', '1' => 'Internet', '2' => 'Peers', '3' => 'Friends', '4' => 'Banner'], ['class'=>'chosen-select'])->label(false); ?>
                </div>   
                
                <div class="inputgroup">
                       <textarea name="comment" rows="3" cols="50" readonly> 
                       Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                       Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                       Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                       Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.      
                      </textarea>
                </div>
                
               <div class="inputgroup">
                 <div><?php echo $form->field($model, 'accept_term', ['options' => ['tag' => 'span',], 'template' => "{input}"])->checkbox(['checked' => false])->label(false); ?> I have read and accept <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/uturn-agreement" target="_blank">Uturn Agreement</a></div>
               </div>
                
                <div class="inputgroup">
                    <?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => 'btn btn-primary btn-xl']) ?>
                    <?php echo Html::a('<span>Cancel</span>', ['site/index'], ['class' => 'btn btn-primary btn-xl']); ?>
                   
                </div>
                
                </div>
            </div>
        </div>
     <?php ActiveForm::end(); ?>
      </div>

<div class="partner-form" style="display:none">

    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
    
    <div class="breadcrumbs" id="breadcrumbs-msg">
    <?php  if( (Yii::$app->session->hasFlash('success')) || (Yii::$app->session->hasFlash('fail')) || (Yii::$app->session->hasFlash('error'))){ ?>
            <ul>
              <?php
                    if(Yii::$app->session->getFlash('success'))
                    {
                        echo '<li><span class="sucess_txt">'.Yii::$app->session->getFlash('success').'</li>';
                    }else if(Yii::$app->session->getFlash('fail'))
                    {
                        echo '<li><span class="readcrum_without_link_success">'.USER_SIGNUP_FAIL.'</li>';
                    }
                    else if(Yii::$app->session->getFlash('error'))
                    {
                        echo '<li><span class="error_txt">'.Yii::$app->session->getFlash('error').'</li>';
                    }
              ?>						
          </ul>
    <?php } ?>
    </div>    

    <?= $form->field($model, 'partnerFirstName')->textInput(['placeholder'=>'First Name','maxlength' => 150]) ?>

    <?= $form->field($model, 'partnerLastName')->textInput(['placeholder'=>'Last Name','maxlength' => 150]) ?>

    <?= $form->field($model, 'partnerEmail')->textInput(['placeholder'=>'Email','maxlength' => 150]) ?>
    
    <div><?= $form->field($model, 'partnerConfirmEmail')->textInput(['placeholder'=>'Email','maxlength' => 150]) ?></div>
    
    <?= $form->field($model, 'partnerDateOfBirth')->textInput() ?>

    <label>Category of Channel</label>
    <?= $form->field($model, 'channelCategory')->dropDownList(['' => 'Select Channel Category', '1' => 'Music', '2' => 'Entertainment'],['class'=>'chosen-select'])->label(false); ?>

    <label>How did you Hear about us?</label>
    <?= $form->field($model, 'partnerKnowHow')->dropDownList(['' => 'Select Hear about us', '1' => 'Internet', '2' => 'Peers', '3' => 'Friends', '4' => 'Banner'], ['class'=>'chosen-select'])->label(false); ?>
    <textarea name="comment" rows="3" cols="50" readonly> 
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.      
    </textarea>
    <div id="accepted">
        <!--<input type="checkbox"name="accept_term"value="accept_agreement">-->
        <div>
           <?php echo $form->field($model, 'accept_term', ['options' => ['tag' => 'span',], 'template' => "{input}"])->checkbox(['checked' => false])->label(false); ?>
           <div id="terms" style="float:left; margin-top: 12px;" > I have read and accept <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/uturn-agreement" target="_blank">Uturn Agreement</a></div>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php echo Html::a('<span>Cancel</span>', ['site/index'], ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
