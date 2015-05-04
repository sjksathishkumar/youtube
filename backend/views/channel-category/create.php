<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ChannelCategory */

$this->title = 'Add Channel Category';
$this->params['breadcrumbs'][] = ['label' => 'Channel Categories', 'url' => ['index']];
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
		<li><?php echo Html::a('Manage Channel Category',['/channel-category']); ?><i class="icon-angle-right"></i></li>
		<li><a href="#">Add Channel Category</a></li>
	</ul>
	<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
</div>
<div class="channel-category-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
