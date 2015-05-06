<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Partners */

$this->title = 'Approve New Partners';
$this->params['breadcrumbs'][] = ['label' => 'New Partners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pkPartnerID, 'url' => ['view', 'id' => $model->pkPartnerID]];
$this->params['breadcrumbs'][] = 'Approve';
?>

<div class="page-header">
	<div class="pull-left">
		 <h1> <?= Html::encode($this->title) ?></h1>
	</div>
</div>
<div class="breadcrumbs">
	<ul>
		<li><?php echo Html::a('Home',['/site/index']); ?><i class="icon-angle-right"></i></li>
		<li><?php echo Html::a('Manage New Partners',['/new-partners']); ?><i class="icon-angle-right"></i></li>
		<li><a href="#">Approve New Partners</a></li>
	</ul>
	<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
</div>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


