<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Partners */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partners-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'partnerEmail')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'partnerFirstName')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'partnerLastName')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'fkChannelID')->textInput() ?>

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
