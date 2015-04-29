<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\user */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-header">
	<div class="pull-left">
		 <h1> <?= Html::encode($this->title) ?></h1>
	</div>
</div>
<div class="breadcrumbs">
	<ul>
		<li><?php echo Html::a('Home',['/site/index']); ?><i class="icon-angle-right"></i></li>
		<li><?php echo Html::a('Manage Users',['/user']); ?><i class="icon-angle-right"></i></li>
		<li><a href="#">Add User</a></li>
	</ul>
	<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
</div>
 <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
