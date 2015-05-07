<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Partners */

$this->title = $model->pkPartnerID;
$this->params['breadcrumbs'][] = ['label' => 'Partners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-view">

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
            'auth_key',
            'password_hash',
            'password_reset_token',
            'partnerFirstName',
            'partnerLastName',
           
            'partnershipLevel',
            'partnerMobile',
            'partnerDateOfBirth',
            'fkCityID',
            'fkCountryID',
            'partnerFirstLogin',
            'partnerProfilePicture',
            'partnerKnowHow',
            'partnerStatus',
            'partnerContractSigned',
            'fkBankID',
            'partnerNameInBank',
            'partnerBankAccNo',
            'partnerSubscribeNewsletter',
            'partnerAddedDate',
            'partnerUpdateDate',
        ],
    ]) ?>

</div>
