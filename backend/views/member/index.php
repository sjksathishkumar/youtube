<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Member';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="cms-index">
    <?php \yii\widgets\Pjax::begin(); ?>   
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row-fluid">
        <div class="span12 margin_top20">
            <?= Html::a('Create Member', ['create'], ['class' => 'btn btn-success']) ?>


        </div> 
    </div>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row-fluid">
        <div class="breadcrumbs" id="breadcrumbs-msg">
            <?php if ((Yii::$app->session->hasFlash('addCmsSuccess')) || (Yii::$app->session->hasFlash('editCmsSuccess')) || (Yii::$app->session->hasFlash('deleteCmsSuccess'))) { ?>
                <ul>
                    <?php
                    if (Yii::$app->session->getFlash('addCmsSuccess')) {
                        echo '<li><span class="readcrum_without_link_success">' . ADD_CMS_SUCCESS . '</li>';
                    } else if (Yii::$app->session->getFlash('editCmsSuccess')) {
                        echo '<li><span class="readcrum_without_link_success">' . EDIT_CMS_SUCCESS . '</li>';
                    } else if (Yii::$app->session->getFlash('deleteCmsSuccess')) {
                        echo '<li><span class="readcrum_without_link_success">' . DELETE_CMS_SUCCESS . '</li>';
                    }
                    ?>						
                </ul>
            <?php } ?>
        </div>


        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>All Member</h3>
                <!--<a class="btn pull-right" data-toggle="modal" href="#" id = "viewAll">View All</a>-->
            </div>
            <div class="clear"></div>

            <div class="box-content nopadding">
                <form action="" name='member-grid-list-form' id='member-grid-list-form'>


                    <?=
                    GridView::widget([
                        'id' => 'member-grid',
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'name' => 'id',
                                'class' => 'yii\grid\CheckboxColumn'
                            ],
                            'user_title',
                            'username',
                            'email',
                            'role',
                            'status',
                            // 'created_at',
                            // 'updated_at',
                            [
                                'header' => 'Action',
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{view} {update} {delete}',
                            ],
                        ],
                    ]);
                    ?>


                    <div style="padding-left:1%">
                        <select id="cmsStatus" name="memberStatus" class="select2-me" onchange="cmsMultipleAction();">
                            <option value="Select">Select</option>

                            <option value="2">Delete</option>
                        </select>
                    </div>
                </form>

            </div>
        </div>

        <?php \yii\widgets\Pjax::end(); ?>
    </div>

    <script>

                            function cmsMultipleAction()
                            {
                                var checked_num = $('input[name="id[]"]:checked').length;
                                // alert(checked_num);

                                if (!checked_num) {
                                    alert('Please select atleast one.');
                                    $.pjax.reload({container: '#member-grid'});
                                }
                                else
                                {
                                    if ($('#cmsStatus').val() == 'Select') {
                                        alert('Please Select valid option');
                                    }
                                    else
                                    {

                                        var data = $("#member-grid-list-form").serialize();
                                        $.ajax({
                                            type: 'POST',
                                            url: 'cms/multipledelete',
                                            data: data,
                                            success: function(data) {
                                                if (data)
                                                {
                                                    var statusMsg = "";

                                                    statusMsg = 'CMS pages ' + data + 'd' + ' successfully.';



                                                    $('#breadcrumbs-msg').css('display', 'block');
                                                    $('#breadcrumbs-msg').html("<ul><li><span class='readcrum_without_link_success'>" + statusMsg + "</span></li></ul>");
                                                    $('#breadcrumbs-msg').fadeOut(5000);
                                                    $.pjax.reload({container: '#cms-grid'});
                                                    statusMsg = '';
                                                }
                                            }, error: function(data) { // if error occured
                                                alert("Error occured.Please try again.");
                                                $.pjax.reload({container: '#cms-grid'});
                                            },
                                            dataType: 'html'
                                        });

                                    }
                                }


                                $("#memberStatus").select2('val', 'Select');
                            }

                            $('.search-button').on('click', function(e) {

                                $('.search-form').toggle();
                                //$('#Auth_status_chosen').css('width', '150px');
                                return false;
                                //  e.preventDefault();
                                //$.fn.yiiGridView.update('manufacturers-grid');
                            });
                            $('.search-form form').submit(function() {
                                alert($(this).serialize());
                                $('#cms-grid').yiiGridView('update', {
                                    data: $(this).serialize(),
                                    complete: function(jqXHR, status) {
                                        if (status == 'success') {
                                            changeToCustomDropdown();
                                        }
                                    }
                                });
                                return false;
                            });

    </script>

