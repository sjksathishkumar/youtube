<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Contract */

$this->title = 'Update Contract: ' . ' ' . $model->pkContractID;
$this->params['breadcrumbs'][] = ['label' => 'Contracts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pkContractID, 'url' => ['view', 'id' => $model->pkContractID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contract-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
