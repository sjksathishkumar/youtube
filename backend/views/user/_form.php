<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\user */
/* @var $form yii\widgets\ActiveForm */
$this->registerJs(
   '$("document").ready(function(){ 
        $("#user-gird").on("pjax:end", function() {
            $.pjax.reload({container:"#user-gird"});  //Reload GridView
        });
    });'
);

?>

<div class="row-fluid">
   <div class="span12">
      <div class="box box-color box-bordered">
	 <div class="box-title">
	      <h3><i class="icon-table"></i>Add New User</h3>
               <a class="btn pull-right" data-toggle="modal" href="<?php echo Yii::$app->urlManager->createUrl('/user');?>"><i class="icon-circle-arrow-left"></i> Back</a>
	 </div>
         <div class="box-content nopadding">
             <?php yii\widgets\Pjax::begin(['id' => 'user-gird']) ?>
            <?php $form = ActiveForm::begin([
	    'id' => 'user-form',
            'enableAjaxValidation'=>false,
                        
	    'options' => [
	                'class' => 'form-horizontal form-bordered form-validate',
	                
	                ],
            
            ]); ?>
            
             
	    
               <div class="control-group box-title" style="background-color: #b4be35; text-align: center; color: white; font-size: 20px;height: 30px;">
             Admin User Information
	    </div>
             <div class="fullwidth">
               
               <div class="control-group span6">
                <?= Html::activeLabel($model, 'username', ['label'=>'Username<span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'username',['errorOptions'=>['class'=>'error']])->textInput()->label(false); ?>
		 
	       </div>
	    </div>
                 <div class="control-group span6">
                <?= Html::activeLabel($model, 'user_title', ['label'=>'Title <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'user_title',['errorOptions'=>['class'=>'error']])->textInput()->label(false); ?>
		 
	       </div>
	    </div>
               
             <div class="cb"></div>
             </div>
             
                 
                     <div class="fullwidth">
            
              <div class="control-group span6">
                <?= Html::activeLabel($model, 'email', ['label'=>'Email <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'email',['errorOptions'=>['class'=>'error']])->textInput()->label(false); ?>
		 
	       </div>
	    </div>
                 <div class="control-group span6">
                <?= Html::activeLabel($model, 'role', ['label'=>'Role', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?php echo $form->field($model, 'role')->dropDownList(['0'=>'Select Role','1' => 'Support Mangement', '2' => 'Account Management','3'=>'Order management','4'=>'Third Party Support'])->label(false); ?>
		 
	       </div>
	    </div>
                         <div class="cb"></div>
             </div>
             
              <div class="fullwidth">
              <div class="control-group span6">
                <?= Html::activeLabel($model, 'password', ['label'=>'Password <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'password',['errorOptions'=>['class'=>'error']])->passwordInput()->label(false); ?>
		 
	       </div>
	    </div>
             
              <div class="control-group span6">
                <?= Html::activeLabel($model, 'confirm_password', ['label'=>'Confirm Password <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'confirm_password',['errorOptions'=>['class'=>'error']])->passwordInput()->label(false); ?>
		 
	       </div>
	    </div>
                  <div class="cb"></div>
              </div>
           <div class="fullwidth">
              
                <div class="control-group span6">
                <?= Html::activeLabel($model, 'status', ['label'=>'Status', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?php echo $form->field($model, 'status')->dropDownList(['1' => 'Active', '0' => 'Inactive'])->label(false); ?>
		 
	       </div>
	    </div>
               <div class="cb"></div>
           </div> 
             
	    <div class="note span12"><strong>Note :</strong> <span class="required">*</span> Indicates mandatory fields.</div>
            
             <div class="form-actions span12">  
	      <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	       <?php echo Html::a('Cancel',array('/user'),array('class'=>'btn')); ?>  
	    </div>
             
	    
	    <?php ActiveForm::end(); ?>
            <?php yii\widgets\Pjax::end() ?>
	 </div>
      </div>
   </div>
</div>
