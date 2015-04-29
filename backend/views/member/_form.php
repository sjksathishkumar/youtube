<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="row-fluid">
   <div class="span12">
      <div class="box box-color box-bordered">
	 <div class="box-title">
	      <h3><i class="icon-table"></i>Add New Member</h3>
	 </div>
         <div class="box-content nopadding">
            <?php $form = ActiveForm::begin([
	    'id' => 'member-form',
            'enableAjaxValidation'=>false,
                        
	    'options' => [
	                'class' => 'form-horizontal form-bordered form-validate',
	                
	                ],
            
            ]); ?>
            
	  
	    
              <div class="control-group">
                <?= Html::activeLabel($model, 'user_title', ['label'=>'User Title <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'user_title')->textInput()->label(false); ?>
		  
	       </div>
	    </div>
               
               <div class="control-group">
                <?= Html::activeLabel($model, 'username', ['label'=>'User Name <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'username')->textInput()->label(false); ?>
		 
	       </div>
	    </div>
               
                <div class="control-group">
                <?= Html::activeLabel($model, 'email', ['label'=>'Email <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'email')->textInput()->label(false); ?>
		 
	       </div>
	    </div>
               
                <div class="control-group">
                <?= Html::activeLabel($model, 'password_hash', ['label'=>'Password <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'password_hash')->passwordInput()->label(false); ?>
		 </div>
	    </div>
              <div class="control-group">
                <?= Html::activeLabel($model, 'password', ['label'=>'Retype Password <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'password')->passwordInput()->label(false); ?>
		 </div>
	    </div>
             
          
             
                 
               
       
	    
	    <div class="note"><strong>Note :</strong> <span class="required">*</span> Indicates mandatory fields.</div>
            
             <div class="form-actions">  
	      <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	       <?php echo Html::a('Cancel',array('/member'),array('class'=>'btn')); ?>  
	    </div>
             
	    
	    <?php ActiveForm::end(); ?>
	 </div>
      </div>
   </div>
</div>