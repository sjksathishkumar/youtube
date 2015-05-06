<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Contract */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contract-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contractName')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'contractContent')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'contractAddDate')->textInput() ?>

    <?= $form->field($model, 'contractUpdateDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
