<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchBank */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bank Details';
$this->params['breadcrumbs'][] = $this->title;
?>

  <div class="pull-right margin_top20">
    <?= Html::a('Add New Bank', ['create'], ['class' => 'btn btn-success']) ?>
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
        <li><?php echo Html::a('Manage Banks',['/bank']); ?></li>
    </ul>
    <div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
</div>
    <div class="search-form">
<?php echo $this->render('_search', ['model' => $searchModel]); ?>
</div><!-- search-form -->
    
    <div class="row-fluid">
        <div class="breadcrumbs" id="breadcrumbs-msg">
	
        <?php
        if((Yii::$app->session->hasFlash('createbank')) || (Yii::$app->session->hasFlash('updatebank')) || (Yii::$app->session->hasFlash('deletebank')))
         { 
              if(Yii::$app->session->getFlash('createbank'))
              {
                  echo "<script>$.gritter.add({ title: 'Success', text: 'Bank added Successfully', time: 3000 });</script>";
              }
              else if(Yii::$app->session->getFlash('updatebank'))
              {
                  echo "<script>$.gritter.add({ title: 'Success', text: 'Bank update Successfully', time: 3000 });</script>";
              }
              else if(Yii::$app->session->getFlash('deletebank'))
              {
                  echo "<script>$.gritter.add({ title: 'Success', text: 'Bank Deleted Successfully', time: 3000 });</script>";
              }
         }                  
        ?>						
	
</div>

        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3><i class="icon-reorder"></i> All Bank Details</h3>
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

            'pkBankID',
            'bankName',
            'bankAdded',
            'bankUpdate',

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
