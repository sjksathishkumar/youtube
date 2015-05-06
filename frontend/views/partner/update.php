<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\partner */

$this->title = 'Update Partner: ' . ' ' . $model->pkPartnerID;
$this->params['breadcrumbs'][] = ['label' => 'Partners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pkPartnerID, 'url' => ['view', 'id' => $model->pkPartnerID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="partner-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
