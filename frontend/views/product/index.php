<?php
/* @var $this yii\web\View */
?>
<?php 
//print_r($modelProduct);?>
<script>
    function productDetails()
        {
            var base_url = window.location.origin;
           // alert(window.location.origin);
            window.location.replace(base_url+"/uturn/product-details");
        }
    </script>
    <!--<div class="header">
        <div class="menu">
     <div class="container">
           
            <div class="row">
                <div class="col-lg-12">
                <div class="col-lg-3"><h3 class="text-muted pull-left logo_bottom"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/logo_bottom.png" alt="" /></h3></div>
                <div class="col-lg-9">
                       <ul class="menuhere pull-left">
                            <?php /*if(isset($modelCategory))
                                {
                                  $i=0;
                                        foreach ($modelCategory as $category)
                                            {
                                            $i++;
                                               
                                            if($i==1)
                                            {
                                                ?>
                            <li ><a id="<?php echo $category->category_name;?>" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/product/<?php echo $category->id;?>"><?php echo ucfirst($category->category_name);?></a></li>
                          
                           <?php  }
                            else {?>
                                <li ><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/product/<?php echo $category->id;?>"><?php echo ucfirst($category->category_name);?></a></li>
                          
                            <!--  <li role="presentation"><a href="#">Combos</a></li>-->
                                            <?php }
                                            
                            }
                                        }*/?>
                        </ul>
                    </nav>
                    </div>
            </div>
        </div>
        </div>
    </div>
    </div>-->
<!-- Page Content -->
    <div class="container">
        <div class="row">
                <div class="page_title col-lg-12">New BlueSky <?php if(isset($categoryName)) { echo $categoryName;} else {echo "Product";}?></div>
            <div class="cb"></div>
            <div class="subpage_border"></div>
            <div class="col-lg-12 content_wrap">
                <?php if(isset($modelProduct))
          {
             
                foreach ($modelProduct as $product)
                 {
                     $productName=preg_replace('/\s+/', '-', trim($product->product_name));
                     
                   ?>
                <div class="col-lg-3">
            	<div class="product_wrap">
                    <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/product/<?php echo $product->category->category_name.'/'.$productName.'/'.$product->id?>"> <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/uploaded_files/product/160X260/<?php echo $product->image;?>" alt="" width="160px" height=260px" /></a>
                    <h3><?php echo $product->product_name?></h3>
                    <p><?php echo substr($product->details, 0, 50) ;?></p>
                    <span class="<?php echo $product->id;?>"></span>
                    <?php if($product->discount_price>0)
                    {?>
                    <div class="pro_price"><span class="pro_price_discount">
                            <strong class="strike">$<?php echo $product->price?></strong></span> $<strong><?php echo $product->discount_price?>
                            </strong></div>
                    <?php } else {?>
                    <div class="pro_price">
                    $<strong><?php echo $product->price?>
                            </strong></div>
                    <?php }?>
                    
                    
                    <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/product/<?php echo $product->category->category_name.'/'.$productName.'/'.$product->id?>"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/cart.png" alt="" title="add to cart"/></a>
                    <a href="#"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/arrows.png" alt="" title="compare"/></a>
                    <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/product/<?php echo $product->category->category_name.'/'.$productName.'/'.$product->id?>"><button type="button" class="pro_more_btn" >Find Out More</button></a>
                </div>
                </div><!--product_wrap-->
                    
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