<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Channel */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row-fluid">
   <div class="span12">
      <div class="box box-color box-bordered">
	 <div class="box-title">
	      <h3><i class="icon-table"></i><?= Html::encode($this->title) ?></h3>
               <a class="btn pull-right" data-toggle="modal" href="<?php echo Yii::$app->urlManager->createUrl('/channel');?>"><i class="icon-circle-arrow-left"></i> Back</a>
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
                        <?= Html::activeLabel($model, 'youtubeChannelID', ['label'=>'Youtube Channel ID <span class="required">*</span>', 'class'=>'control-label']) ?>
                        <div class="controls">
                            <?= $form->field($model, 'youtubeChannelID',['errorOptions'=>['class'=>'error']])->textInput()->label(false); ?>
                        </div>
                    </div>
                    <div class="cb"></div>
                </div>
             
             <div class="fullwidth">
                    <div class="control-group">
                        <?= Html::activeLabel($model, 'channelName', ['label'=>'Youtube Channel Name <span class="required">*</span>', 'class'=>'control-label']) ?>
                        <div class="controls">
                            <?= $form->field($model, 'channelName',['errorOptions'=>['class'=>'error']])->textInput()->label(false); ?>
                        </div>
                    </div>
                    <div class="cb"></div>
                </div>     
             
             <div class="fullwidth">
                    <div class="control-group">
                        <?= Html::activeLabel($model, 'channelStatus', ['label'=>'Channel Status <span class="required">*</span>', 'class'=>'control-label']) ?>
                        <div class="controls">
                            <?= $form->field($model, 'channelStatus')->dropDownList([ '0', '1', ], ['prompt' => ''])->label(false); ?>
                        </div>
                    </div>
                    <div class="cb"></div>
                </div>              
             
	    <div class="note span12"><strong>Note :</strong> <span class="required">*</span> Indicates mandatory fields.</div>
            
             <div class="form-actions span12">  
	      <?= Html::submitButton($model->isNewRecord ? 'Add Channel' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	       <?php echo Html::a('Cancel',array('/channel'),array('class'=>'btn')); ?>  
	    </div>
             
	    
	    <?php ActiveForm::end(); ?>
            <?php yii\widgets\Pjax::end() ?>
	 </div>
      </div>
   </div>
</div>

<div class="channel-form" style="display:none">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fkPartnerID')->textInput() ?>

    <?= $form->field($model, 'youtubeChannelID')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'channelName')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'fkChannelCategoryID')->textInput() ?>

    <?= $form->field($model, 'channelStatus')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'channelAddDate')->textInput() ?>

    <?= $form->field($model, 'channelUpdateDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
