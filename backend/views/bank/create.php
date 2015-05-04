<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = 'Add New Bank';
$this->params['breadcrumbs'][] = ['label' => 'Banks', 'url' => ['index']];
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
		<li><?php echo Html::a('Manage Banks',['/bank']); ?><i class="icon-angle-right"></i></li>
		<li><a href="#">Add New Bank</a></li>
	</ul>
	<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
</div>
<div class="bank-create">

        <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
