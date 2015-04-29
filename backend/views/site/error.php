<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>

<div class="wrapper" style="width:650px">
<div id="log_wrap1" class="login-body">
     <div class="control-group">
    <h2><font color="red">Error: </font></h2>
    
      <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
          <?php //echo Html::a('Forgot Password link.',['site/recovery']);?>
    </div>
     </div>
    </div>
</div>


