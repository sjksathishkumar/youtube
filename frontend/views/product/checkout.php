<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if($personalInformation!=NULL)
{
   // print_r($personalInformation);
}
?>
<div class="container">
        <div class="row">
        	<div class="page_title col-lg-12">Checkout</div>
            <div class="cb"></div>
            <div class="subpage_border"></div>
            <div class="col-lg-12">
                <div class="checkout_arrow">
                <div class="left_arrow"><span>1</span> Your Details</div>
                <div class="mid_arrow"></div>
                <div class="right_arrow"><span>2</span> Payment</div>
                </div>
                <div class="cb"></div>
               
                <div class="login_frm">
                 <p><span>You are not logged in</span>&nbsp;&nbsp;<a href="#" id="login-checkout">Login Now</a></p>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 content_wrap">
            	
                <div class="login_frm_container" style="display:none">
                	<div class="col-lg-7">
                    	<div class="login_frm_col"><h3>Login</h3><div class="log_bd">OR</div>
                            <?php $form = ActiveForm::begin(['id' => 'formLoginCheckout']); ?>
                            <div class="input_box_full valid_star_non"><input type="text" class="txt" placeholder="Email Address" name="LoginForm[email]" id="username" >
                                  
                            </div>
                            <div class="input_box_full valid_star_non"><input type="password" class="txt" placeholder="Password" name="LoginForm[password]" id="password">
                                <p id="loginPasswordErrorMsgCheckout" class="log-block-error"></p>
                                 <p id="loginEmailErrorMsgCheckout" class="log-block-error"></p>
                            </div>
                             
                            <!-- <p class="sucess_txt" id="forgotEmailSuccessMsg2" ><?php //if(Yii::$app->session->hasFlash('successlogin')) { echo Yii::$app->session->getFlash('successlogin');}?></p></div>-->
                            <div id="accepted">
                                <div><input id="checkbox1" type="checkbox" name="keepmelogin" value="1" /><label for="checkbox1"><span></span>
                                Keep me logged in on this device</label></div>
                            </div>
                            <div class="cb"></div>
			 <button class="btn btn-primary btn_signup" type="button" onclick=login();>Login</button>
                            <div class="cb"></div>
                        </div>
                    </div>
                     <?php ActiveForm::end(); ?>
                                          <script type="text/javascript">
                                                            function login()
                                                            {
                                                                var data=$("#formLoginCheckout").serialize();
                                                              
                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: '<?php echo  Yii::$app->urlManager->createUrl('site/login') ?>' ,data:data,success:function(data){
                                                                         //alert(data);
                                                                           //return false;
                                                                        var myObject = eval('(' + data + ')');
                                                                        //alert(myObject.email);
                                                                        $('#loginEmailErrorMsgCheckout').text(" "+myObject.email);
                                                                        if(myObject.redirectUrl!="")
                                                                        $('#loginPasswordErrorMsgCheckout').text(myObject.password);
                                                                     
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
                    <div class="col-lg-5">
                    	<div class="social_btn_wrap">
                            <div class="social_btn"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/frontend/web/images/fb.png" alt="" /></div>
                            <div class="social_btn"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/frontend/web/images/g_plus.png" alt="" /></div>
                        </div>
                    </div>
                    <div class="cb"></div>
                </div>
            
               <?php $form = ActiveForm::begin(['id' => 'formOrderDetails']); ?>   
                <?= $form->field($model, 'coupon',['errorOptions'=>['tag'=>'p']])->hiddenInput(['value'=>''])->label(false); ?> 
                <div class="from_container">
                	<div class="from_title">
                    	Personal information<span><i class="star_red">*</i> All fields are mandatory</span>
                    </div>
                    <div class="info">We only ask this so we can efficiently process your order. Please fill in all the fields</div>
                    <!--<div class="input_box"><input type="text" placeholder="Full Name" class="txt"></div>
                    <div class="input_box"><input type="text" placeholder="Last Name" class="txt"></div>
                    <div class="input_box"><input type="email" placeholder="Email" class="txt"></div>-->
                     <div class="input_box">
                        

  <?= $form->field($model, 'billing_firstname',['errorOptions'=>['tag'=>'p']])->textInput(['class'=>'txt','placeholder'=>'First Name'])->label(false); ?> </div>
                    <div class="input_box"><?= $form->field($model, 'billing_lastname',['errorOptions'=>['tag'=>'p']])->textInput(['class'=>'txt','placeholder'=>'Last Name'])->label(false); ?> </div>
                    <div class="input_box"> <?= $form->field($model, 'email',['errorOptions'=>['tag'=>'p']])->textInput(['class'=>'txt','placeholder'=>'Email'])->label(false); ?></div>
                    <div class="fld_full_width">
                            <label>Delivery Address</label>
                            <div class="input_box_full"><?= $form->field($model, 'shipping_address1',['errorOptions'=>['tag'=>'p']])->textInput(['class'=>'txt','placeholder'=>'Address 1'])->label(false); ?></div>
                            <div class="input_box_full valid_star_non"><?= $form->field($model, 'shipping_address2',['errorOptions'=>['tag'=>'p']])->textInput(['class'=>'txt','placeholder'=>'Address 2(Optional)'])->label(false); ?></div>
                            <div class="input_box"><?= $form->field($model, 'shipping_suburb',['errorOptions'=>['tag'=>'p']])->textInput(['class'=>'txt','placeholder'=>'Suburbs'])->label(false); ?></div>
                            <div class="input_box"><?= $form->field($model, 'shipping_city',['errorOptions'=>['tag'=>'p']])->textInput(['class'=>'txt','placeholder'=>'Town/City'])->label(false); ?></div>
                            <div class="input_box"><?= $form->field($model, 'shipping_postcode',['errorOptions'=>['tag'=>'p']])->textInput(['class'=>'txt','placeholder'=>'Postal Code'])->label(false); ?></div>
                            <div class="input_box"><?= $form->field($model, 'contactno',['errorOptions'=>['tag'=>'p']])->textInput(['class'=>'txt','placeholder'=>'Contact Number'])->label(false); ?></div>
                            
                           
                    </div><!--fld_full_width-->
                      
                        <div class="cb"></div>
                    
                	
                </div><!--from_container -->
                
               		 
                     
        <div class="cb"></div>
                <div class="fld_full_width">
                <div class="from_title_pass">Would you like to set up your BlueSky account now?</div>
                <p>It's easy just fill in the below.</p><br />
                <div id="accepted">
                        <div>
                            <?php echo $form->field($model, 'isCreateAccount',[ 'template' => "{input}"])->checkbox()->label(false); ?> 
 </div>
                    </div>
                    <div class="input_box valid_star_non ex_space"> <?= $form->field($model, 'password',['errorOptions'=>['tag'=>'p']])->passwordInput(['class'=>'txt','placeholder'=>'Password'])->label(false) ?></div>
                    <div class="input_box valid_star_non"><?= $form->field($model, 'confirm_password',['errorOptions'=>['tag'=>'p']])->passwordInput(['class'=>'txt','placeholder'=>'Confirm Password'])->label(false) ?></div>
                   
                    <div class="pass_info">Your password needs to contain at least 8 characters, one upper case and one numeric character. It cannot contain your email address.</div>
                    
                  <!-- <div id="accepted">
                        <div><input id="checkbox3" type="checkbox" name="checkbox" value="1" ><label for="checkbox3"><span></span>
                        I have read and accept <a href="#">Bluesky terms</a></label></div>
                    </div>-->
                    
                    <div id="accepted">
                         
                        <div><label>
                           <?php echo $form->field($model, 'accept_term',['errorOptions'=>['tag'=>'p']], ['options' => ['tag' => 'span',], 'template' => "{input}"])->checkbox(['checked' => false])->label(false); ?>
                                <!--<div id="terms" style="float:left; margin-top: 12px;"> I have read and accept <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/bluesky-terms" target="_blank">Bluesky terms</a>--></label></div></div>
                   <!-- </div>-->
					 <?= Html::submitButton('Proceed to Payment & Finish', ['class' =>'btn btn-primary btn_signup ']) ?>
			<?php ActiveForm::end(); ?>
                </div></div><!--col-lg-8-->
           <div class="col-lg-4">
                <div class="odr_sumry_wrap">
                    <h3>Order Summary</h3>
                    <ul class="odr_sumry_table gray">
                    	<li class="pro_img_check">Product</li>
                        <li>Oty</li>
                        <li>Delivery</li>
                        <li>Price</li>
                    </ul>
                    <?php if(\Yii::$app->cart->getCount()>0) {
                    foreach(\Yii::$app->cart->getPositions() as $positions)
                    {?>
                        <ul class="odr_sumry_table">
                    	<li class="pro_img_check"><img style="width:30px;height:30px;" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl().'/uploaded_files/product/thumb/'.$positions['image'] ;?>" alt="" /><h4><?php echo $positions['product_name'];?></h4> color : Black</li>
                        <li><?php echo $positions->getQuantity();?></li>
                        <li><small>3-6 Business Days</small></li>
                        <li><strong>$<?php echo ($positions->getQuantity()*$positions['price']);?></strong></li>
                    </ul>
                    <?php } }?>

                   
                    <div class="odr_sumry_box">
                  	<h4> Got a promo code?</h4>
                     <?php $form = ActiveForm::begin(['id' => 'formCoupon', 'class'=>'form']); ?>   
                       <input name="coupon" id="coupon" placeholder="Coupon code" type="password" class="form-control_txt">
                   <button type="button" id="btnCoupon" class="btn_login" onclick=applyCoupon();>&nbsp;</button>
                   <p id="CouponErrorMsg" class="log-block-error"></p>
                   
                   <?php ActiveForm::end(); ?>
                  <script type="text/javascript">
                                                            function applyCoupon()
                                                            {
                                                                var data=$("#formCoupon").serialize();
                                                              
                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: '<?php echo  Yii::$app->urlManager->createUrl('checkout/applycoupon') ?>' ,data:data,success:function(data){
            					   // alert(data);
                                                    //return false;
                                                                       var myObject = eval('(' + data + ')');
                                                                        if(myObject.error==false)
                                                                            {
                                                                                //alert($('#coupon').val());
                                                                                $('#orders-coupon').val($('#coupon').val());
                                                                                $('#save').html("SAVE:$"+myObject.discount);
                                                                                $('#total').html('$'+myObject.total);
                                                                                $('#CouponErrorMsg').text(myObject.successMessage);
                                                                        
                                                                            }
                                                                            else
                                                                                {
                                                                                   $('#CouponErrorMsg').text(myObject.errorMessage); 
                                                                                }
            						
                                                                        //$('#loginEmailErrorMsg').text(myObject.email);
                                                                        //$('#loginPasswordErrorMsg').text(myObject.password);
                                                                     
                                                                       /* if (myObject.redirectUrl !="") {
                                                                            document.location = myObject.redirectUrl;
                                                                        }*/
            					   
                                                                    },
                                                                    error: function(data) { // if error occured
            						
                                                                    },
                                                                    dataType:'html'
                                                                });
                                                            }
                                                        </script>
					<div class="cb"></div>                                                        
                    </div>
                 
                    <div class="odr_sumry_total">
                        <div id="save"></div>
						<label>Total</label>
                        <div class="totat_amt fr">
                        	<h2><!--<strong id="subtotal" class="strike">$<?php //echo \Yii::$app->cart->getCost();?></strong>-->
                        <span id="total">
                                    $<?php echo \Yii::$app->cart->getCost();?>
                                    </span>
                                </h2>
                            <span>Includes <?php echo round((\Yii::$app->cart->getCost())*(Yii::$app->session['gstcharge'])/100, 2);?> GST</span>
                        </div>
                         <div class="cb"></div>
                    </div>
                </div>
           </div>
           
        </div>
        <!-- /.row -->



        <!-- Footer -->

    </div>
    <!-- /.container -->

    
            <!-- /.new_phones_bg -->
<script src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/frontend/web//js/jquery.js"></script>
            <script>
                    $(document).ready(function() { 
                        //$('#subtotal').hide();
                        $('.field-orders-accept_term p').css({'color':'red','font-family':'arial','font-size': '12px'});
                         customCheckbox('#orders-accept_term');
                          customCheckbox('#orders-iscreateaccount');
                        $('#login-checkout').click(function(){
               // alert("hello");
                $(".login_frm_container").toggle(); 

            });

            /*$('.close').click(function(){
                $(".login_frm_container").slideUp("fast");

            });*/
                    });
                    </script>
                    
                    
                    <script type="text/javascript">
    function customCheckbox(checkboxName){
        
        var checkBox = $(checkboxName);
        $(checkBox).each(function(){
          $(this).wrap( "<span class='custom-checkbox'></span>" );
            if($(this).is(':checked')){
                $(this).parent().addClass("selected");
               
            }
                    });
        $(checkBox).click(function(){
           
          $(this).parent().toggleClass("selected");
            
            
        });
    }
    
</script>