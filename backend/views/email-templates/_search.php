<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EmailTemplatesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wide form">
    <div class="box box-color box-bordered">
        <div class="box-title">
            <h3>
                <i class="icon-reorder"></i>
                Search
            </h3>
            <div class="actions">
                <a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
            </div>
        </div>
        <div class="box-content">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>
            <div class="span4">
                <div class="control-group">
                    <div class="controls">
                        <?php echo $form->field($model, 'emailTitle') ?>
                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="control-group">
                    <div class="controls">
                        <?php echo $form->field($model, 'emailSubject') ?>
                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="control-group">
                    <div class="controls">
                        <?= $form->field($model, 'emailTemplateType')->dropDownList(['0' => 'Select Option','G' => 'General', 'C' => 'Contract'],['class'=>'select2-me input-xlarge']); ?>
                    </div>
                </div>
            </div>

            

            <?php //$form->field($model, 'emailFromName') ?>

            <?php //$form->field($model, 'emailFromEmail') ?>

            <?php //$form->field($model, 'emailSubject') ?>

            <?php // echo $form->field($model, 'emailContent') ?>

            <?php // echo $form->field($model, 'emailDateAdded') ?>

            <?php // echo $form->field($model, 'emailDateUpdated') ?>

            <div class="row-fluid">
                <div class="form-actions span12  search">
                    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Reset', ['/email-templates'], ['class' => 'btn btn-default']) ?>
                </div>
            </div>


            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
