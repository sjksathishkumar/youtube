<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SearchChannel */
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
                        <?php echo $form->field($model, 'youtubeChannelID') ?>
                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="control-group">
                    <div class="controls">
                        <?php echo $form->field($model, 'channelName') ?>
                    </div>
                </div>
            </div>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset', ['/channel'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    </div>
</div>

<div class="channel-search" style="display:none">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pkChannelID') ?>

    <?= $form->field($model, 'fkPartnerID') ?>

    <?= $form->field($model, 'youtubeChannelID') ?>

    <?= $form->field($model, 'channelName') ?>

    <?= $form->field($model, 'fkChannelCategoryID') ?>

    <?php // echo $form->field($model, 'channelStatus') ?>

    <?php // echo $form->field($model, 'channelAddDate') ?>

    <?php // echo $form->field($model, 'channelUpdateDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
