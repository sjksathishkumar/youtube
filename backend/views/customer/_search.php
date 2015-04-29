<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use yii\jui\AutoComplete;

/* @var $this yii\web\View */
/* @var $model app\models\searchusers */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row-fluid">
<div class="span12">
    <div class="box box-color box-bordered">
        <div class="box-title">
            <h3>Advanced Account Search  </h3>
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
                            <?= Html::activeLabel($model, 'first_name', ['label'=>'Name', 'class'=>'control-label']) ?>
                         
                            <div class="controls">
                                
                                  <?php  $data = \app\models\customer::find()
                                ->select(['CONCAT_WS(" ", first_name,  last_name) as value', 'CONCAT_WS(" ", first_name,  last_name) as  label','id'])
                                ->asArray()->groupBy('first_name,  last_name')
                                ->all();

                                echo AutoComplete::widget([
                                'model' => $model,
                                 'attribute' => 'first_name',
                                'clientOptions' => [
                                'source' => $data,
                                'autoFill'=>true,
                                'minLength'=>'2',
                                'select' => new JsExpression("function( event, ui ) {
                                    $('#first_name').val(ui.item.id);
                                 }")],
                                 ]);
                                 ?>
                    
                               
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="control-group">
                            <?= Html::activeLabel($model, 'contact_number', ['label'=>'Phone', 'class'=>'control-label']) ?>
                         
                            <div class="controls">
                                
                                 <?= $form->field($model, 'contact_number')->textInput()->label(false); ?>
                            </div>
                        </div>
                    </div>
                     
                    </div>
                    <div class="row-fluid">
                        <div class="form-actions span6  search">
                                <div class="form-group">
        <?= Html::activeLabel($model, 'email', ['label'=>'Email ID', 'class'=>'control-label']) ?>
                         
                            <div class="controls">
                                 <?php  $data = \app\models\customer::find()
                                ->select(['email as value', 'email as  label','id'])
                                ->asArray()
                                ->all();

                                echo AutoComplete::widget([
                                'model' => $model,
                                 'attribute' => 'email',
                                'clientOptions' => [
                                'source' => $data,
                                'autoFill'=>true,
                                'minLength'=>'2',
                                'select' => new JsExpression("function( event, ui ) {
                                    $('#email').val(ui.item.id);
                                 }")],
                                 ]);
                                 ?>
    </div>
                            


                        </div>
                    </div>
		     
		     <div class="row-fluid">
                        <div class="form-actions span12  search">
                                <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset',['customer/index'],  ['id' => 'resetVal', 'class' => 'btn btn-default']) ?>
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

<div class="row-fluid">
<div class="span12">
    <div class="box box-color box-bordered">
        <div class="box-title">
            <h3>Subscribers</h3>
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
                            <?= Html::activeLabel($model, 'subscriber_phone', ['label'=>'Phone', 'class'=>'control-label']) ?>
                         
                            <div class="controls">
                                
                                 <?= $form->field($model, 'subscriber_phone')->textInput()->label(false); ?>
                            </div>
                        </div>
                    </div>
                     <div class="span4">
                        <div class="control-group">
                            <?= Html::activeLabel($model, 'subid', ['label'=>'Sub ID', 'class'=>'control-label']) ?>
                         
                            <div class="controls">
                                
                                 <?= $form->field($model, 'subid')->textInput()->label(false); ?>
                            </div>
                        </div>
                    </div>
                    </div>
                    
		     
		     <div class="row-fluid">
                        <div class="form-actions span12  search">
                                <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset',['customer/index'],  ['id' => 'resetVal', 'class' => 'btn btn-default']) ?>
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

