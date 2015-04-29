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
	      <h3><i class="icon-table"></i><?php echo  ucfirst(Yii::$app->controller->action->id);?> Account</h3>
               <a class="btn pull-right" data-toggle="modal" href="<?php echo Yii::$app->urlManager->createUrl('/customer');?>"><i class="icon-circle-arrow-left"></i> Back</a>
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
             Account Information
	    </div>
             <div class="fullwidth">
               
               <div class="control-group span6">
                <?= Html::activeLabel($model, 'first_name', ['label'=>'First Name <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'first_name',['errorOptions'=>['class'=>'error']])->textInput()->label(false); ?>
		 
	       </div>
	    </div>
               <div class="control-group span6">
                <?= Html::activeLabel($model, 'last_name', ['label'=>'Last Name <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'last_name',['errorOptions'=>['class'=>'error']])->textInput()->label(false); ?>
		 
	       </div>
	    </div>
             <div class="cb"></div>
             </div>
             
                 <div class="fullwidth">
                 <div class="control-group span6">
                <?= Html::activeLabel($model, 'dob', ['label'=>'Birth Date <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                 <?= $form->field($model, 'dob',['errorOptions'=>['class'=>'error']])->textInput([ 'tabindex' => 3])->widget(DatePicker::className(), [

'clientOptions' => [
    'autoclose' => true,
    'format'    => 'yyyy-mm-dd',
    'startDate' => '1900-01-01',
   
    'value' => 'YYYY-MM-DD',
]
])->label(false); ?>
		 
	       </div>
	    </div>
             <div class="control-group span6">
                <?= Html::activeLabel($model, 'gender', ['label'=>'Gender <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                 <?php echo $form->field($model, 'gender')->dropDownList(['M' => 'Male', 'F' => 'Female'])->label(false); ?>
		 
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
                <?= Html::activeLabel($model, 'confirm_email', ['label'=>'Confirm Email <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'confirm_email',['errorOptions'=>['class'=>'error']])->textInput()->label(false); ?>
		 
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
             
                <?= Html::activeLabel($model, 'contact_number', ['label'=>'Contact Number <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'contact_number',['errorOptions'=>['class'=>'error']])->textInput()->label(false); ?>
		 
	       </div>
	    </div>
             <div class="control-group span6">
                <?= Html::activeLabel($model, 'blueskyMobileNumber', ['label'=>'Bluesky Mobile <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'blueskyMobileNumber',['errorOptions'=>['class'=>'error']])->textInput()->label(false); ?>
		 
	       </div>
	    </div>
                  <div class="cb"></div>
              </div>
             <div class="fullwidth">
              <div class="control-group span6">
                <?= Html::activeLabel($model, 'isMultiUser', ['label'=>'Multi User <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                 <?php echo $form->field($model, 'isMultiUser')->dropDownList(['0' => 'NO', '1' => 'YES'])->label(false); ?>
		 
	       </div>
	    </div> <div class="control-group span6">
                <?= Html::activeLabel($model, 'isDistributor', ['label'=>'Distributor <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                 <?php echo $form->field($model, 'isDistributor')->dropDownList(['0' => 'NO', '1' => 'YES'])->label(false); ?>
		 
	       </div>
	    </div>
             <div class="cb"></div>
             </div>
            <div class="box-title" style="background-color: #b4be35; text-align: center; color: white; font-size: 20px;">
            Billing Address
	    </div>
             
               <div class="fullwidth">
              <div class="control-group span6">
                <?= Html::activeLabel($model, 'billing_address1', ['label'=>'Address line 1 <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'billing_address1',['errorOptions'=>['class'=>'error']])->textInput()->label(false); ?>
		 
	       </div>
	    </div>
              <div class="control-group span6">
                <?= Html::activeLabel($model, 'billing_address2', ['label'=>'Address line 2', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'billing_address2',['errorOptions'=>['class'=>'error']])->textInput()->label(false); ?>
		 
	       </div>
	    </div>
                 <div class="cb"></div>
             </div>
             
             <div class="fullwidth">
              <div class="control-group span6">
                <?= Html::activeLabel($model, 'billing_suburb', ['label'=>'Suburb <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'billing_suburb',['errorOptions'=>['class'=>'error']])->textInput()->label(false); ?>
		 
	       </div>
	    </div>
              <div class="control-group span6">
                <?= Html::activeLabel($model, 'billing_city', ['label'=>'Town / City <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'billing_city',['errorOptions'=>['class'=>'error']])->textInput()->label(false); ?>
		 
	       </div>
	    </div>
               
                 
                 <div class="cb"></div>
             </div>
           <div class="fullwidth">
               <div class="control-group span6">
                <?= Html::activeLabel($model, 'billing_post_code', ['label'=>'Postcode <span class="required">*</span>', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'billing_post_code',['errorOptions'=>['class'=>'error']])->textInput()->label(false); ?>
		 
	       </div>
	    </div>
               <div class="cb"></div>
           </div>
             
       
	    <div class="box-title" style="background-color: #b4be35; text-align: center; color: white; font-size: 20px;">
            Delivery Address
	    </div>
               
             <div class="fullwidth">
              <div class="control-group span6">
                <?= Html::activeLabel($model, 'delivery_address1', ['label'=>'Address line 1 ', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'delivery_address1')->textInput()->label(false); ?>
		 
	       </div>
	    </div>
              <div class="control-group span6">
                <?= Html::activeLabel($model, 'delivery_address2', ['label'=>'Address line 2', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'delivery_address2')->textInput()->label(false); ?>
		 
	       </div>
	    </div>
                 <div class="cb"></div>
             </div>
             <div class="fullwidth">
              <div class="control-group span6">
                <?= Html::activeLabel($model, 'suburb', ['label'=>'Suburb ', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'suburb')->textInput()->label(false); ?>
		 
	       </div>
	    </div>
              <div class="control-group span6">
                <?= Html::activeLabel($model, 'city', ['label'=>'Town / City', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'city')->textInput()->label(false); ?>
		 
	       </div>
	    </div>
                
                 <div class="cb"></div>
             </div>
           <div class="fullwidth">
              <div class="control-group span6">
                <?= Html::activeLabel($model, 'post_code', ['label'=>'Postcode', 'class'=>'control-label']) ?>
	       
	       <div class="controls">
                <?= $form->field($model, 'post_code')->textInput()->label(false); ?>
		 
	       </div>
	    </div>
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
	       <?php echo Html::a('Cancel',array('/customer'),array('class'=>'btn')); ?>  
	    </div>
             
	    
	    <?php ActiveForm::end(); ?>
            <?php yii\widgets\Pjax::end() ?>
	 </div>
      </div>
   </div>
</div>
