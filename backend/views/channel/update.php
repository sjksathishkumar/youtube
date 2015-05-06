<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Channel */

$this->title = 'Update Channel';//: ' . ' ' . $model->pkChannelID;
$this->params['breadcrumbs'][] = ['label' => 'Channels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pkChannelID, 'url' => ['view', 'id' => $model->pkChannelID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="channel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
