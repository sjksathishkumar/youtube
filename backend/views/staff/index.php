<?php

use yii\helpers\Html;
use yii\grid\GridView;
//print_r($dataProvider);
/* @var $this yii\web\View */
/* @var $searchModel app\models\searchdepartment */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ' Support Staff';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pull-right margin_top20">
                           <?= Html::a('Add Support Staff', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>

<div class="department-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="search-form">
<?php echo $this->render('_search', ['model' => $searchModel]); ?>
</div
   
   <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php \yii\widgets\Pjax::begin(); ?>   
    <div class="row-fluid">
        <div class="breadcrumbs" id="breadcrumbs-msg">
	<?php  if( (Yii::$app->session->hasFlash('create')) || (Yii::$app->session->hasFlash('update')) || (Yii::$app->session->hasFlash('deletedept'))){ ?>
		<ul>
		  <?php
			if(Yii::$app->session->getFlash('create'))
			{
			    echo '<li><span class="readcrum_without_link_success">'.ADD_STAFF_SUCCESS.'</li>';
			}else if(Yii::$app->session->getFlash('update'))
			{
			    echo '<li><span class="readcrum_without_link_success">'.EDIT_STAFF_SUCCESS.'</li>';
			}else if(Yii::$app->session->getFlash('deletedept'))
			{
			    echo '<li><span class="readcrum_without_link_success">'.DELETE_STAFF_SUCCESS.'</li>';
			}
		  ?>						
	      </ul>
	<?php } ?>
</div>

    
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>Support Staff</h3>
                    <!--<a class="btn pull-right" data-toggle="modal" href="#" id = "viewAll">View All</a>-->
            </div>
            <div class="clear"></div>

            <div class="box-content nopadding">
                <form action="" name='department-grid-list-form' id='department-grid-list-form'>
                
                 
                   <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
                       'id' => 'staff-grid',
        'columns' => [
            [
                'name' => 'id',
                'class' => 'yii\grid\CheckboxColumn'
                
                
            ],
            ['class' => 'yii\grid\SerialColumn'],
            
          
           
            [
                   
                    'attribute' => 'staffFirstName',
                     'format' => 'raw',
                'value' => function ($data) {
                return $data->staffFirstName.' '. $data->staffLastName; // $data['name'] for array data, e.g. using SqlDataProvider.
                 },
                
               ],
            
            
       /* [                  
               'attribute' => 'fkdept_id',
                'format' => 'raw',
                'value' => function ($data) {
                return app\models\department::showDepartmentName($data->fkdept_id); // $data['name'] for array data, e.g. using SqlDataProvider.
                 },
                
               ],*/
 [
                   
                    'attribute' => 'fkdept_id',
                     'format' => 'raw',
                'value' => function ($dataProvider) {
                return $dataProvider->department->dept_name ; // $data['name'] for array data, e.g. using SqlDataProvider.
                 },
                
               ],
             
                         [
                   
                    'attribute' => 'staffPhoneNumber',
                     'format' => 'raw',
                'value' => function ($data) {
                return $data->staffPhoneNumber; // $data['name'] for array data, e.g. using SqlDataProvider.
                 },
                
               ],
                                
            [
                   
                    'attribute' => 'staffExt',
                     'format' => 'raw',
                'value' => function ($data) {
                return $data->staffExt; // $data['name'] for array data, e.g. using SqlDataProvider.
                 },
                
               ],
                         
                         [
                   
                    'attribute' => 'staffMobile',
                     'format' => 'raw',
                'value' => function ($data) {
                return $data->staffMobile; // $data['name'] for array data, e.g. using SqlDataProvider.
                 },
                
               ],
                     
          
           
            // 'updateDate',

            [
                'header' => 'Action',
                'class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
              
                                        <div >
						<select id="userStatus" name="userStatus"  style="width:75px;" onchange="deptMultipleAction();">
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
    
     function deptMultipleAction()
    {
        var checked_num = $('input[name="id[]"]:checked').length;
       // alert(checked_num);
        
        if (!checked_num) {
            alert('Please select atleast one.');
            $.pjax.reload({container:'#department-grid'});
        }
        else
        {
	       if ($('#userStatus').val()=='Select') {
				alert('Please Select valid option');
			}
		       else
		       {
                        
                            var data=$("#department-grid-list-form").serialize();
                            $.ajax({
			        type: 'POST',
			        url: 'department/multipledelete',
			        data:data,
			        success:function(data){
			        	         if(data)
			                        { 
			                        	var statusMsg = "";
			                        	
			                        		statusMsg = 'Department deleted successfully.';	
			                        	
                                                       
			                        	
			                            $('#breadcrumbs-msg').css('display','block');
			                            $('#breadcrumbs-msg').html("<ul><li><span class='readcrum_without_link_success'>"+statusMsg+"</span></li></ul>");
			                            $('#breadcrumbs-msg').fadeOut(5000);
                                                     $.pjax.reload({container:'#department-grid'});
			                            statusMsg = '';
			                        }
			          },error: function(data) { // if error occured
			              alert("Error occured.Please try again.");
			             $.pjax.reload({container:'#department-grid'});
			         },
			        dataType:'html'
			        });
			        
		        }
		    }
		
       
       $("#memberStatus").select2('val', 'Select');
    }
    
    $('.search-button').on('click', function(e){
    
      $('.search-form').toggle();
        //$('#Auth_status_chosen').css('width', '150px');
	return false;
    //  e.preventDefault();
     //$.fn.yiiGridView.update('manufacturers-grid');
   });
   $('.search-form form').submit(function(){
       alert($(this).serialize());
	$('#department-grid').yiiGridView('update', {
		data: $(this).serialize(),
                complete: function(jqXHR, status) {if (status=='success'){changeToCustomDropdown();}}
	});
	return false;
});
   
    </script>
    


