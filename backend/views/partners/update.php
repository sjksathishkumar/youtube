<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Partners */

$this->title = 'Update Partners: ' . ' ' . $model->pkPartnerID;
$this->params['breadcrumbs'][] = ['label' => 'Partners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pkPartnerID, 'url' => ['view', 'id' => $model->pkPartnerID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="partners-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
