<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ChannelCategory */

$this->title = 'View Channel Category';
$this->params['breadcrumbs'][] = ['label' => 'Channel Category', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-header">
    <div class="pull-left">
      <h1>View Channel Category</h1>
   </div>			
</div>
<div class="breadcrumbs">
	<ul>
		<li><?php echo Html::a('Home',['/site/index']); ?><i class="icon-angle-right"></i></li>
		<li><?php echo Html::a('Manage Channel Category',['/channel-category']); ?><i class="icon-angle-right"></i></li>
		<li><a href="javascript:void(0);">View Channel Category </a></li>
	</ul>
	<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
</div>

<div class="row-fluid">



        <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>View Channel Category</h3>
                  <a class="btn pull-right" data-toggle="modal" href="<?php echo Yii::$app->urlManager->createUrl('/channel-category');?>"><i class="icon-circle-arrow-left"></i> Back</a>
            </div>
            <div class="box-content nopadding">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pkChannelCategoryID',
            'channelCategoryName',
            'channelUsed',
            'channelAddedDate',
            'channelUpdateDate',
        ],
    ]) ?>
 </div>
    <div class="box-content">
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->pkChannelCategoryID], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->pkChannelCategoryID], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this Channel Category?'),
                    'method' => 'post',
                ],
            ]) ?>
     </div>            

        </div>
    </div>
</div>


