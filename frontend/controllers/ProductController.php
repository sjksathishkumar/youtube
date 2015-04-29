<?php

namespace frontend\controllers;
use Yii;
use app\models\Product;
use app\models\productColor;
use app\models\ProductAttributeProperty;
use app\models\AttributeOptions;
use app\models\Attribute;
use app\models\Orders;
use app\models\Settings;
use app\models\OrderDetails;
use common\models\User;
use yii\web\Session;
use frontend\models\Coupon;
//use app\omnilight\shoppingcart\CartPositionInterface;

class ProductController extends \yii\web\Controller 
{
    
    public function actionIndex()
    {
        $modelProduct= new \app\models\Product;
        $modelCategory= new \app\models\Category;
        $varCategoryName=  ucfirst("Products");
        //print_r($_GET);
        //exit();
        //$varCategoryid=$modelCategory->findCategory('phones');
        //$defaultcatid=$varCategoryid['id'];
        
        //echo $_GET['id'];
        //exit();
        $varCategory=$modelCategory->find()->where(['status'=> '1'])->orderBy('menu_order')->all();
        if(isset($_GET['categoryid']) && $_GET['categoryid']!=NULL && $_GET['categoryid']!='')
        {
            $cat=$_GET['categoryid'];
            $varObjectCategory=$modelCategory->findCategoryName($cat);
            $varCategoryName=ucfirst($varObjectCategory->category_name);
            $varProduct=$modelProduct->findAll(['status'=> '1','fkcategory_id'=>$cat]);
        }
        else
        $varProduct=$modelProduct->findAll(['status'=> '1']);//->all();
        return $this->render('index', ['modelProduct'=> $varProduct,'modelCategory'=>$varCategory,'categoryName'=>$varCategoryName]);
        
       // return $this->render('index');
    }
  
