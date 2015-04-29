<?php
use yii as YII;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\widgets\ActiveForm;

require_once 'youtube_oAuth.php';

//foreach(\Yii::$app->cart->getPositions() as $positions)
//        {
//    echo $positions->getColor();
//}
//use backend\models\cms;
//Yii::import('backend.models.cms') ;
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
 //echo Yii::$app->session->getId();//exit;
 /*foreach(\Yii::$app->cart->getPositions() as $positions)
        {
            echo $positions->getColor();
        }*/

?>
<?php //echo Yii::$app->controller->action->id;?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

        <meta charset="utf-8">
        <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>uturn</title>
        <!-- Bootstrap -->
     
        <link rel="icon" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/frontend/web/images/favicon.ico" type="image/x-icon" />
       <link type="text/less" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/frontend/web/css/bootstrap.less" rel="stylesheet"/>
        <!--<link type="text/css" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/frontend/web/css/bootstrap.less" rel="stylesheet"/>-->
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'/>
        <link href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/frontend/web/css/font-awesome.min.css" rel="stylesheet">    
        
        
        <link rel="stylesheet" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/css/plugins/jquery-ui/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
        
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
      
        
    </head>
    


<body>
           <!-- Navigation -->
    <nav class="navbar mynavbar navbar-bg navbar-inverse" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
           <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>" ><h3 class="text-muted pull-left"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/logo.png" alt="" /></h3></a>
            <!--small menu-->
