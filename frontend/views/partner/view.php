<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\partner */

$this->title = $model->pkPartnerID;
$this->params['breadcrumbs'][] = ['label' => 'Partners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pkPartnerID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pkPartnerID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pkPartnerID',
            'partnerEmail:email',
            'partnerFirstName',
            'partnerLastName',
            'fkChannelID',
            'partnershipLevel',
            'partnerMobile',
            'partnerDateOfBirth',
            'partnerCity',
            'partnerCountry',
            'partnerProfilePicture',
            'howPartnerKnow',
            'partnerStatus',
            'partnerBankName',
            'partnerNameInBank',
            'partnerBankAccNo',
            'partnerAddedDate',
            'partnerUpdateDate',
        ],
    ]) ?>

</div>
