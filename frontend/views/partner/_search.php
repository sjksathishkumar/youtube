<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PartnerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partner-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pkPartnerID') ?>

    <?= $form->field($model, 'partnerEmail') ?>

    <?= $form->field($model, 'partnerFirstName') ?>

    <?= $form->field($model, 'partnerLastName') ?>

    <?= $form->field($model, 'fkChannelID') ?>

    <?php // echo $form->field($model, 'partnershipLevel') ?>

    <?php // echo $form->field($model, 'partnerMobile') ?>

    <?php // echo $form->field($model, 'partnerDateOfBirth') ?>

    <?php // echo $form->field($model, 'partnerCity') ?>

    <?php // echo $form->field($model, 'partnerCountry') ?>

    <?php // echo $form->field($model, 'partnerProfilePicture') ?>

    <?php // echo $form->field($model, 'howPartnerKnow') ?>

    <?php // echo $form->field($model, 'partnerStatus') ?>

    <?php // echo $form->field($model, 'partnerBankName') ?>

    <?php // echo $form->field($model, 'partnerNameInBank') ?>

    <?php // echo $form->field($model, 'partnerBankAccNo') ?>

    <?php // echo $form->field($model, 'partnerAddedDate') ?>

    <?php // echo $form->field($model, 'partnerUpdateDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
