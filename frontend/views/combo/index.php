<?php
/* @var $this yii\web\View */
?>
<?php 
//print_r($modelProduct);
//exit();?>

<script>
    function productDetails()
        {
            var base_url = window.location.origin;
           // alert(window.location.origin);
            window.location.replace(base_url+"/uturn/product-details");
        }
    </script>
  <!-- <div class="header">-->
        <!--menu-->
	<!--<div class="menu">
    <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <div class="col-lg-3"><h3 class="text-muted pull-left logo_bottom"><img src="<?php //echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/logo_bottom.png" alt="" /></h3></div>
                <div class="col-lg-9">
                        <ul class="menuhere pull-left">
                            <li><a href="<?php //echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/combo/weekly-combo">Weekly Combos</a></li>
                            <li><a href="<?php //echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/combo/monthly-combo">Monthly Combos</a></li>
                            </ul>
                        </div>
                </div>
            </div>
        </div>
        </div>
        </div>-->
<!-- Page Content -->
    <div class="container">
        <div class="row">
                <div class="page_title col-lg-12">New BlueSky <?php if(isset($categoryName)) {echo $categoryName;}else{ echo "Combos";}?></div>
            <div class="cb"></div>
            <div class="subpage_border"></div>
            <div class="col-lg-12 content_wrap">
                <?php if(isset($modelProduct))
          {
             
                foreach ($modelProduct as $product)
                 {
                   ?>
                <div class="col-lg-6">
            	<div class="combo_wrap">
                    <div class="col-lg-7">
                    <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/combo-details/<?php echo $product->pkComboID?>"> <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/uploaded_files/combo/<?php echo $product->ComboImage;?>" alt="" width="460px" height=260px" /></a>
                    </div>
                    <div class="pro_info_wrap col-lg-5">
                    <h3><?php echo $product->ComboName;?></h3>
                    <p><?php echo substr($product->ComboDetails, 0, 50) ;?></p>
                    <span class="<?php echo $product->pkComboID;?>"></span>
                    <div class="pro_price">$<strong><?php echo $product->ComboPrice?></strong></div>
                    <div style="display:none;"><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/combo-details/<?php echo $product->pkComboID?>"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/cart.png" alt="" /></a>
                    <a href="#"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/arrows.png" alt="" /></a></div>
                    <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/combo-details/<?php echo $product->pkComboID?>"><button type="button" class="pro_more_btn" >Find Out More</button></a>
                    </div>
                    <div class="cb"></div>
                </div>
                </div><!--combo_wrap-->
                    
                 <?php   }
          }?>
            
            	
			
            </div>
           
        </div>
        <!-- /.row -->



        <!-- Footer -->

    </div>
    <!-- /.container -->
    <script>
      $( document ).ready(function() {
  $//('$')
});
        </script>
