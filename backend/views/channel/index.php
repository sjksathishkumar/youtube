<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchChannel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Channels';
$this->params['breadcrumbs'][] = $this->title;
?>
  <div class="pull-right margin_top20">
    <?= Html::a('Add New Channel', ['create'], ['class' => 'btn btn-success']) ?>
 </div>
<div class="user-index">
<?php \yii\widgets\Pjax::begin(); ?> 
<div class="page-header">
    <div class="pull-left">
    <h1><?= Html::encode($this->title) ?></h1>
    </div>          
</div>
<div class="breadcrumbs">
    <ul>
        <li><?php echo Html::a('Home',['/site/index']); ?><i class="icon-angle-right"></i></li>
        <li><?php echo Html::a('Manage Channels',['/channel']); ?></li>
    </ul>
    <div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
</div>
    <div class="search-form">
<?php echo $this->render('_search', ['model' => $searchModel]); ?>
</div><!-- search-form -->
<div class="row-fluid">
        <div class="breadcrumbs" id="breadcrumbs-msg">
	
        <?php
        if((Yii::$app->session->hasFlash('createchannel')) || (Yii::$app->session->hasFlash('updatechannel')) || (Yii::$app->session->hasFlash('deletechannel')))
         { 
              if(Yii::$app->session->getFlash('createchannel'))
              {
                  echo "<script>$.gritter.add({ title: 'Success', text: 'Channel added Successfully', time: 3000 });</script>";
              }
              else if(Yii::$app->session->getFlash('updatechannel'))
              {
                  echo "<script>$.gritter.add({ title: 'Success', text: 'Channel update Successfully', time: 3000 });</script>";
              }
              else if(Yii::$app->session->getFlash('deletechannel'))
              {
                  echo "<script>$.gritter.add({ title: 'Success', text: 'Channel Deleted Successfully', time: 3000 });</script>";
              }
         }                  
        ?>						
	
</div>

        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3><i class="icon-reorder"></i> All Channel Details</h3>
                    <!--<a class="btn pull-right" data-toggle="modal" href="#" id = "viewAll">View All</a>-->
            </div>
            <div class="clear"></div>

            <div class="box-content nopadding">
                <?php \yii\widgets\Pjax::begin(); ?>   
                <form action="" name='user-grid-list-form' id='user-grid-list-form'>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pkChannelID',
            'fkPartnerID',
            'youtubeChannelID',
            'channelName',
            //'fkChannelCategoryID',
            // 'channelStatus',
            // 'channelAddDate',
            // 'channelUpdateDate',

            ['header' => 'Action',
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            ],
        ],
    ]); ?>

                  <?php \yii\widgets\Pjax::end(); ?>
               
            </div>
            
        </div>
</div>

<div class="channel-index" style="display:none">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Channel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pkChannelID',
            'fkPartnerID',
            'youtubeChannelID',
            'channelName',
            'fkChannelCategoryID',
            // 'channelStatus',
            // 'channelAddDate',
            // 'channelUpdateDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
