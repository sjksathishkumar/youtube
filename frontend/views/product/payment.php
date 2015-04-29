 <div class="container">
        <div class="row">
        	<div class="page_title col-lg-12">Payment</div>
            <div class="cb"></div>
            <div class="subpage_border"></div>
            <div class="col-lg-12">
                <div class="payment_arrow">
                <div class="left_arrow"><span>1</span> Your Details</div>
                <div class="mid_arrow"></div>
                <div class="right_arrow"><span>2</span> Payment</div>
                </div>
                <div class="cb"></div>
               <!-- <div class="login_frm"></div>-->
            </div>
            <div class="col-lg-8 col-md-12 content_wrap">
            	
                   
                <div class="from_container">
                	<div class="from_title">
                    	&nbsp;<span><i class="star_red">*</i> All fiels are mandatory</span>
                    </div>
                    <div class="halfwidth fl">
                            <div class="selectboxstyle cardtype">
                             <span class="valid_star"></span>
                              <select>
                                <option value="volvo">Select a card type</option>
                                <option value="saab">Saab</option>
                                <option value="mercedes">Mercedes</option>
                                <option value="audi">Audi</option>
                              </select>
                            </div>
                            
                        </div>
                        <div class="cards fl">
                        <a href="#" class="visa"></a>
                        <a href="#" class="american"></a>
                        <a href="#" class="paypal"></a>
                        <a href="#" class="master"></a>
                        </div>
                        <div class="cb"></div>
                        <div class="halfwidth fl">
	                        <div class="input_box_full valid_star_non"><input type="text" placeholder="Credit card number" class="txt"></div>
                        </div>
                        <div class="halfwidth fr">
	                        <div class="input_box_full valid_star_non"><input type="text" placeholder="Card holder's name" class="txt"></div>
                        </div>
                    <div class="fld_full_width">
                            <div class="dob_wrap fl">
                            <label>Card Expiration Date</label>
                            <div class="selectboxstyle card_dat">
                            <span class="valid_star"></span>
                              <select>
                                <option value="volvo">Month</option>
                                <option value="saab">Saab</option>
                                <option value="mercedes">Mercedes</option>
                                <option value="audi">Audi</option>
                              </select>
                            </div>   
                            
                            <div class="selectboxstyle card_dat">
                            <span class="valid_star"></span>
                              <select>
                                <option value="volvo">Year</option>
                                <option value="saab">Saab</option>
                                <option value="mercedes">Mercedes</option>
                                <option value="audi">Audi</option>
                              </select>
                            </div>
                            </div>
                    </div><!--fld_full_width-->
                    <div class="ccv_no">
                    		 <label>CCV</label>
	                      <div class="input_box valid_star_non"><input type="text" placeholder="" class="txt"></div>
                    </div>
                    <div class="cb"></div>
                       <div id="accepted">
                        <div><input id="checkbox3" type="checkbox" name="checkbox" value="1" checked="checked"><label for="checkbox3"><span></span>
                       Save Credit Card Details</label></div>
                    </div>
					<button class="btn btn-primary btn_signup" type="button">Proceed to Payment & Finish</button>
                        <div class="cb"></div>
                    
                	
                </div><!--from_container -->
                
               		 
                     
     <br><br>
			
            </div><!--col-lg-8-->
           <div class="col-lg-4">
                <div class="odr_sumry_wrap">
                    <h3>Order Summery</h3>
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
                   <!-- <ul class="odr_sumry_table">
                    	<li class="pro_img_check"><img src="common/images/checkout_img_thumb.png" alt="" /><h4>Samsung Galaxy</h4> color : Black</li>
                        <li>1</li>
                        <li><small>3-6 Business Days</small></li>
                        <li><strong>$29</strong></li>
                    </ul>
                    <ul class="odr_sumry_table">
                    	<li class="pro_img_check"><img src="common/images/checkout_img_thumb.png" alt="" /><h4>Samsung Galaxy</h4> color : Black</li>
                        <li>1</li>
                        <li><small>3-6 Business Days</small></li>
                        <li><strong>$29</strong></li>
                    </ul>-->
                    <div class="odr_sumry_box">
                  	<h4> Got a promo code?</h4>
                   <input name="password" id="password" placeholder="Coupon code" type="password" class="form-control_txt">
                   <button type="button" id="btnLogin" class="btn_login">&nbsp;</button>
                    </div>
                    <div class="odr_sumry_total">
						<label>Total</label>
                        <div class="totat_amt fr">
                        	<h2>$<?php echo \Yii::$app->cart->getCost();?></h2>
                            <span>Includes $7.57 GST</span>
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
     	