<!--            <ul class="smallmenu pull-left">
                <li><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/product">Products</a></li>
                <li><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/combo">Combos</a></li>
                <li><a href="#">SIMs</a></li>
            </ul>-->
            <!--small menu-->
            
            
                <ul id="navigation" class="nav navbar-nav pull-right">
                   
                    
                    
                    <?php 
                                    
                    if(Yii::$app->session->get('userId'))
                    {  
                   
?>
                     <li><a href="#" class="no-bd"><img src="common/images/dashboard.png" alt="" /> Dashboard</a></li>
                     <!--<li><a href="#"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/topup.png" alt="" /> Top Up</a></li>-->
                    <li><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/site/logout"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/logout.png" alt="" /> Logout</a></li>
                   <?php }else { ?>
                        
                    <li id="cartitmes"><a href="#" class="no-bd" ><span id="cartCount"><?php echo \Yii::$app->cart->getCount() ?></span><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/order.png" alt="" /> Your Order</a></li>
                        
                     <!--<li><a href="#"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/topup.png" alt="" /> Top Up</a></li>-->
                    <li><a class="login-toggle" href="javascript:void(0);" data-toggle="" id="navLogin"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/signup.png" alt="" /> Join Uturn</a></li>
                    <!--<li><a href="<?php //echo Yii::$app->urlManager->createUrl('site/signup') ?>"><img src="<?php //echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/signup.png" alt="" /> Join Uturn</a></li>-->
                   <li><a class="login-toggle" href="javascript:void(0);" data-toggle="" id="navLogin"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/logout.png" alt="" /> Sign In</a>
                   
                     
                     <!--Login section here-->

<!--                            <div class="dropdown-menu foralign" style="display: none;">
                                <div class="container">
                                    <div class="row">
                                    <div id="login_hide_box" class="hide_box">
                                        <div class="login_wrapper">
                                        <i class="fa fa-caret-up uparrow"></i>
                                       <?php $form = ActiveForm::begin(['id' => 'formLogin', 'class'=>'form']); ?>
                                        <label>Login Now</label>
                                        <div class="input_fld_slide"> <input name="LoginForm[email]" id="username" placeholder="Email Address" type="text" class="form-control_txt">
                                            <p id="loginEmailErrorMsg" class="log-block-error"></p>
                                            <p id="varifyMsg"><?php if(Yii::$app->session->hasFlash('successlogin')) { echo Yii::$app->session->getFlash('successlogin');}?></p>
                                        </div>
                                        <div class="input_fld_slide">
                                            <input name="LoginForm[password]" id="password" placeholder="Password" type="password" class="form-control_txt">
                                        <p id="loginPasswordErrorMsg" class="log-block-error"></p>
                                         <p class="sucess_txt" id="forgotEmailSuccessMsg2" ></p></div>
                                        <button type="button" id="btnLogin" class="btn_login" onclick=login();>&nbsp;</button>
                                        <button type="button" class="close log_close" data-dismiss="modal"></button>
                                         <?php ActiveForm::end(); ?>
                                        
                                          <script type="text/javascript">
                                                            function login()
                                                            {
                                                                var data=$("#formLogin").serialize();
                                                              $('#loginEmailErrorMsg').hide();
                                                                        $('#loginPasswordErrorMsg').hide();
                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: '<?php echo  Yii::$app->urlManager->createUrl('site/login') ?>' ,data:data,success:function(data){
            					    
                                                                        var myObject = eval('(' + data + ')');
            						
                                                                        $('#loginEmailErrorMsg').text(myObject.email);
                                                                        $('#loginPasswordErrorMsg').text(myObject.password);
                                                                     $('#loginEmailErrorMsg').show();
                                                                        $('#loginPasswordErrorMsg').show();
                                                                        if (myObject.redirectUrl !="") {
                                                                            document.location = myObject.redirectUrl;
                                                                        }
            					   
                                                                    },
                                                                    error: function(data) { // if error occured
            						
                                                                    },
                                                                    dataType:'html'
                                                                });
                                                            }
                                                        </script>
                                        <div class="log_social">
                                        	<span>Or Login With</span> 
                                                      <?= yii\authclient\widgets\AuthChoice::widget(['baseAuthUrl' => ['site/auth']]) ?>
                                            
                                        </div>
                                        
                                        <div class="clearfix"></div>
                                        </div>
                                        <div class="forgot_pass"><a href="javascript:void(0);" id="hide_this">Forgot your password? </a></div>
                                    </div>
                                    <div id="forgot_pass_wrap">
                                        <div class="login_wrapper">
                                        <i class="fa fa-caret-up uparrow"></i>
                                        <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form', 'class'=>'form']); ?>
                                        <label>Enter Your Email</label>
                                        <div class="input_fld_slide"><input name="email" id="username" placeholder="Email Address" type="text" class="form-control_txt">
                                            <p class="log-block-error" id="forgotEmailErrorMsg"></p>
                                        <p class="sucess_txt" id="forgotEmailSuccessMsg" ></p></div>
                                        
                                        <button type="button" id="btnLogin" class="btn_login" onclick=recovery();>&nbsp;</button>
                                     <?php ActiveForm::end(); ?>
                                        <script type="text/javascript">
                                                            function recovery()
                                                            {
                                                                var data=$("#request-password-reset-form").serialize();
                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: '<?php echo  Yii::$app->urlManager->createUrl('site/recovery') ?>' ,data:data,success:function(data){
            					    
                                                                        var myObject = eval('(' + data + ')');
                                                                            //alert(myObject.success);
                                                                        $('#forgotEmailErrorMsg').text(myObject.email);
                                                                         $('#forgotEmailSuccessMsg').text(myObject.success);
                                                                         
                                                                     
                                                                    },
                                                                    error: function(data) { // if error occured
            						
                                                                    },
                                                                    dataType:'html'
                                                                });
                                                            }
                                                        </script>
                                                        
                                        <button type="button" class="close log_close" data-dismiss="modal"></button>
                                        <div class="clearfix"></div>
                                        </div>
                                        <div class="forgot_pass"><a href="javascript:void(0);" class="log-toggle">Login </a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->

                    <!--Login section here End-->
<!--Signup section start here-->
    <div class="dropdown-menu foralign">
  <div class="fullscreen">
