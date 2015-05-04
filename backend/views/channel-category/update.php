<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ChannelCategory */



$this->title = 'Update Channel Category';//: ' . ' ' . $model->pkBankID;
$this->params['breadcrumbs'][] = ['label' => 'Channel Category', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pkChannelCategoryID, 'url' => ['view', 'id' => $model->pkChannelCategoryID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="channel-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
