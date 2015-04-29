<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\EmailTemplates */

$this->title = 'View Template';
$this->params['breadcrumbs'][] = ['label' => 'Email Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-header">
    <div class="pull-left">
      <h1>View Template</h1>
    </div>          
</div>

<div class="breadcrumbs">
    <ul>
        <li><?php echo Html::a('Home',['/site/index']); ?><i class="icon-angle-right"></i></li>
        <li><?php echo Html::a('Manage Template',['/email-templates']); ?><i class="icon-angle-right"></i></li>
        <li><a href="javascript:void(0);">View Template </a></li>
    </ul>
    <div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>View User</h3>
                  <a class="btn pull-right" data-toggle="modal" href="<?php echo Yii::$app->urlManager->createUrl('/email-templates');?>"><i class="icon-circle-arrow-left"></i> Back</a>
            </div>
            <div class="box-content nopadding">

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                       
                        'pkEmailID',
                        'emailTitle',
                        'emailFromName',
                        'emailFromEmail',
                        'emailSubject',
                        'emailContent:html',
                        [
                            'label' => 'Type',
                             'value' => $model->emailTemplateType=='G'?'General':'Contract',
                        ],
                        'emailDateAdded',
                        'emailDateUpdated',
                        /*[
                            'label' => 'updated_at',
                             'value' => $model->updated_at!='0000-00-00 00:00:00'?date("d M, Y h:i",  strtotime($model->updated_at)):date("d M, Y h:i",  strtotime($model->created_at)),
                        ],*/
                    
                    ],
                ]) ?>
            </div>
            <div class="box-content">
                <?= Html::a('Update', ['update', 'id' => $model->pkEmailID], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->pkEmailID], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>

