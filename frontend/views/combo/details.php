<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\productColor;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//print_r($modelProductProperty);

?>
 
<div class="container">
     <div class="row">
                <div class="col-lg-12 checkout_slide" id="products">
                   
                    </div>
            </div>
 </div>
       <div class="container"> 
        <div class="row">
        	<div class="page_title col-lg-12"><?php if(isset($modelProduct)) echo $modelProduct->ComboName?></div>
             <div class="cb"></div>
            <div class="subpage_border"></div>
            <div class="col-lg-12 content_wrap">
                 <?php if(isset($modelProduct))
                 {
                
                   ?>
            <div class="col-lg-5">
            	<div class="product_wrap">
                    <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/uploaded_files/combo/<?php echo $modelProduct->ComboImage;?>" alt="" />
                    <ul class="pro_thumbnail_img">
                    	<!--<li><a href="#"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/uploaded_files/combo/thumb/<?php //echo $modelProduct->ComboImage;?>" alt="" width="65px" height="57px"/></a></li>
                        <li><a href="#"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/uploaded_files/combo/thumb/<?php //echo $modelProduct->ComboImage;?>" alt="" width="65px" height="57px"/></a></li>
                        <li><a href="#"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/uploaded_files/combo/thumb/<?php //echo $modelProduct->ComboImage;?>" alt="" width="65px" height="57px"/></a></li>-->
                    </ul>
                </div><!--product_wrap-->
            </div>
            <div class="col-lg-7">
            	<div class="product_details">
                    <h3>Super Value Feature Combo</h3>
                    <div class="pro_price">$<strong><?php echo $modelProduct->ComboPrice?></strong>
                        
               </div>
               
                
                   <div class="accordion_wrap">
                       <!--accordion-->
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                   	Summary
                                    <i></i>
                                    </a>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                    
                                    <?php echo $modelProduct->ComboDetails;?></div>
                                </div>
                            </div>
                        
                        </div>
                <!--accordion end-->
               <!--<a href="#"><button class="btn btn-primary blue_color " type="button">Buy with BlueSky Combo</button></a>-->
               <button class="btn btn-primary green_color add2cart" type="button">Add to cart</button>
                <a href="#"><button class="btn btn-primary skyblue_color" type="button">Compare</button></a>
                        </div>
                        
              
                </div><!--product_wrap-->
            </div>
           
            	
           <?php } else {echo "invalid request";}?>          
            </div>
            
             
</div>

        <!-- Footer -->

    <!-- /.container -->
    <script src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/frontend/web//js/jquery.js"></script>
    <script type="text/javascript">
    

           /* $('#slideup').click(function(){
                $(".checkout_slide").slideUp("fast");

            });*/
           /* $('#itemrow').click(function(){
                alert("hello");
                //$(".checkout_slide").slideUp("fast");

            });*/
            </script>
         
                       
        <!-- Bootstrap Core JavaScript -->
        <script src="common/js/bootstrap.min.js"></script>
         <script src="common/js/chosen.jquery.js" type="text/javascript"></script>
   <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
  
        <script>
        $(document).ready( function() {
            
			 $('.collapse').on('shown.bs.collapse', function(){ 
	 $('.panel-heading').removeClass('panel_active');
$(this).parent().find(".fa-plus-circle").removeClass("fa-plus-circle").addClass("fa-minus-circle");
$(this).parent().find('.panel-heading').addClass('panel_active');
}).on('hidden.bs.collapse', function(){
	$('.panel-heading').removeClass('panel_active');
$(this).parent().find(".fa-minus-circle").removeClass("fa-minus-circle").addClass("fa-plus-circle");
//$(this).parent().find('.panel-heading').addClass('panel_active');
});

		});
	</script>