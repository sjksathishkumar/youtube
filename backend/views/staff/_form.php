<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\datepicker\DatePicker;
use app\models\ticketissue;
use yii\helpers\ArrayHelper;
use app\models\department;
use dosamigos\datepicker\DateRangePicker;

/* @var $this yii\web\View */
/* @var $model app\models\ticket */
/* @var $form yii\widgets\ActiveForm */

 
$this->registerJs(
   '$("document").ready(function(){ 
        $("#ticket-form").on("pjax:end", function() {
            $.pjax.reload({container:"#ticket-grid"});  //Reload GridView
        });
    });'
);

?>
<div class="row-fluid">
   <div class="span12">
      <div class="box box-color box-bordered">
	 <div class="box-title">
	      <h3><i class="icon-table"></i>Add New Staff</h3>
               <a class="btn pull-right" data-toggle="modal" href="<?php echo Yii::$app->urlManager->createUrl('/staff');?>"><i class="icon-circle-arrow-left"></i> Back</a>
	 </div>
         <div class="box-content nopadding">
             <?php yii\widgets\Pjax::begin(['id' => 'ticket-form']) ?>
            <?php $form = ActiveForm::begin([
	    'id' => 'ticket-form',
            'enableAjaxValidation'=>false,
                        
	    'options' => [
	                'class' => 'form-horizontal form-bordered form-validate',
	                
	                ],
            
            ]); ?>
            
             
	    
               
             <div class="fullwidth">
               
               <div class="control-group span6">
                <?= Html::activeLabel($model, 'staffFirstName', ['label'=>'First Name <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'staffFirstName')->textInput()->label(false); ?>
		 
	       </div>
	    </div>
               <div class="control-group span6">
                <?= Html::activeLabel($model, 'staffLastName', ['label'=>'Last Name <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'staffLastName')->textInput()->label(false); ?>
		 
	       </div>
	    </div>
             <div class="cb"></div>
             </div>
             
                 <div class="fullwidth">
                  <div class="control-group span6">
                <?= Html::activeLabel($model, 'staffEmailID', ['label'=>'Email <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'staffEmailID')->textInput()->label(false); ?>
		 
	       </div>
	    </div>
                  
                  
             
                  
                  
             <div class="control-group span6">
               <?= Html::activeLabel($model, 'staffPhoneNumber', ['label'=>'Contact Number <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'staffPhoneNumber')->textInput()->label(false); ?>
		 
	       </div>
	    </div>
                     <div class="cb"></div>
                 </div>   
             
            
             
             <div class="fullwidth">
              <div class="control-group span6">
                <?= Html::activeLabel($model, 'staffExt', ['label'=>'Extension', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'staffExt')->textInput()->label(false); ?>
		 
	       </div>
	    </div>
              <div class="control-group span6">
                <?= Html::activeLabel($model, 'staffMobile', ['label'=>'Mobile', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'staffMobile')->textInput()->label(false); ?>
		 
	       </div>
	    </div>
               
                 
                 <div class="cb"></div>
             </div>
            
             <div class="fullwidth">
              <div class="control-group span6">
                <?= Html::activeLabel($model, 'password', ['label'=>'Password <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'password')->passwordInput()->label(false); ?>
		 
	       </div>
	    </div>
             
              <div class="control-group span6">
                <?= Html::activeLabel($model, 'confirm_password', ['label'=>'Confirm Password <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'confirm_password')->passwordInput()->label(false); ?>
		 
	       </div>
	    </div>
                  <div class="cb"></div>
              </div>
               <div class="fullwidth">
              
              <div class="control-group span6">
                <?= Html::activeLabel($model, 'fkdept_id', ['label'=>'Department <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                   <?php echo  $form->field($model, 'fkdept_id')->dropDownList(

                                 ArrayHelper::map(department::find()->where(['status'=> '1'])->all(), 'id', 'dept_name'),

                                ['prompt'=>'Select Department','onchange'=>'
             $.post("'.Yii::$app->urlManager->createUrl('helptopic/lists?id=').
           '"+$(this).val(),function( data ) 
                   {
                              $( "select#helptopic" ).html( data );
                            });
                        '])->label(false);
?>
               
                
		 
	       </div>
	    </div>
                   
                 <div class="cb"></div>
             </div>
             <div class="note span12"><strong>Note :</strong> <span class="required">*</span> Indicates mandatory fields.</div>
            
             <div class="form-actions span12">  
	      <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	       <?php echo Html::a('Cancel',array('/staff'),array('class'=>'btn')); ?>  
	    </div>
             
	    
	    <?php ActiveForm::end(); ?>
            <?php yii\widgets\Pjax::end() ?>
	 </div>
      </div>
   </div>
</div>

 