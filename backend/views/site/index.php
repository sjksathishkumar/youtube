<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

$this->title = 'Dashboard';

?>
<div class="page-header">
    <div class="pull-left">
        <h1>Dashboard</h1>
    </div>
</div>
<div class="breadcrumbs">
    <ul>
            <li><?php echo Html::a('Home',['/dashboard']); ?></li>
    </ul>
    <div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="box box box-color box-bordered">
            <div class="box-title">
                <h3><i class="icon-table"></i>Last Login Details</h3>
            </div>
            <div class="box-content nopadding">
                <table class="table table-hover table-nomargin table-bordered">
                    <thead>
                        <tr>                            
                            <th>Login</th>
                            <th>Logout</th>
                            <th class='hidden-350'>IP</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>