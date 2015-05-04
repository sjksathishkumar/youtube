<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use a3ch3r46\tinymce\TinyMCE;

/* @var $this yii\web\View */
/* @var $model backend\models\EmailTemplates */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs(
   '$("document").ready(function(){ 
        $("#template-gird").on("pjax:end", function() {
            $.pjax.reload({container:"#template-gird"});  //Reload GridView
        });
    });'
);

?>

<div class="row-fluid">
    <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3><i class="icon-table"></i><?php echo  ucfirst(Yii::$app->controller->action->id);?> Account</h3>
                <a class="btn pull-right" data-toggle="modal" href="<?php echo Yii::$app->urlManager->createUrl('/email-templates');?>"><i class="icon-circle-arrow-left"></i> Back</a>
            </div>
            <div class="box-content nopadding">
                <?php yii\widgets\Pjax::begin(['id' => 'template-gird']) ?>
                <?php $form = ActiveForm::begin([
                    'id' => 'user-form',
                    'enableAjaxValidation'=>false,
                    'options' => [
                            'class' => 'form-horizontal form-bordered form-validate',
                    ],
                ]); ?>
                
                <div class="fullwidth">
                    <div class="control-group">
                        <?= Html::activeLabel($model, 'emailTitle', ['label'=>'Title <span class="required">*</span>', 'class'=>'control-label']) ?>
                        <div class="controls">
                            <?= $form->field($model, 'emailTitle',['errorOptions'=>['class'=>'error']])->textInput()->label(false); ?>
                        </div>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="fullwidth">
                    <div class="control-group">
                        <?= Html::activeLabel($model, 'emailFromName', ['label'=>'Sender Name <span class="required">*</span>', 'class'=>'control-label']) ?>
                        <div class="controls">
                            <?= $form->field($model, 'emailFromName',['errorOptions'=>['class'=>'error']])->textInput()->label(false); ?>
                        </div>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="fullwidth">
                    <div class="control-group">
                        <?= Html::activeLabel($model, 'emailFromEmail', ['label'=>'Sender Email <span class="required">*</span>', 'class'=>'control-label']) ?>
                        <div class="controls">
                            <?= $form->field($model, 'emailFromEmail',['errorOptions'=>['class'=>'error']])->textInput()->label(false); ?>
                        </div>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="fullwidth">
                    <div class="control-group">
                        <?= Html::activeLabel($model, 'emailSubject', ['label'=>'Subject <span class="required">*</span>', 'class'=>'control-label']) ?>
                        <div class="controls">
                            <?= $form->field($model, 'emailSubject',['errorOptions'=>['class'=>'error']])->textInput()->label(false); ?>
                        </div>
                    </div>
                    <div class="cb"></div>
                </div>
                 
                <div class="fullwidth">
                    <div class="control-group">
                        <?= Html::activeLabel($model, 'emailContent', ['label'=>'Content <span class="required">*</span>', 'class'=>'control-label']) ?>
                        <div class="controls">
                            <?php echo  $form->field($model, 'emailContent')->widget(TinyMCE::className())->label(false); ?>
                        </div>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="fullwidth">
                    <div class="control-group">
                        <?= Html::activeLabel($model, 'emailTemplateType', ['label'=>'Type <span class="required">*</span>', 'class'=>'control-label']) ?>
                        <div class="controls">
                            <?php echo $form->field($model, 'emailTemplateType')->dropDownList(['G' => 'General', 'C' => 'Contract'])->label(false); ?>
                        </div>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="note span12"><strong>Note :</strong> <span class="required">*</span> Indicates mandatory fields.</div>
                
                <div class="form-actions span12">  
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    <?php echo Html::a('Cancel',array('/email-templates'),array('class'=>'btn')); ?>  
                </div>
                <?php ActiveForm::end(); ?>
                <?php yii\widgets\Pjax::end() ?>
            </div>
        </div>
    </div>
</div>
