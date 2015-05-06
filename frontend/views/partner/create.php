<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\partner */

$this->title = 'Sign Up with Uturn';
$this->params['breadcrumbs'][] = ['label' => 'Partners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('signup', [
        'model' => $model,
    ]) ?>

</div>
