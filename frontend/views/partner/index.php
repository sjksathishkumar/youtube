<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PartnerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Partners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Partner', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pkPartnerID',
            'partnerEmail:email',
            'partnerFirstName',
            'partnerLastName',
            'fkChannelID',
            // 'partnershipLevel',
            // 'partnerMobile',
            // 'partnerDateOfBirth',
            // 'partnerCity',
            // 'partnerCountry',
            // 'partnerProfilePicture',
            // 'howPartnerKnow',
            // 'partnerStatus',
            // 'partnerBankName',
            // 'partnerNameInBank',
            // 'partnerBankAccNo',
            // 'partnerAddedDate',
            // 'partnerUpdateDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
