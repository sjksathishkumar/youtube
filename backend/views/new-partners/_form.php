<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\ChannelCategory;
use backend\models\Contract;
use yii\helpers\ArrayHelper;
use a3ch3r46\tinymce\TinyMCE;

/* @var $this yii\web\View */
/* @var $model common\models\Partners */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs(
   '$("document").ready(function(){ 
        $("#partner-gird").on("pjax:end", function() {
            $.pjax.reload({container:"#partner-gird"});  //Reload GridView
        });
    });'
);

?>

<div class="row-fluid">
    <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3><i class="icon-table"></i><?php echo  ucfirst(Yii::$app->controller->action->id);?> Account</h3>
                <a class="btn pull-right" data-toggle="modal" href="<?php echo Yii::$app->urlManager->createUrl('/new-partners');?>"><i class="icon-circle-arrow-left"></i> Back</a>
            </div>
            <div class="box-content nopadding">
                <?php yii\widgets\Pjax::begin(['id' => 'partner-gird']) ?>
                <?php $form = ActiveForm::begin([
                    'id' => 'user-form',
                    'enableAjaxValidation'=>false,
                    'options' => [
                            'class' => 'form-horizontal form-bordered form-validate',
                    ],
                ]); ?>
                
                <div class="fullwidth">
                    <div class="control-group">
                        <?= Html::activeLabel($model, 'partnerEmail', ['label'=>'Title', 'class'=>'control-label']) ?>
                        <div class="controls">
                            <?php echo $model->partnerEmail; ?>
                        </div>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="fullwidth">
                    <div class="control-group">
                        <?= Html::activeLabel($model, 'partnerFirstName', ['label'=>'First Name', 'class'=>'control-label']) ?>
                        <div class="controls">
                            <?php echo $model->partnerFirstName; ?>
                        </div>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="fullwidth">
                    <div class="control-group">
                        <?= Html::activeLabel($model, 'partnerLastName', ['label'=>'Last Name', 'class'=>'control-label']) ?>
                        <div class="controls">
                            <?php echo $model->partnerLastName; ?>
                        </div>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="fullwidth">
                    <div class="control-group">
                        <?php echo ""; ?>
                        <?= Html::activeLabel($model, 'partnerLastName', ['label'=>'Channel Name', 'class'=>'control-label']) ?>
                        <div class="controls">
                            <?php 
                                echo $model->channel[0]['channelName']; 
                            ?>
                        </div>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="fullwidth">
                    <div class="control-group">
                        <?php echo ""; ?>
                        <?= Html::activeLabel($model, 'partnerLastName', ['label'=>'Channel Category', 'class'=>'control-label']) ?>
                        <div class="controls">
                            <?php 
                                $cateogoryID = $model->channel[0]['fkChannelCategoryID']; 
                                $channelName = ChannelCategory::findAll($cateogoryID); 
                                echo $channelName[0]['channelCategoryName']; 
                            ?>
                        </div>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="fullwidth">
                    <div class="control-group">
                        <?= Html::activeLabel($model, 'partnerKnowHow', ['label'=>'How Partner Know', 'class'=>'control-label']) ?>
                        <div class="controls">
                            <?php if($model->partnerKnowHow=='0')
                                    {
                                        echo "Internet";
                                    }
                                    else{
                                        echo "Peers";
                                    }
                            ?>
                        </div>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="fullwidth">
                    <div class="control-group">
                        <?= Html::activeLabel($model, 'partnerKnowHow', ['label'=>'Select Template', 'class'=>'control-label']) ?>
                        <div class="controls">
                           <?= Html::dropDownList('contractTemplate', null,ArrayHelper::map(Contract::find()->all(), 'pkContractID', 'contractName'), ['id' => 'contractTemplate', 'prompt'=>'Select Template', 'onchange' => 'getContractData()']) ?>
                        </div>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="fullwidth">
                    <div class="control-group">
                        <?= Html::activeLabel($model, 'contract', ['label'=>'Preview Template', 'class'=>'control-label']) ?>
                        <div class="controls">
                           <?php echo  $form->field($model, 'contract')->widget(TinyMCE::className())->label(false); ?>
                        </div>
                    </div>
                    <div class="cb"></div>
                </div>

                
                
                <div class="form-actions span12">  
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Approve', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    <?php echo Html::a('Cancel',array('/new-partners'),array('class'=>'btn')); ?>  
                </div>
                <?php ActiveForm::end(); ?>
                <?php yii\widgets\Pjax::end() ?>
            </div>
        </div>
    </div>
</div>


<div class="partners-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'partnerEmail')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'partnerFirstName')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'partnerLastName')->textInput(['maxlength' => 30]) ?>



    <?= $form->field($model, 'partnershipLevel')->dropDownList([ '0', '1', '2', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'partnerMobile')->textInput() ?>

    <?= $form->field($model, 'partnerDateOfBirth')->textInput() ?>

    <?= $form->field($model, 'fkCityID')->textInput() ?>

    <?= $form->field($model, 'fkCountryID')->textInput() ?>

    <?= $form->field($model, 'partnerFirstLogin')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'partnerProfilePicture')->textInput(['maxlength' => 150]) ?>

    <?= $form->field($model, 'partnerKnowHow')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'partnerStatus')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'partnerContractSigned')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'fkBankID')->textInput() ?>

    <?= $form->field($model, 'partnerNameInBank')->textInput(['maxlength' => 55]) ?>

    <?= $form->field($model, 'partnerBankAccNo')->textInput() ?>

    <?= $form->field($model, 'partnerSubscribeNewsletter')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'partnerAddedDate')->textInput() ?>

    <?= $form->field($model, 'partnerUpdateDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
