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
        	<div class="page_title col-lg-12"><?php if(isset($modelProduct)) echo $modelProduct->product_name?></div>
             <div class="cb"></div>
            <div class="subpage_border"></div>
            <div class="col-lg-12 content_wrap">
                 <?php if(isset($modelProduct))
                 {
                
                   ?>
            <div class="col-lg-5">
            	<div class="product_wrap">
                    <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/uploaded_files/product/<?php echo $modelProduct->image;?>" alt="" />
                    <ul class="pro_thumbnail_img">
                    	<li><a href="#"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/uploaded_files/product/thumb/<?php echo $modelProduct->image;?>" alt="" width="65px" height="57px"/></a></li>
                        <li><a href="#"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/uploaded_files/product/thumb/<?php echo $modelProduct->image;?>" alt="" width="65px" height="57px"/></a></li>
                        <li><a href="#"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/uploaded_files/product/thumb/<?php echo $modelProduct->image;?>" alt="" width="65px" height="57px"/></a></li>
                    </ul>
                </div><!--product_wrap-->
            </div>
            <div class="col-lg-7">
            	<div id="pro_infos" class="product_details">
                    <h3>Super Value Feature Phone</h3>
                     <?php if($modelProduct->discount_price>0)
                    {?>
                    <div class="pro_price"><span class="pro_price_discount">
                            <strong class="strike">$<?php echo $modelProduct->price?></strong></span> $<strong><?php echo $modelProduct->discount_price?>
                            </strong>
                    <?php } else {?>
                    <div class="pro_price">
                    $<strong><?php echo $modelProduct->price?>
                            </strong>
                    <?php }?>
                    <!--<div class="pro_price">$<strong><?php //echo $modelProduct->price?></strong>-->
                        <?php if($modelProduct->stock>0) { ?><span>In Stock<i></i></span> <?php }
                        ?></div>
                     
                        <?php  $color=array(); foreach($modelProductProperty as $property)
                  {
                            if($property->label=='color')
                            {
                            
                          $color[$property->optionlabel]=$property->optionlabel;
                            }
                  }?>
                
<?php $form = ActiveForm::begin(['id' => 'productdetail-form']); ?>
                    
    <?= $form->field($modelProduct, 'id')->hiddenInput()->label(false);?>
                    <div class="input_fld_slide">
               <div class="input_box_full"> <?= $form->field($modelProduct, 'quantity',['errorOptions'=>['tag'=>'p']])->textInput(['maxlength' => 100,'class'=>'txt','placeholder'=>'Quantity'])->label(false); ?>
               
               </div>
               <p id="QTYErrorMsg" class="log-block-error"></p>
                    </div>
               <?php if(count($color)>1)
               {?>

          <div class="right_sec_frm fr"><label>Color</label> 
              <?php echo $form->field($modelProduct, 'color')->dropDownList( $color,['class'=>'chosen-select'])->label(false);?>
          </div>
                  <div class="cb"></div>
                  <?php }?>
               
               
                
                    <?php //echo $this->render('productdetail-form', ['model' => $modelProduct,'numRow'=>$numRows,'modelProductProperty'=> $modelProductProperty]); ?>
                        <!--<div class="input_box fl valid_star_non"><input type="text" class="txt" placeholder="Quantity"></div>-->
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
                                    
                                    <?php echo $modelProduct->more_details;?></div>
                                </div>
                            </div>
                        
                        </div>
                <!--accordion end-->
                <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/combo"><button class="btn btn-primary blue_color " type="button">View Bluesky Plans</button></a>
               <button class="btn btn-primary green_color add2cart" type="button">Add to cart</button>
                <a href="#"><button class="btn btn-primary skyblue_color" type="button">Compare</button></a>
                        </div>
                        <?php ActiveForm::end(); ?>
              
                </div><!--product_wrap-->
            </div>
           
            	
           <?php } else {echo "invalid request";}?>          
            </div>
            
              <?php /* if(count(model2)>1) {
                  foreach(model2 as $property)
                  {
                      //print_r($property);
                      echo $property->label;
                      echo $property->optionvalue;
                  }
                  
              }*/?>
             <?php $varHasFeature=0;
                  $varHasConnectivity=0;
                  $varHasContent=0;
                  $varHasSize=0;
               if(count($modelProductProperty)>1)
                 {
                  ?>
            <div class="page_title col-lg-12">Specifications</div>
             <div class="cb"></div>
            <div class="subpage_border"></div>
                  
              <?php   foreach($modelProductProperty as $property)
                  {
                     if($property->comment!='')
                      { 
                         
 switch ($property->comment) {
    case 'feature':
        $varHasFeature++;
        break;
    case 'connectivity':
         $varHasConnectivity++;
        break;
    case 'content':
         $varHasContent++;
        break;
    case 'size':
        $varHasSize++;
        break;
                     }
                 }
                  }
                 }
                     
             if($varHasFeature>0)
             {?>
                 <div class="col-lg-3 content_wrap">
                              <h3><b>Feature</b></h3>
                
            <?php }
            foreach($modelProductProperty as $property)
                  {
                      
                      
                      if($property->comment!='')
                      {
                          if($property->comment=='feature')
                          {
                              
                              if($property->content!='')
                                {
                                    echo $property->label.':&nbsp;&nbsp;&nbsp';
                                    //echo $property->optionvalue;
                                    echo $property->content;
                                    echo "</br>";
                                }
                          
                                else
                                {
                                       
                                        if($property->optionvalue)
                                        {
                                           echo $property->label.":&nbsp;&nbsp;&nbsp"; echo "YES";
                                           echo "</br>";
                                        }
                                else
                                        {
                                            echo $property->label.":&nbsp;&nbsp;&nbsp"; echo "NO";
                                                echo "</br>"; 
                                        }
                                }
                          
                      }
                      
                     
                      }
                      else
                      {
                          //echo $property->label;
                          //echo $property->optionlabel;
                          
                      }
                     
                  }
            ?>
                              <?php if($varHasFeature>0)
             {?>
                              </div >
                
            <?php }
                              
                              if($varHasConnectivity>0)
             {?>
                 <div class="col-lg-3 content_wrap">
                              <h3><b>Connectivity</b></h3>
                
            <?php }?>
                              <?php if(count($modelProductProperty)>1)
                 {?>
                    
                  <?php foreach($modelProductProperty as $property)
                  {
                      
                     
                      if($property->comment!='')
                      {
                          
                     if($property->comment=='connectivity')
                          {
                            
                                if($property->content!='')
                                {
                                    echo $property->label.':&nbsp;&nbsp;&nbsp';
                                    //echo $property->optionvalue;
                                    echo $property->content;
                                    echo "</br>";
                                }
                          
                                else
                                {
                                       
                                        if($property->optionvalue)
                                        {
                                           echo $property->label.":&nbsp;&nbsp;&nbsp"; echo "YES";
                                           echo "</br>";
                                        }
                                else
                                        {
                                            echo $property->label.":"; echo "NO";
                                                echo "</br>"; 
                                        }
                                }
                          
                      }
                      }
                  }
                 }?>
                      <?php if($varHasConnectivity>0)
             {?>
                              </div >
                
            <?php }
            if($varHasContent>0)
             {?>
                 <div class="col-lg-3 content_wrap">
                              <h3><b>Content</b></h3>
                
            <?php }
                    if(count($modelProductProperty)>1)
                 {?>
                  
                
                <?php   foreach($modelProductProperty as $property)
                  {
                      
                      
                      if($property->comment!='')
                      {
                          if($property->comment=='content')
                          {
                                 if($property->content!='')
                                {
                                    echo $property->label.':&nbsp;&nbsp;&nbsp';
                                    //echo $property->optionvalue;
                                    echo $property->content;
                                    echo "</br>";
                                }
                          
                                else
                                {
                                       
                                        if($property->optionvalue)
                                        {
                                           echo $property->label.":&nbsp;&nbsp;&nbsp"; echo "YES";
                                           echo "</br>";
                                        }
                                else
                                        {
                                            echo $property->label.":&nbsp;&nbsp;&nbsp"; echo "NO";
                                                echo "</br>"; 
                                        }
                                }
                          
                      }
                     
                      }
                     }
                 }
                    
                 if($varHasContent>0)
             {?>
                              </div>
                
            <?php }   if($varHasSize>0)
             {?>
                 <div class="col-lg-3 content_wrap">
                              <h3><b>Size</b></h3>
                
            <?php } if(count($modelProductProperty)>1)
                 {?>
                    
                  <?php foreach($modelProductProperty as $property)
                  {
                      
                      
                      if($property->comment!='')
                      {
                          
                     if($property->comment=='size')
                          {
                                if($property->content!='')
                                {
                                    echo $property->label.':&nbsp;&nbsp;&nbsp';
                                    //echo $property->optionvalue;
                                    echo $property->content;
                                    echo "</br>";
                                }
                          
                                else
                                {
                                       
                                        if($property->optionvalue)
                                        {
                                           echo $property->label.":&nbsp;&nbsp;&nbsp"; echo "YES";
                                           echo "</br>";
                                        }
                                else
                                        {
                                            echo $property->label.":"; echo "NO";
                                                echo "</br>"; 
                                        }
                                }
                          
                      }
                      }
                     
                  }
                 }
                   if($varHasSize>0)
             {?>
                              </div >
                
            <?php } ?>
             <div class="cb"></div>
        </div>
        <!-- /.row -->

</div>

        <!-- Footer -->

    <!-- /.container -->
    <script src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/frontend/web//js/jquery.js"></script>
    <script type="text/javascript">
    /*$('.add2cart').click(function(){
               
               // $(".checkout_slide").slideDown("fast"); 
                addtocart();

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
