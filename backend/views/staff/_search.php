<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\department;
/* @var $this yii\web\View */
/* @var $model app\models\searchticket */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row-fluid">
<div class="span12">
    <div class="box box-color box-bordered">
        <div class="box-title">
            <h3>Advanced Search  </h3>
        </div>
        <div class="box-content nopadding">
		

 <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
         'id'=>'_search-form',
     'options' => ['class' => 'form-horizontal form-bordered']
    
    ]); ?>
            
      		<div class="row-fluid">
                <div class="wide form">
                     <div class="span4">
                        <div class="control-group">
                            <?= Html::activeLabel($model, 'staffFirstName', ['label'=>'name', 'class'=>'control-label']) ?>
                         
                            <div class="controls">
                                
                                 <?= $form->field($model, 'staffFirstName')->textInput()->label(false); ?>
                            </div>
                        </div>
                    </div>
                    
                  <div class="span4">
                        <div class="control-group">
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
                    </div>
                    
                    
                       
                    
		     
		    
		     <div class="row-fluid">
                        <div class="form-actions span12  search">
                                <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset',['staff/index'],  ['id' => 'resetVal', 'class' => 'btn btn-default']) ?>
    </div>
                            


                        </div>
                    </div>
	
	

	
 </div>

 <?php ActiveForm::end(); ?>

</div><!-- search-form -->
</div>
   </div>
   </div>
 </div>



