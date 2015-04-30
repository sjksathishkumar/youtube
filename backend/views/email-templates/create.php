<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EmailTemplates */

$this->title = 'Create Email Templates';
$this->params['breadcrumbs'][] = ['label' => 'Email Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pkEmailID, 'url' => ['view', 'id' => $model->pkEmailID]];
$this->params['breadcrumbs'][] = 'Create';
?>

<div class="page-header">
	<div class="pull-left">
		 <h1> <?= Html::encode($this->title) ?></h1>
	</div>
</div>
<div class="breadcrumbs">
	<ul>
		<li><?php echo Html::a('Home',['/site/index']); ?><i class="icon-angle-right"></i></li>
		<li><?php echo Html::a('Manage Templates',['/email-templates']); ?><i class="icon-angle-right"></i></li>
		<li><a href="#">Create Template</a></li>
	</ul>
	<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
</div>

<?= $this->render('_form', [
        'model' => $model,
    ]) ?>

