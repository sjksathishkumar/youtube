<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\PartnersSearch */
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
                        <?php echo $form->field($model, 'partnerEmail') ?>
                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="control-group">
                    <div class="controls">
                        <?php echo $form->field($model, 'partnerFirstName') ?>
                    </div>
                </div>
            </div>
            <!-- <div class="span4">
                <div class="control-group">
                    <div class="controls">
                        <?php //echo $form->field($model, 'channelName') ?>
                    </div>
                </div>
            </div> -->
            

            <?php //$form->field($model, 'emailFromName') ?>

            <?php //$form->field($model, 'emailFromEmail') ?>

            <?php //$form->field($model, 'emailSubject') ?>

            <?php // echo $form->field($model, 'emailContent') ?>

            <?php // echo $form->field($model, 'emailDateAdded') ?>

            <?php // echo $form->field($model, 'emailDateUpdated') ?>

            <div class="row-fluid">
                <div class="form-actions span12  search">
                    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Reset', ['/new-partners'], ['class' => 'btn btn-default']) ?>
                </div>
            </div>


            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>


    <?php //$form->field($model, 'pkPartnerID') ?>

    <?php //$form->field($model, 'partnerEmail') ?>

    <?php //$form->field($model, 'auth_key') ?>

    <?php //$form->field($model, 'password_hash') ?>

    <?php // $form->field($model, 'password_reset_token') ?>

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

 
