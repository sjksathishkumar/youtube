<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\PartnersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Partners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Partners', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pkPartnerID',
            'partnerEmail:email',
            'auth_key',
            'password_hash',
            'password_reset_token',
            // 'partnerFirstName',
            // 'partnerLastName',
            // 'fkChannelID',
            // 'partnershipLevel',
            // 'partnerMobile',
            // 'partnerDateOfBirth',
            // 'fkCityID',
            // 'fkCountryID',
            // 'partnerFirstLogin',
            // 'partnerProfilePicture',
            // 'partnerKnowHow',
            // 'partnerStatus',
            // 'partnerContractSigned',
            // 'fkBankID',
            // 'partnerNameInBank',
            // 'partnerBankAccNo',
            // 'partnerSubscribeNewsletter',
            // 'partnerAddedDate',
            // 'partnerUpdateDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
