<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Channel */

$this->title = 'Create Channel';
$this->params['breadcrumbs'][] = ['label' => 'Channels', 'url' => ['index']];
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
		<li><?php echo Html::a('Manage Channel',['/channel']); ?><i class="icon-angle-right"></i></li>
		<li><a href="#">Create Channel</a></li>
	</ul>
	<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
</div>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

