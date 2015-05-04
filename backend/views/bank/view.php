<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = 'View Bank';
$this->params['breadcrumbs'][] = ['label' => 'Banks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-header">
    <div class="pull-left">
      <h1>View Bank</h1>
   </div>			
</div>

<div class="breadcrumbs">
	<ul>
		<li><?php echo Html::a('Home',['/site/index']); ?><i class="icon-angle-right"></i></li>
		<li><?php echo Html::a('Manage Banks',['/bank']); ?><i class="icon-angle-right"></i></li>
		<li><a href="javascript:void(0);">View Bank </a></li>
	</ul>
	<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
</div>

<div class="row-fluid">



        <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>View Bank</h3>
                  <a class="btn pull-right" data-toggle="modal" href="<?php echo Yii::$app->urlManager->createUrl('/bank');?>"><i class="icon-circle-arrow-left"></i> Back</a>
            </div>
            <div class="box-content nopadding">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pkBankID',
            'bankName',
            'bankAdded',
            'bankUpdate',
        ],
    ]) ?>
 </div>
    <div class="box-content">
         <?= Html::a('Update', ['update', 'id' => $model->pkBankID], ['class' => 'btn btn-primary']) ?>
         <?= Html::a('Delete', ['delete', 'id' => $model->pkBankID], [
             'class' => 'btn btn-danger',
             'data' => [
                 'confirm' => 'Are you sure you want to delete this bank?',
                 'method' => 'post',
             ],
         ]) ?>
     
    </div>

        </div>
    </div>
</div>
