<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\user */

$this->title = 'Update User ';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="page-header">
	<div class="pull-left">
		 <h1> <?= Html::encode($this->title) ?></h1>
	</div>
</div>
<div class="breadcrumbs">
	<ul>
		<li><?php echo Html::a('Home',['/site/index']); ?><i class="icon-angle-right"></i></li>
		<li><?php echo Html::a('CMS Summary',['/user']); ?><i class="icon-angle-right"></i></li>
		<li><a href="#">Update User</a></li>
	</ul>
	<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
</div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

