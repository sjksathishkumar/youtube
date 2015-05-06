<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Channel */

$this->title = $model->pkChannelID;
$this->params['breadcrumbs'][] = ['label' => 'Channels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-header">
    <div class="pull-left">
      <h1>View Channels</h1>
   </div>			
</div>

<div class="breadcrumbs">
	<ul>
		<li><?php echo Html::a('Home',['/site/index']); ?><i class="icon-angle-right"></i></li>
		<li><?php echo Html::a('Manage Channels',['/channel']); ?><i class="icon-angle-right"></i></li>
		<li><a href="javascript:void(0);">View Channels </a></li>
	</ul>
	<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
</div>

<div class="row-fluid">



        <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>View Channels</h3>
                  <a class="btn pull-right" data-toggle="modal" href="<?php echo Yii::$app->urlManager->createUrl('/channel');?>"><i class="icon-circle-arrow-left"></i> Back</a>
            </div>
            <div class="box-content nopadding">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pkChannelID',
            'fkPartnerID',
            'youtubeChannelID',
            'channelName',
            'fkChannelCategoryID',
            'channelStatus',
            'channelAddDate',
            'channelUpdateDate',
        ],
    ]) ?>
 </div>
    <div class="box-content">
         <?= Html::a('Update', ['update', 'id' => $model->pkChannelID], ['class' => 'btn btn-primary']) ?>
         <?= Html::a('Delete', ['delete', 'id' => $model->pkChannelID], [
             'class' => 'btn btn-danger',
             'data' => [
                 'confirm' => 'Are you sure you want to delete this channel?',
                 'method' => 'post',
             ],
         ]) ?>
     
    </div>

        </div>
    </div>
</div>

<div class="channel-view" style="display:none">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pkChannelID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pkChannelID], [
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
            'pkChannelID',
            'fkPartnerID',
            'youtubeChannelID',
            'channelName',
            'fkChannelCategoryID',
            'channelStatus',
            'channelAddDate',
            'channelUpdateDate',
        ],
    ]) ?>

</div>