 public function actionCheckout()
 {
     $modelPersonalInformation=NULL;
     $objCoupon=Null;
     $discountPercent=0;
     $discount=0;
     if(isset(Yii::$app->session['delivery_details']))
        {
            $modelPersonalInformation=Yii::$app->session['delivery_details'];
        }
       else
       {
           $modelPersonalInformation=NULL;
       }
     if(\Yii::$app->cart->getCount()>0)
     {
            $modelCoupon= new Coupon;
            $modelOrders= new Orders;
            $modelOrders->isCreateAccount=true;
            $varuserID='';
            if(isset($_POST['Orders']['isCreateAccount']) && $_POST['Orders']['isCreateAccount']==1)
            {
                //echo "hi";
                $modelOrders->scenario = 'createWithUser';
            }
            else
            {
                //echo "hello";
                $modelOrders->scenario = 'createWithGuest';
            }
            if ($modelOrders->load(Yii::$app->request->post()) ) {
                //print_r(Yii::$app->request->post());
                //exit();
                $modelOrders->coupon=$_POST['Orders']['coupon'];
                if($modelOrders->coupon!='' || $modelOrders->coupon!=NULL)
                    {
                        //echo "hello";
                        $couponCode=$modelOrders->coupon;
                        $modelCouponQuery= Coupon::find()->where(['CouponCode'=>$couponCode,'CouponStatus'=>'1']);
                        $objCoupon=$modelCouponQuery->one();
                        //print_r($objCoupon);
                 if(is_object($objCoupon))
                    {
                     
                        $discountPercent=$objCoupon->getAttribute('Discount');
                        
                      }
                    }
                    
                    //exit();
                if($modelOrders->validate()) {
                Yii::$app->session['delivery_details']= $modelOrders;
                if($discountPercent!=0)
                {
                    //echo "hello";
                    $subtotal=\Yii::$app->cart->getCost();
                    $discount=round($subtotal*$objCoupon->Discount/100,2);
                    //echo $discount;
                    $total=$subtotal-$discount;
                    $modelOrders->subtotal= $subtotal;
                    $modelOrders->total= $total;
                    $modelOrders->discount=$discount;
                }
                else
                {
                    $total= \Yii::$app->cart->getCost();
                    $modelOrders->total= $total;
                    $modelOrders->discount=$discount;
                    $modelOrders->subtotal=$total;
                }
                $itemCount= \Yii::$app->cart->getCount();
                $modelOrders->isCreateAccount=$_POST['Orders']['isCreateAccount'];
                
                $modelOrders->fkuser_id=0;
                $varuserID='';
                $order='';
//exit();
                   if ($modelOrders->save()) {

                       if($modelOrders->isCreateAccount==1)
                       {
                           //$modelUser = new SignupForm();
                           $modelUser = new User();
                           $modelUser->email = $modelOrders->email;
                           $modelUser->confirm_email = $modelOrders->email;
                           $modelUser->first_name = $modelOrders->billing_firstname;
                           $modelUser->last_name = $modelOrders->billing_firstname;
                           $modelUser->setPassword($modelOrders->password);
                           $modelUser->generateAuthKey();
                           $modelUser->verifyemail = 1;
                           $modelUser->status = 1;
                           $modelUser->created_at =  date('Y-m-d H:i:s');
                           $modelUser->updated_at =  date('Y-m-d H:i:s');
                           $modelUser->save();
                           $varuserID=$modelUser->id;
                       }
                       if($varuserID!='')
                       {

                           $order = Orders::findOne($modelOrders->order_id);
                          $order->scenario = 'createWithGuest';
                           $order->fkuser_id=$varuserID;
                           $order->save(false);
                           //print_r($order->getFirstErrors());
                       }
                        if($itemCount>0) {
                      foreach(\Yii::$app->cart->getPositions() as $positions)
                       {  
                         $modelOrderDetails= new  OrderDetails();
                          //$modelOrderDetails->orderSubID=$modelOrders->order_id.'-'.;
                          $modelOrderDetails->fkorder_id=$modelOrders->order_id;
                          if($varuserID!='')
                          $modelOrderDetails->fkuser_id=$varuserID;
                          $modelOrderDetails->fkproduct_id=$positions->id;
                          $modelOrderDetails->productName=$positions->product_name;
                          $modelOrderDetails->quantity=$positions->getQuantity();
                          if($positions->discount>0)
                          {
                              // I have replaced the price with discounted price in the cart so I added discount here
                             $modelOrderDetails->subTotal=$positions->getQuantity()*($positions['price']+$positions->discount); 
                             $modelOrderDetails->discount=$positions->discount*$positions->getQuantity();
                             $modelOrderDetails->grandTotal=$modelOrderDetails->subTotal-$modelOrderDetails->discount;
                             //echo "quantity".$positions->getQuantity();
                             //echo "price:".$positions['price'];
                             //echo "subtotal:".$modelOrderDetails->subTotal;
                             //echo "discount:".$modelOrderDetails->discount;
                             //exit();
                             //echo 
                          }
                        else {
                          $modelOrderDetails->subTotal=$positions->getQuantity()*$positions['price'];
                          $modelOrderDetails->discount=$positions->discount*$positions->getQuantity();
                          $modelOrderDetails->grandTotal=$modelOrderDetails->subTotal-$modelOrderDetails->discount;
                        }
                          if($modelOrderDetails->save())
                          {
                               $modelOrderDetailsNew = OrderDetails::findOne($modelOrderDetails->id);
                               $modelOrderDetailsNew->orderSubID = $modelOrders->order_id.'-'.$modelOrderDetails->id;
                               $modelOrderDetailsNew->save();
                          }

                       }
                  }
                     return $this->redirect(\Yii::$app->urlManager->createUrl("product/payment"));

                        }
            }

                   }



 
           return $this->render('checkout', [
                   'model' => $modelOrders,'modelCoupon'=>$modelCoupon,'personalInformation'=>$modelPersonalInformation,
               ]);
     }
     else
     {
         return $this->redirect(Yii::$app->urlManager->createUrl("product/index"), true);
     }
 }
 public function actionPayment()
 {
    return $this->render('payment');
 }
 public function actionDetails()
 {
     $id=$_GET['id'];
        $modelProduct= new \app\models\Product;
        $modelProductColor= new productColor;
        $modelProductProperty= new ProductAttributeProperty;
        $modelAttribute= new Attribute;
        $modelAttributeOptions= new AttributeOptions;         
        $varProduct=$modelProduct->findOne(['id'=> $id]);
        $varProduct->quantity=1;
        $varProductProperty=$modelProductProperty->findAll(['fkproductID'=> $id]);
        $varProductColor=$modelProductColor->findAll(['fkproductID'=> $id]);
         //print_r($varProductColor);
         //$varNumRecord=$varProductColor->count();
         $varNumRecordProperty=count($varProductProperty);
          $i=0;
         if($varNumRecordProperty>0)
         {
             //$i=0;
            // $i=0;
             foreach($varProductProperty as $property)
             {
                 
                 if($property->fkOptionID!=0)
                 {
                 $objAttributeOptions=$modelAttributeOptions->findAll(['optionID'=>$property->fkOptionID]);
                 foreach($objAttributeOptions as $options)
                    {
                     $objAttribute=$modelAttribute->findAttributeByID($options->fkAttributeID);
                //print_r($objAttribute);
                foreach($objAttribute as $attribute)
                {
                    if($attribute->isAttribute==1)
                    {
                        //echo $attribute->comment;
                       // echo $attribute->AttributeLabel;
                        
                        
                    }
                }
                       // echo $options->optionValue;
                        if($options->optionValue)
                        {
                            //echo 'YES';
                        }
                      //  else
                           // echo 'NO';
                 }
                  $varProductProperty[$i]['comment']=$attribute->comment;
                    $varProductProperty[$i]['label']=$attribute->AttributeLabel;
                     $varProductProperty[$i]['optionvalue']=$options->optionValue;
                     $varProductProperty[$i]['optionlabel']=$options->optionLabel;
                     $varProductProperty[$i]['isattribute']=$attribute->isAttribute;
                     $varProductProperty[$i]['AttributeInputType']=$attribute->AttributeInputType;
                 }
                 else {
                     
                     //echo $property->content;
                     $objAttribute=$modelAttribute->findAttributeByID($property->fkAttributeID);
                
                foreach($objAttribute as $attribute)
                {
                    if($attribute->isAttribute==0)
                    {
                        //echo $attribute->comment;
                       // echo $attribute->AttributeLabel;
                        
                        
                    }
                    $varProductProperty[$i]['comment']=$attribute->comment;
                    $varProductProperty[$i]['label']=$attribute->AttributeLabel;
                    $varProductProperty[$i]['optionvalue']=null;
                }
                     
                 }
                //echo $property->fkAttributeID;
                $i++;
               
                //echo "</br>";
             }
              //print_r($varProductProperty);
         }
        $varNumRecord=count($varProductColor);
        //echo $varNumRecord;
        // exit();
        //$varProduct=$modelProduct->find('id=id','id=>$id');
       return $this->render('details', ['modelProduct'=> $varProduct,'modelProductColor'=> $varProductColor,'numRows'=>$varNumRecord,'numRowProperty'=>$varNumRecordProperty,'modelProductProperty'=> $varProductProperty]);
 }
 public function actionTemp()
 {
     //$settingModel=  Settings::findOne(1);
     //echo $settingModel->settingGstCharge;
    return $this->render('getsstform');
 }
 public function actionGetresponse()
 {
     //$settingModel=  Settings::findOne(1);
     //echo $settingModel->settingGstCharge;
    return $this->render('getsstform');
 }
 public function actionGetresponseback()
 {
     //$settingModel=  Settings::findOne(1);
     //echo $settingModel->settingGstCharge;
    return $this->render('getsstform');
 }
}
