<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ticket */

$this->title = 'View Ticket';
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-header">
				<div class="pull-left">
				  <h1>View Staff</h1>
			       </div>			
		           </div>

<div class="breadcrumbs">
	<ul>
		<li><?php echo Html::a('Home',['/site/index']); ?><i class="icon-angle-right"></i></li>
		<li><?php echo Html::a('Manage Staff',['/staff']); ?><i class="icon-angle-right"></i></li>
		<li><a href="javascript:void(0);">View Staff </a></li>
	</ul>
	<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
</div>


<div class="row-fluid">
    <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>View Ticket</h3>
                  <a class="btn pull-right" data-toggle="modal" href="<?php echo Yii::$app->urlManager->createUrl('/staff');?>"><i class="icon-circle-arrow-left"></i> Back</a>
            </div>
            <div class="box-content nopadding">

                <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           
            [
                'label' => 'Name',
                 'value' => $model->staffFirstName. ' ' .$model->staffLastName,
            ],
            'staffEmailID:email',
            'staffUsername',
           
          
           
            'staffPhoneNumber',
            'staffExt',
            
          
            'staffMobile',
            
             [
                'label' => 'Updated At',
                 'value' => $model->staffDateUpdated!='0000-00-00 00:00:00'?date("d M, Y h:i",  strtotime($model->staffDateUpdated)):date("d M, Y h:i",  strtotime($model->staffDateAdded)),
            ],
            
            
            
            
           
            
        
        ],
    ]) ?>
            </div>

        </div>
    </div>
</div>

