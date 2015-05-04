<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bank */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row-fluid">
   <div class="span12">
      <div class="box box-color box-bordered">
	 <div class="box-title">
	      <h3><i class="icon-table"></i><?= Html::encode($this->title) ?></h3>
               <a class="btn pull-right" data-toggle="modal" href="<?php echo Yii::$app->urlManager->createUrl('/bank');?>"><i class="icon-circle-arrow-left"></i> Back</a>
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
            
             <div class="fullwidth">
                    <div class="control-group">
                        <?= Html::activeLabel($model, 'bankName', ['label'=>'Bank Name <span class="required">*</span>', 'class'=>'control-label']) ?>
                        <div class="controls">
                            <?= $form->field($model, 'bankName',['errorOptions'=>['class'=>'error']])->textInput()->label(false); ?>
                        </div>
                    </div>
                    <div class="cb"></div>
                </div>
             
             
	    <div class="note span12"><strong>Note :</strong> <span class="required">*</span> Indicates mandatory fields.</div>
            
             <div class="form-actions span12">  
	      <?= Html::submitButton($model->isNewRecord ? 'Add bank' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	       <?php echo Html::a('Cancel',array('/bank'),array('class'=>'btn')); ?>  
	    </div>
             
	    
	    <?php ActiveForm::end(); ?>
            <?php yii\widgets\Pjax::end() ?>
	 </div>
      </div>
   </div>
</div>
