<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\components\CommonFunction;

/* @var $this yii\web\View */
/* @var $searchModel backend\PartnersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Partners';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-index">
<?php \yii\widgets\Pjax::begin(); ?>   
    <div class="page-header">
    <div class="pull-left">
        <h1>Partners</h1>
    </div>          
</div>
    <div class="breadcrumbs">
    <ul>
        <li><?php echo Html::a('Home',['/site/index']); ?><i class="icon-angle-right"></i></li>
        <li><?php echo Html::a('Manage Partners',['/partners']); ?></li>
    </ul>
    <div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
</div>
<div class="search-form">
<?php echo $this->render('_search', ['model' => $searchModel]); ?>
</div><!-- search-form -->

<div class="row-fluid">
    <div class="breadcrumbs" id="breadcrumbs-msg">

            <?php  
          
              // Notification message on update 

              if((Yii::$app->session->hasFlash('editTemplateSuccess')) || (Yii::$app->session->hasFlash('createTemplateSuccess')) || (Yii::$app->session->hasFlash('deleteTemplateSuccess')) || (Yii::$app->session->hasFlash('deleteTemplateFaild'))){ 
                    if(Yii::$app->session->getFlash('editTemplateSuccess'))
                    {
                        echo "<script>$.gritter.add({ title: 'Success', text: 'Template Updated successfully', time: 3000 });</script>";
                    }
                    else if(Yii::$app->session->getFlash('createTemplateSuccess'))
                    {
                        echo "<script>$.gritter.add({ title: 'Success', text: 'Template Created successfully', time: 3000 });</script>";
                    }
                    else if(Yii::$app->session->getFlash('deleteTemplateSuccess'))
                    {
                        echo "<script>$.gritter.add({ title: 'Success', text: 'Template Deleted successfully', time: 3000 });</script>";
                    }
                    else if(Yii::$app->session->getFlash('deleteTemplateFaild'))
                    {
                        echo "<script>$.gritter.add({ title: 'Success', text: 'Template Deleted Faild ! Email Template is used with some Datas.', time: 3000 });</script>";
                    }
                } 
          ?>
    </div>

    <div class="box box-color box-bordered">
        <div class="box-title">
            <h3><i class="icon-reorder"></i> Partners</h3>
                <!--<a class="btn pull-right" data-toggle="modal" href="#" id = "viewAll">View All</a>-->
        </div>
        <div class="clear"></div>

        <div class="box-content nopadding">
            <?php \yii\widgets\Pjax::begin(); ?>   
            <form action="" name='partners-grid-list-form' id='partners-list-form'>
            
             
            <?= yii\grid\GridView::widget([
                'dataProvider' => $dataProvider,
                'id' => 'partners',
               // 'filterModel' => $searchModel,
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'headerOptions' => ['style'=>'text-align:center'],
                        'contentOptions' => ['style'=>'text-align:center'],
                    ],
                    [
                        'name' => 'id[]',
                        'class' => 'yii\grid\CheckboxColumn',
                        'headerOptions' => ['style'=>'text-align:center'],
                        'contentOptions' => ['style'=>'text-align:center'],
                        
                    ],
                    [
                        'attribute' => 'partnerFirstName',
                        'format' => 'raw',
                        'headerOptions' => ['style'=>'text-align:center'],
                        'contentOptions' => ['style'=>'text-align:center'],
                        'value' => function ($data) {
                            return $data->partnerFirstName; // $data['name'] for array data, e.g. using SqlDataProvider.
                        },
                    ],
                    [
                        'attribute' => 'partnerEmail',
                        'format' => 'raw',
                        'headerOptions' => ['style'=>'text-align:center'],
                        'contentOptions' => ['style'=>'text-align:center'],
                        'value' => function ($data) {
                            return $data->partnerEmail; // $data['name'] for array data, e.g. using SqlDataProvider.
                        },
                    ],
                    [
                        'attribute' => 'channelName',
                        'format' => 'raw',
                        'headerOptions' => ['style'=>'text-align:center'],
                        'contentOptions' => ['style'=>'text-align:center'],
                        'value' => function ($data) {
                            $channel = 'N/A';
                            if(is_object($data))
                            {
                                foreach ($data->channel as $channel)
                                {
                                    $name[]=$channel->channelName;
                                    $channel = $name[0];
                                }
                            }
                            else
                            {
                                $channel='NA';
                            }
                            return $channel; // $data['name'] for array data, e.g. using SqlDataProvider.
                        },
                    ],
                    [
                        'attribute' => 'partnerStatus',
                        'format' => 'raw',
                        'headerOptions' => ['style'=>'text-align:center'],
                        'contentOptions' => ['style'=>'text-align:center'],
                        'value' => function ($data) {
                            $status = Yii::$app->CommonFunction->statusFurmate($data->partnerStatus);
                            return $status;    
                        },
                    ],
                    [
                        'header' => 'Action',
                        'class' => 'yii\grid\ActionColumn',
                        'headerOptions' => ['style'=>'text-align:center'],
                        'contentOptions' => ['style'=>'text-align:center'],
                        'template' => '{view} {update} {delete}',
                    ],
                ],
            ]); ?>
           
            </form>
              <?php \yii\widgets\Pjax::end(); ?>
        </div>
    </div>
</div>


