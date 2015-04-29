<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ticket */

$this->title = 'Create Staff';
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
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
		<li><?php echo Html::a('Manage Staff',['/staff']); ?><i class="icon-angle-right"></i></li>
		<li><a href="#">Add New Staff</a></li>
	</ul>
	<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
</div>

<div class="helptopic-create">


    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>


