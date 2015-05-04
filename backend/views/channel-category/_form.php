<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ChannelCategory */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row-fluid">
   <div class="span12">
      <div class="box box-color box-bordered">
	 <div class="box-title">
	      <h3><i class="icon-table"></i><?= Html::encode($this->title) ?></h3>
               <a class="btn pull-right" data-toggle="modal" href="<?php echo Yii::$app->urlManager->createUrl('/channel-category');?>"><i class="icon-circle-arrow-left"></i> Back</a>
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
                        <?= Html::activeLabel($model, 'channelCategoryName', ['label'=>'Channel Category Name <span class="required">*</span>', 'class'=>'control-label']) ?>
                        <div class="controls">
                            <?= $form->field($model, 'channelCategoryName',['errorOptions'=>['class'=>'error']])->textInput()->label(false); ?>
                        </div>
                    </div>
                    <div class="cb"></div>
                </div>
             
             
	    <div class="note span12"><strong>Note :</strong> <span class="required">*</span> Indicates mandatory fields.</div>
            
             <div class="form-actions span12">  
	      <?= Html::submitButton($model->isNewRecord ? 'Add Channel Category' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	       <?php echo Html::a('Cancel',array('/channel-category'),array('class'=>'btn')); ?>  
	    </div>
             
	    
	    <?php ActiveForm::end(); ?>
            <?php yii\widgets\Pjax::end() ?>
	 </div>
      </div>
   </div>
</div>
<div class="channel-category-form" style="display:none">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'channelCategoryName')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'channelUsed')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'channelAddedDate')->textInput() ?>

    <?= $form->field($model, 'channelUpdateDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