<div class="section">
    <div class="container">
      <h4>Thanks for your interest in Uturn.</h4>
      <div class="row">
          <p><strong>Let's get started! </strong> The first step in joining Uturn is to authorize us to connect with your YouTube channel to start the application process.</p>
          <p><a href="<?php echo $loginUrl;?>" target="_blank" class="btn gradient cta">Connect</a></p>
          <p>FYI: When you click CONNECT, you'll see a quick authorization page from YouTube before you're routed back to Uturn. If you have multiple YouTube channels, be sure you connect the right one (the one that you want to partner with Uturn).</p>
      </div>    
    </div>
  </div>
  </div>
</div>
<!--Signup section  End here-->                    
                    </li>
                    <?php }?>
                    <!--<li><a href="#"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/search.png" alt="" /> Search</a></li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>   
    
    <!-- logo and tow links Page Header -->
    <div class="header">
        <!--menu-->
	<div class="menu">
    <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <div class="col-lg-3"><h3 class="text-muted pull-left logo_bottom"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/logo_bottom.png" alt="" /></h3></div>
                <div class="col-lg-9">
                       <ul class="menuhere pull-left">  
                           <?php if(Yii::$app->controller->id=='product') {
             $modelCategory = \app\models\Category::find()->where(['status'=> '1'])->orderBy('menu_order')->all();
               if(is_array($modelCategory))
                                    {
                                        $i=0;
                                        foreach($modelCategory as $category)
                                        {
                                            $categoryName=preg_replace('/\s+/', '_', $category->category_name);
                                           $i++;
                                           if($i==1)
                                            {
                                                ?>
                            <li ><a id="<?php echo $category->category_name;?>" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/product/<?php echo $categoryName.'/'.$category->id;?>"><?php echo ucfirst($category->category_name);?></a></li>
                          
                           <?php  }
                            else {?>
                                <li ><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/product/<?php echo $categoryName.'/'.$category->id;?>"><?php echo ucfirst($category->category_name);?></a></li>
                          
                            <!--  <li role="presentation"><a href="#">Combos</a></li>-->
                                            <?php }
                                        }
                                    }
                                    

                                     } elseif(Yii::$app->controller->id=='combo') {?>
                                        <li><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/combo/weekly-combo">Weekly Combos</a></li>
                            <li><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/combo/monthly-combo">Monthly Combos</a></li>
                            
                                   <?php }
                                        ?>
                                     
                                     </ul>
                                    
                        </div>
                </div>
            </div>
        </div>
        </div><!--menu closed-->
    </div>
   
      <?php if(Yii::$app->controller->id!='cart') {?>
         <div class="blue_bg">
            <div class="container">
     <div class="row">
                <div class="col-lg-12 checkout_slide">
                    <div class="myorder_wrap">
                        
                    	<div class="myorder_top"><span id="cart_text" >If you already have a BlueSky SIM, Log in to your dashboard to add new Combo's, Add-Ons and manage your account like pro!
                            </span><button id="slideup" type="button" class="log_close" data-dismiss="modal"></button>
                        </div>
                        <?php if(\Yii::$app->cart->getCount()>0) {?>
                        <div id="items">
                            
                            <?php  foreach(\Yii::$app->cart->getPositions() as $positions)
        {?>
       
   <div class="col-lg-9 myorder">
                        	<div class="col-lg-1"><strong class="odr_no"><?php echo $positions->getQuantity();?></strong></div>
                           <div class="col-lg-5"> <span class="pro_info"><?php echo $positions['product_name'];?></span></div>
                           
                           <!--<div class="col-lg-3"><div class="color_box"><select class="chosen-select"><option value="">black</option></select></div></div>-->
                            <?php if($positions['discount_price']>0)
                                {?>
                           <div id="" class="col-lg-2 pro_price"><?php echo ($positions->getQuantity()*$positions['discount_price']);?></div>
                           <?php  } else {?>
                             <div id="" class="col-lg-2 pro_price"><?php echo ($positions->getQuantity()*$positions['price']);?></div>
                            
                           <?php }?>
                            
                           <div class="col-lg-1"> <button id="itemrow" value="<?php echo $positions['id'];?>" type="button" class="log_close" data-dismiss="modal" onclick="itemremove(this.value);"></button></div>
                       </div>
       
 <?php }?>
                    	 <div class="col-lg-3 pro_price_total">Total <span>$<?php echo \Yii::$app->cart->getCost()?> </span><small><small>Includes $<?php echo round((\Yii::$app->cart->getCost())*(Yii::$app->session['gstcharge'])/100, 2);?> GST</small></small></div>
                        
                     
                        <div class="cb"></div>
                   
                    
                         </div>
                       <div id="cartcheckout"> <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/product/checkout"><button class="btn btn-primary checkout_btn  pull-right" type="button">Checkout</button></a></div>
                        <?php } else {  ?><div id="items">Your cart is empty Continue Shopping<div class="cb"></div></div><div id="cartcheckout"><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/product/checkout"><button class="btn btn-primary checkout_btn  pull-right" type="button">Checkout</button></a></div>
                       <?php } ?>
                    </div>
            </div>
 </div>
                  
            </div>
         </div>   
   
    <div class="header_border"></div>
    <?php  }?>
   <div  class="page_min_hight">
    <?php echo $content; ?>
   </div>
  <div class="row repeat_border"></div>
          <footer>
        	<div class="container">
            	<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    	<div class="footer_wrap">
                        	<div class="border_height"></div>
                        	<div class="left_section">
                                    <h4>Our Company</h4>
                                    <ul>
                                    <?php  $modelCMS = \app\models\Cms::find()->where(['pageStatus'=>'1', 'options'=>'footer' ])->orderBy('listorder')->all();
                                    
                                    if(is_array($modelCMS))
                                    {
                                        
                                        foreach($modelCMS as $model)
                                        {?>
                                             <li> <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/page/<?php echo $model-> slug;?>" /> <?php echo $model->pageTitle;?></a></li>
                                            
                                        <?php }
                                        
                                    }
                                    
                                    
                                    ?>
                                    </ul>
                                    
                                    <ul>
                                        <li> <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/faq">FAQs</a></li>
                                        <li><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/blog">News</a></li>
                                         <li><a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/contact">Contact Us</a></li>
                                    </ul>
                            	  
                                   
                         </div>
                            
                            
                            <div class="right_section">
                            	<address>
                                	<i class="call"></i>
                                    <h4>Customer Support</h4>
                                    <p>Call Us +0800 663 400</p>
                                    <div class="border_height"></div>
                                    <div class="social_links"><i class="fb"></i><i class="twt"></i><i class="gplus"></i></div>
                                    <h4>Follow on us:</h4>
                                    <p>we're social</p>
                                </address>
                            </div><!--right section closed-->
                            <div class="border_height"></div>
                            <div class="copy_rite">© BlueSky 2015 all rights reserved</div>
                        </div>
                    </div>
                </div>
           </div>           
          </footer> 
        
       
        
    
	<script src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/frontend/web/js/less.min.js"></script>
        <!-- jQuery -->
       
        <script type="text/javascript" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/frontend/web/js/jquery.min.js"></script>
        
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/frontend/web/js/bootstrap.min.js"></script>
 
        <script src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/frontend/web/js/custom.js"></script>
        <script>

        $(document).ready(function() {
            
        <?php if(\Yii::$app->cart->getCount()>0) {
                if (Yii::$app->controller->action->id=='payment' || Yii::$app->controller->action=='cart')
                    {
                    ?>
                $('#cartitmes').hide();
                
        <?php } else {?>
         $('#cartitmes').show();
        <?php } } else {?>
                    $('#cartitmes').hide();
                <?php }?>
            <?php if(Yii::$app->session->hasFlash('successlogin')) {?>
                        $(".dropdown-menu").slideDown("fast");
            <?php }?>
            $('.login-toggle').click(function(){
                
                $(".dropdown-menu").slideDown("fast"); 

            });

            $('.close').click(function(){
                $(".dropdown-menu").slideUp("fast");

            });
			
			
			
			  $('#hide_this').click(function(){
                
                $(".hide_box").hide("fast"); 

            });

            $('#hide_this').click(function(){
                $("#forgot_pass_wrap").show("fast");

            });
			
			 $('.log-toggle').click(function(){
                
                $("#forgot_pass_wrap").slideUp("fast"); 

            });
			 $('.log-toggle').click(function(){
                $(".hide_box").slideDown("fast");

            });
			 $('.login-toggle').click(function(){
                
                $("#login_hide_box").slideDown("fast"); 
				 $("#forgot_pass_wrap").hide("fast");

            });
		$('.add2cart').click(function(){
               
               // $(".checkout_slide").slideDown("fast"); 
                addtocart();

            });	
                
               $('#cartitmes').click(function(){
                  //alert("hello");
              $(".checkout_slide").slideDown("fast");

            });
	$('#slideup').click(function(){
                $(".checkout_slide").slideUp("fast");

            });  

			
        });

       function itemremove(id)
                                                            {
                                                                var data = {"id" : id};
                                                            
                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: '<?php echo  Yii::$app->urlManager->createUrl('cart/removefromcart') ?>' ,data:data,
                                                                    success:function(data){
                                                                //alert(data);
                                                      //var myObject = eval('(' + data + ')');
                                                                        /* $.each(myObject.products, function(index, element) {
                                                                       console.log(index);       
                                                            console.log(element); 
                                                                               // console.log(v);
                                                        });   */
                                                             //var obj = JSON.parse(data);
                                                                var obj = eval('(' + data + ')');       
                                                                        //$('#loginEmailErrorMsg').text(obj.cost);
                                                                        $('#cartCount').text(obj.count);
                                                                   var strobj='';
                                                                   var quantity=0;
                                                                   var prodPrice=0;
                                                                   if(obj.count>0)
                                                                       {
                                                                            $('#cartitmes').show();
                                                                            $('#cartcheckout').show();
                                                                       $.each(obj.products, function( index, value ) {
                                                                          if(value.discount_price>0)
                                                                              {
                                                                                  prodPrice= value.discount_price;
                                                                              }
                                                                          else
                                                                              {
                                                                                  prodPrice=value.price;
                                                                              }
                                                                       
                                                                     strobj+= '<div class="col-lg-9 myorder">';
                                                                     $.each(obj.quantity, function( index2, value2 ) {
                                                                         if(index2==value.product_name)
                                                                            quantity= value2;
                                                                     });
                        	strobj+='<div class="col-lg-1"><strong class="odr_no">'+quantity+'</strong></div>';
                           strobj+='<div class="col-lg-5"> <span class="pro_info">'+value.product_name+'</span></div>';
                           //strobj+='<div class="col-lg-3"><div class="color_box"><select class="chosen-select"><option value="Black">Black</option></select></div></div>';
                           strobj+='<div id="" class="col-lg-2 pro_price">$'+prodPrice+'</div>';
                           strobj+='<div class="col-lg-1"> <button id="itemrow" value="'+value.id+'" type="button" class="log_close" data-dismiss="modal" onclick="itemremove(this.value);"></button></div>';
                      
                       strobj+='</div>';
                      
                
                                                                       
                                                                      });
                                                                      strobj+='<div class="col-lg-3 pro_price_total">Total <span>$'+obj.cost+'</span><small>Includes $'+(obj.gstCharge*obj.cost/100).toFixed(2)+' GST</small></div>';
                                                                      }
                                                                      else
                                                                          {
                                                                             strobj='Your cart is empty Continue Shopping'; 
                                                                              $('#cartitmes').hide();
                                                                               $('#cartcheckout').hide();
                                                                               $('#cart_text').hide();
                                                                          }
                                                                     // alert
                                                                      $('#items').html(strobj);
                                                                        //if (myObject.redirectUrl !="") {
                                                                          //  document.location = myObject.redirectUrl;
                                                                        //}
            					   
                                                                    },
                                                                    error: function(data) { // if error occured
            						
                                                                    },
                                                                    dataType:'html'
                                                                });
                                                            }
                                                            
                                                            
                                                     function addtocart()
                                                            {
                                                               var data=$("#productdetail-form").serialize();
                                                               //alert(data);
                                                           $.ajax({
                                                                    type: 'POST',
                                                                    url: '<?php echo  Yii::$app->urlManager->createUrl('cart/addtocart') ?>' ,data:data,
                                                                    success:function(data){
                                                               // alert(data);
                                                                //return false;
                                                                    
                                                                        var obj = eval('(' + data + ')');      
                                                                        var quantity;
                                                                        //alert(obj.error);
                                                                       if(obj.error==false)
                                                                           {
                                                                               //alert(data);
                                                                          
                                                                        $('#cartCount').text(obj.count);
                                                                        var strobj='';
                                                                        var prodPrice=0;
                                                                        $.each(obj.products, function( index, value ) {
                                                                        var index='qty_'+value.product_name;
                                                                        strobj+= '<div class="col-lg-9 myorder">';
                                                                        $.each(obj.quantity, function( index2, value2 ) {
                                                                            if(value.discount_price>0)
                                                                              {
                                                                                  prodPrice= value.discount_price;
                                                                              }
                                                                          else
                                                                              {
                                                                                  prodPrice=value.price;
                                                                              }
                                                                        
                                                                         if(index2==value.product_name)
                                                                            quantity= value2;
                                                                     });
                                                                    strobj+='<div class="col-lg-1"><strong class="odr_no">'+quantity+'</strong></div>';
                           strobj+='<div class="col-lg-5"> <span class="pro_info">'+value.product_name+'</span></div>';
                           //if(value.color!=null)
                          // strobj+='<div class="col-lg-3"><div class="color_box"><select class="chosen-select"><option value="Black">Black</option></select></div></div>';
                           strobj+='<div id="" class="col-lg-2 pro_price">$'+prodPrice+'</div>';
                           strobj+='<div class="col-lg-1"> <button id="itemrow" value="'+value.id+'" type="button" class="log_close" data-dismiss="modal" onclick="itemremove(this.value);"></button></div>';
                      
                       strobj+='</div>';
                      
                
                                                                       
                                                                      });
                                                                      if(obj.cost>0)
                                                                      strobj+='<div class="col-lg-3 pro_price_total">Total <span>$'+obj.cost+'</span><small>Includes $'+(obj.gstCharge*obj.cost/100).toFixed(2)+' GST</small></div><div class="cb"></div>';
                                                                  else
                                                                      {
                                                                    strobj+="Your cart is empty Continue Shopping";
                                                                    $('#cart_text').hide();
                                                                      }
                                                                     // alert
                                                                     $(".checkout_slide").slideDown("fast");
                                                                      $('#cartitmes').show();
                                                                      $('#cartcheckout').show();
                                                                      $('#items').html(strobj);
                                                                   }
                                                                   else
                                                                       {
                                                                           //alert(obj.errorMessage);
                                                                           $('#QTYErrorMsg').text(obj.errorMessage);
                                                                       }
                                                                         },
                                                                    error: function(data) { // if error occured
            						
                                                                    },
                                                                    dataType:'html'
                                                                });
                                }

    </script>
 
        
<style>
    .left_section .nav li a:hover{background: none;}
    .left_section .nav li a{padding:0px;}
    #varifyMsg{color:green;width:400px;}
    #QTYErrorMsg{color:red;}
</style>
 <?php $this->endBody() ?>

    </body>
</html>

<?php $this->endPage() ?>