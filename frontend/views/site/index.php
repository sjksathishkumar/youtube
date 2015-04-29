<?php

	//echo $user_id = Yii::$app->session->get('userId');

?>
<!-- Note: The background image is set within the uturn-casual -->
  <header class="uturn-header">
    	<div class="tab_bg"></div>
        <div class="container">
           <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
      
          <?php if(isset($modelBanner))
          {
              $imgcont = 1;
                foreach ($modelBanner as $bannerImage)
                 {
                    if($imgcont == '1')
                    {
                        $active = "active";
                        
                    }else {
                         $active = "";
                    }?>
                     <div class="item <?php echo $active;?>">
          <div class="tab_info_img"><img class="img-responsive" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/uploaded_files/banner/<?php echo $bannerImage['banner'];?>" alt="" /></div>
           <div class="carousel-caption">
            <!-- tab content will be here start-->
            <div class="tab_info_txt">
                <?php //echo $bannerImage['content'];?>
                
            </div>
            <!-- tab content will be here cloased-->
          </div>
        </div>
              
              
               <?php $imgcont++; }
          }
              ?>
     
        
       
                
      </div><!-- End Carousel Inner -->


    	<!--<ul class="nav nav-pills nav-justified">
          <li data-target="#myCarousel" data-slide-to="0" class="tabs_bg"><a href="#"><img class="img-responsive" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/tab01.png" alt="" /> <span><strong>Grab this great iPhone Deal</strong>
                                Lorem Ipsum is simply dummy text of the printing and </span><i class="fa fa-caret-up"></i></a></li>
          <li data-target="#myCarousel" data-slide-to="1" class="tabs_bg"><a href="#"><img class="img-responsive" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/tab02.png" alt="" /> <span><strong>Grab this great iPhone Deal</strong>
                                Lorem Ipsum is simply dummy text of the printing and </span><i class="fa fa-caret-up"></i></a></li>
          <li data-target="#myCarousel" data-slide-to="2" class="tabs_bg no-bd"><a href="#"> <img class="img-responsive" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/tab03.png" alt="" /><span><strong>Grab this great iPhone Deal</strong>
                                Lorem Ipsum is simply dummy text of the printing and </span><i class="fa fa-caret-up"></i></a></li>
        </ul>-->
       <ul class="nav nav-pills nav-justified">
<?php if(isset($modelBanner))
          {
              $imgcont = 0;
                foreach ($modelBanner as $bannerImage2)
                 {
                    if($imgcont == '0')
                    {
                        $active = "active";
                        
                    }else {
                         $active = "";
                    }?>
                    
          <li data-target="#myCarousel" data-slide-to="<?php echo $imgcont;?>" class="tabs_bg <?php echo $active;?>"><a href="#"><img class="img-responsive" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/uploaded_files/banner/thumb/<?php echo $bannerImage2['subheaderImage'];?>" alt="" /> <span><strong><?php echo $bannerImage2['subheaderHeading'];?></strong>
                                <?php echo $bannerImage2['subheaderContent'];?> </span><i class="fa fa-caret-up"></i></a></li>
         
       
              
            
              
              
               <?php $imgcont++; 
               
                    }
          }
              ?>
 </ul>

    </div><!-- End Carousel -->
        </div>           
    </header>

    <!-- Page Content -->
    <div class="container content_wrap" style="display:none">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 txt_align">
                <strong>Welcome to Bluesky New Zealand</strong>
                <p class="ychos">Join Bluesky New Zealand to stay in touch with your friends and family in Samoa and in New Zealand with our great value plans, extensive network coverage and an exciting range of handsets..</p>
               
            </div>
        </div>
        <!-- /.row -->

            <div class="row">
           
                <?php /* $modelCMS = \app\models\Cms::find()->where(['pageStatus'=>'1', 'options'=>'others' ])->limit(4)->orderBy('listorder')->all();
                                    
                                    if(is_array($modelCMS))
                                    {
                                        $i=1;
                                        foreach($modelCMS as $model)
                                        {
                                            $pieces = explode(" ", $model->pageTitle);?>
                 <div class="col-sm-6 col-lg-3">
                                             <div class="ychosus"><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/page/<?php echo $model-> slug;?>" target="_blank"></a>
                    <img class="img-responsive" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/plant.png" alt="">
                    <h3><?php echo $pieces[0].'<br />'.$pieces[1];?></h3>
                </div>
                      </div>                  <?php $i++;}
                                        
                                    }*/?>
        
        <div class="col-sm-6 col-lg-3">    	
        <div class="ychosus"><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/page/get-started" target="_blank"></a>
                    <img class="img-responsive" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/plant.png" alt="">
                    <h3>Get  <br />Started</h3>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
            	<div class="ychosus"><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/page/pricing-plans" target="_blank"></a>
                    <img class="img-responsive" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/refund.png" alt="">
                    <h3>Pricing and<br /> Plans</h3>
                    <div class="cb"></div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
            	<div class="ychosus"><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/page/topup-locations" target="_blank"></a>
                    <img class="img-responsive" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/hour.png" alt="">
                    <h3>Top-Up  <br />Locations</h3>
                    <div class="cb"></div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
            	<div class="ychosus"><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/page/getin-touch" target="_blank"></a>
                    <img class="img-responsive" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/other.png" alt="">
                    <h3>Get In  <br />Touch</h3>
                    <div class="cb"></div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Footer -->

    </div>
    <!-- /.container -->
<?php if(count($modelProduct)>0)
{?>
    <div class="new_phones_bg" style="display:none">
        	<div class="container">
            	<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="product_info_heading">
                            <h1>New Phones & Deals</h1>
                            <p>Lorem Ipsum is simply dummy text of the printing </p>
                        </div>
                       <?php  foreach ($modelProduct as $product)
                        {?>
                           <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="new_phones">
                            	<a href="product-details/<?php echo $product->id;?>"><img class="img-responsive" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/uploaded_files/product/160X260/<?php echo $product->image;?>" alt=""></a>
                                <div class="new_ph_info">
                                    <p><?php echo $product->details; ?></p>
                                    <h3><?php echo $product->product_name?>&nbsp;&nbsp;$<?php echo $product->price?></h3>
                                    <a href="product-details/<?php echo $product->id;?>"><div class="getitnow_btn"><button class="btn btn-lg btn-primary" type="button">Buy Now</button></div></a>
                                </div>
                                <div class="cb"></div>
                            </div>
                        </div>
<?php } }
                        ?>
                        <!--<div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="new_phones">
                            	<img class="img-responsive" src="<?php //echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/product01.png" alt="">
                                <div class="new_ph_info">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's </p>
                                    <h3>BluSky Phone $999</h3>
                                    <div class="getitnow_btn"><button class="btn btn-lg btn-primary" type="button">Buy Now</button></div>
                                </div>
                                <div class="cb"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                        	<div class="new_phones">
                            	<img class="img-responsive rit_pro_img" src="<?php //echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/product02.png" alt="">
                                <div class="new_ph_info fr">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's </p>
                                    <h3>BluSky Phone $999</h3>
                                    <div class="getitnow_btn"><button class="btn btn-lg btn-primary" type="button">Buy Now</button></div>
                                </div>
                                <div class="cb"></div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
         </div>
    
            <!-- /.new_phones_bg -->
        