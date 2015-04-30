<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmailTemplatesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manage Email Templates';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="pull-right margin_top20">
   <?= Html::a('Create Template', ['create'], ['class' => 'btn btn-success']) ?>
</div>
<div class="user-index">
<?php \yii\widgets\Pjax::begin(); ?>   
    <div class="page-header">
    <div class="pull-left">
        <h1>Email Templates</h1>
    </div>          
</div>
    <div class="breadcrumbs">
    <ul>
        <li><?php echo Html::a('Home',['/site/index']); ?><i class="icon-angle-right"></i></li>
        <li><a href="#">Manage Template</a></li>
    </ul>
    <div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
</div>
    <div class="search-form">
<?php echo $this->render('_search', ['model' => $searchModel]); ?>
</div><!-- search-form -->

   <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
                <h3><i class="icon-reorder"></i> Email Templates</h3>
                    <!--<a class="btn pull-right" data-toggle="modal" href="#" id = "viewAll">View All</a>-->
            </div>
            <div class="clear"></div>

            <div class="box-content nopadding">
                <?php \yii\widgets\Pjax::begin(); ?>   
                <form action="" name='template-grid-list-form' id='template-list-form'>
                
                 
                <?= yii\grid\GridView::widget([
                    'dataProvider' => $dataProvider,
                    'id' => 'template',
                   // 'filterModel' => $searchModel,
                    'columns' => [
                        [
                            'class' => 'yii\grid\DataColumn',
                            //'header' => 'Account ID',
                            //'label'=>'id',
                            'attribute' => 'pkEmailID',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return $data->pkEmailID; // $data['name'] for array data, e.g. using SqlDataProvider.
                            },
                        ],
                        [
                            'attribute' => 'emailTitle',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return $data->emailTitle; // $data['name'] for array data, e.g. using SqlDataProvider.
                            },
                        ],
                        [
                            //'header' => 'emailFromName',
                            'attribute' => 'emailFromName',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return $data->emailFromName;
                                //return  date("d M, Y h:i",  strtotime($data->created_at)); // $data['name'] for array data, e.g. using SqlDataProvider.
                            },
                        ],
                        [
                            //'header' => 'emailFromName',
                            'attribute' => 'emailFromEmail',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return $data->emailFromEmail;
                                //return  date("d M, Y h:i",  strtotime($data->created_at)); // $data['name'] for array data, e.g. using SqlDataProvider.
                            },
                        ],
                        [
                            'attribute' => 'emailTemplateType',
                            'format' => 'raw',
                            'value' => function ($data) {
                                $val='';
                               // echo "<pre>";
                                //print_r($data->emailTemplateType);
                                if($data->emailTemplateType == 'G')
                                {
                                    $val = '';
                                    $val = 'General';   
                                    //return $val;
                                }
                                elseif ($data->emailTemplateType == 'C') {
                                    $val = '';
                                    $val = 'Contract';
                                    //return $val;
                                }
                                return $val; // $data['name'] for array data, e.g. using SqlDataProvider.
                            },
                        ],
                        /*[
                            'header' => 'Email Verified',
                            'attribute' => 'verifyemail',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return $data->verifyemail='0'?'No':'Yes'; // $data['name'] for array data, e.g. using SqlDataProvider.
                            },
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($data) {
                                return $data->status=='0'?'Inactive':'Active'; // $data['name'] for array data, e.g. using SqlDataProvider.
                            },
                        ],*/
                        [
                            'header' => 'Action',
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{view} {update} {delete}',
                        ],
                    ],
                ]); ?>
               
                </form>
                  <?php \yii\widgets\Pjax::end(); ?>
            </div>
        </div>
</div>
























<?php

//use yii\helpers\Html;
//use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmailTemplatesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Email Templates';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-templates-index">

   

</div>
