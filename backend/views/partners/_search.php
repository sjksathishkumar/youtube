<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\PartnersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partners-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pkPartnerID') ?>

    <?= $form->field($model, 'partnerEmail') ?>

    <?= $form->field($model, 'auth_key') ?>

    <?= $form->field($model, 'password_hash') ?>

    <?= $form->field($model, 'password_reset_token') ?>

    <?php // echo $form->field($model, 'partnerFirstName') ?>

    <?php // echo $form->field($model, 'partnerLastName') ?>

    <?php // echo $form->field($model, 'fkChannelID') ?>

    <?php // echo $form->field($model, 'partnershipLevel') ?>

    <?php // echo $form->field($model, 'partnerMobile') ?>

    <?php // echo $form->field($model, 'partnerDateOfBirth') ?>

    <?php // echo $form->field($model, 'fkCityID') ?>

    <?php // echo $form->field($model, 'fkCountryID') ?>

    <?php // echo $form->field($model, 'partnerFirstLogin') ?>

    <?php // echo $form->field($model, 'partnerProfilePicture') ?>

    <?php // echo $form->field($model, 'partnerKnowHow') ?>

    <?php // echo $form->field($model, 'partnerStatus') ?>

    <?php // echo $form->field($model, 'partnerContractSigned') ?>

    <?php // echo $form->field($model, 'fkBankID') ?>

    <?php // echo $form->field($model, 'partnerNameInBank') ?>

    <?php // echo $form->field($model, 'partnerBankAccNo') ?>

    <?php // echo $form->field($model, 'partnerSubscribeNewsletter') ?>

    <?php // echo $form->field($model, 'partnerAddedDate') ?>

    <?php // echo $form->field($model, 'partnerUpdateDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
