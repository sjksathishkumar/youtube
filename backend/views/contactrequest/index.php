<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\searchfaq */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contact Request';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pull-right margin_top20">
                           
                        </div>

<div class="faq-index">
    <?php \yii\widgets\Pjax::begin(); ?> 
    <h1><?= Html::encode($this->title) ?></h1>
 
     

    
 <div class="row-fluid">
      <div class="breadcrumbs" id="breadcrumbs-msg">
	<?php  if(Yii::$app->session->hasFlash('deleterequest')){ ?>
		<ul>
		  <?php
			
                        if(Yii::$app->session->getFlash('deleterequest'))
			{
			    echo '<li><span class="readcrum_without_link_success">'.DELETE_CONTACTREQUEST_SUCCESS.'</li>';
			}
		  ?>						
	      </ul>
	<?php } ?>
</div>   
       
  <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>All Contact Request</h3>
                    <!--<a class="btn pull-right" data-toggle="modal" href="#" id = "viewAll">View All</a>-->
            </div>
            <div class="clear"></div>

            <div class="box-content nopadding">
            <form action="" name='faq-grid-list-form' id='faq-grid-list-form'>
                     

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'id'=>'faq-grid',
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
             [
                'name' => 'id',
                'class' => 'yii\grid\CheckboxColumn',
               
               
                
                ],
           // 'question:ntext',
            [
                 'attribute' => 'contactName',
                'value' => function ($data) {
                return $data->contactName; // $data['name'] for array data, e.g. using SqlDataProvider.
                 },
                 'contentOptions'=>['class'=>'col_width1']
               ],
              [
                 'attribute' => 'contactEmail',
                'value' => function ($data) {
                return $data->contactEmail; // $data['name'] for array data, e.g. using SqlDataProvider.
                 },
                 'contentOptions'=>['class'=>'col_width1']
               ],
                [
                 'attribute' => 'contactSubject',
                'value' => function ($data) {
                return $data->contactSubject; // $data['name'] for array data, e.g. using SqlDataProvider.
                 },
                 'contentOptions'=>['class'=>'col_width1']
               ],  
                         
                          [
                 'attribute' => 'contactBody',
                'value' => function ($data) {
                return $data->contactBody; // $data['name'] for array data, e.g. using SqlDataProvider.
                 },
                 'contentOptions'=>['class'=>'col_width3']
               ],  
          //  'answer:ntext',
            
            /* [
                 'attribute' => 'status',
                'value' => function ($data) {
                return $data->status=='0'?'Inactive':'Active'; // $data['name'] for array data, e.g. using SqlDataProvider.
                 },
                'contentOptions'=>['class'=>'col_width01']
               ],*/
            [
                'attribute' => 'addDate',
                   'format' => 'raw',
                'value' => function ($data) {
                return  date("d M, Y h:i",  strtotime($data->contactCreatedDate)); // $data['name'] for array data, e.g. using SqlDataProvider.
                 },
                'contentOptions'=>['class'=>'col_width1']
               ],
           
            // 'updateDate',

            [ 'header' => 'Action','class' => 'yii\grid\ActionColumn','template'=>' {delete}'],
        ],
    ]); ?>

                                             
                </form>
               
            </div>
        </div>
       
      <?php \yii\widgets\Pjax::end(); ?>
</div>
    
    <script>
    
     function faqMultipleAction()
    {
        
    
        var checked_num = $('input[name="id[]"]:checked').length;
       // alert(checked_num);
        
        if (!checked_num) {
            alert('Please select atleast one.');
            $.pjax.reload({container:'#faq-grid'});
        }
        else
        {
	      
               if(confirm('Are you sure you want to delete this item?')) { 
               
            if ($('#faqStatus').val()=='Select') {
				alert('Please Select valid option');
			}
		       else
		       {
                        
                            var data=$("#faq-grid-list-form").serialize();
                             // alert(data);
			        $.ajax({
			        type: 'POST',
			        url: '<?php echo Yii::$app->getUrlManager()->createUrl("faq/multipledelete");?>',
			        data:data,
			        success:function(data){
                                   
			        	         if(data)
			                        { 
			                        	var statusMsg = "";
			                        	
			                        		statusMsg = 'Faq pages '+ data+'d'+' successfully.';	
			                        	
                                                       
			                        	
			                            $('#breadcrumbs-msg').css('display','block');
			                            $('#breadcrumbs-msg').html("<ul><li><span class='readcrum_without_link_success'>"+statusMsg+"</span></li></ul>");
			                            $('#breadcrumbs-msg').fadeOut(5000);
                                                     $.pjax.reload({container:'#faq-grid'});
			                            statusMsg = '';
			                        }
			          },error: function(data) { // if error occured
			              alert("Error occured.Please try again.");
			             $.pjax.reload({container:'#faq-grid'});
			         },
			        dataType:'html'
			        });
			        
		        }
                        }else {
                        $.pjax.reload({container:'#faq-grid'});
                        }
		    }
		
       
       
    }
  
   
    /**
     *  Reset in Advanced Search 
     * @returns {undefined} 
     */
    $('#resetVal').on('click', function(e){
      
        $('#searchfaq-question').val('');
             return false;
      //$.pjax.reload({container:'#faq-grid'});
        
        
    });
    </script>
    