<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchChannelCategory */
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
                        <?php echo $form->field($model, 'pkChannelCategoryID') ?>
                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="control-group">
                    <div class="controls">
                        <?php echo $form->field($model, 'channelCategoryName') ?>
                    </div>
                </div>
            </div>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset', ['/channel-category'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    </div>
</div>

