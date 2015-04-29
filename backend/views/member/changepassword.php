<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Change Password';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="page-header">
    <div class="pull-left">
        <h1>Change Password</h1>
    </div>			
</div>

<div class="breadcrumbs">
	<ul>
		<li><?php echo Html::a('Home',['/site/index']); ?><i class="icon-angle-right"></i></li>
		<li><a href="#">Change Password</a></li>
	</ul>
	<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
</div>


 <div class="breadcrumbs" id="breadcrumbs-msg">
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

<div class="row-fluid">
    <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>Change Password</h3>
            </div>
            <div class="box-content nopadding">
                
                
                 <?php $form = ActiveForm::begin([
                     
                      'id' => 'changepassword-form',
            'enableAjaxValidation'=>false,
                        
	    'options' => [
	                'class' => 'form-horizontal form-bordered',
	                
	                ],
                     
                       ]); 
            ?>

                    <div class="control-group">
                <?= Html::activeLabel($model, 'current_password', ['label'=>'Current Password <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'current_password')->passwordInput()->label(false); ?>
		  
	       </div>
	    </div>
                
                  <div class="control-group">
                <?= Html::activeLabel($model, 'new_password', ['label'=>'New Password <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'new_password')->passwordInput()->label(false); ?>
		  
	       </div>
	    </div>
                
                  <div class="control-group">
                <?= Html::activeLabel($model, 'confirm_password', ['label'=>'Confirm Password <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'confirm_password')->passwordInput()->label(false); ?>
		  
	       </div>
	    </div>
                
             

            

               
                <div class="note"><strong>Note :</strong> <span class="required">*</span> Indicates mandatory fields.</div>
                 <div class="form-actions">  
	      <?= Html::submitButton('Submit', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	       <?php echo Html::a('Cancel',array('/site/index'),array('class'=>'btn')); ?>  
	    </div>
                
             
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>


