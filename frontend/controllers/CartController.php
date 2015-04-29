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

class CartController extends \yii\web\Controller 
{
      public function actionAddtocart()
        {
                    $settingModel=  Settings::findOne(1);
                    $varGstCharge=$settingModel->settingGstCharge;
                    $session = new Session;
                    $session->open();
                    $session['gstcharge'] = $varGstCharge; 
                    $arrResult['error']=false;
                    $varQuantity=$_POST['Product']['quantity'];
                     if($varQuantity>0)
                       {
                               $id=$_POST['Product']['id'];
                               $model = Product::findOne($id);
                               if($model->getAttribute('stock') > $varQuantity)
                                {
                                       if($model->getAttribute('discount_price')>0)
                                       {
                                           $model->price=$model->discount_price;
                                       }
                                       if ($model) {
                                               if (array_key_exists("color",$_POST['Product']))
                                                   {
                                                       $model->setColor($_POST['Product']['color']);
                                                   }
                                               \Yii::$app->cart->put($model, $varQuantity);
                                       }
                                       $arrResult['count']=\Yii::$app->cart->count;
                                       $arrResult['gstCharge']=$varGstCharge;
                                       $arrResult['cost']=\Yii::$app->cart->getCost();
                                       $arrResult['products']=array();
                                       $i=0;
                                       foreach(\Yii::$app->cart->getPositions() as $positions)
                                           {
                                               $arrResult['products'][]=$positions->attributes;
                                               $i++;
                                           }
                                     foreach(\Yii::$app->cart->getPositions() as $positions)
                                       {
                                           $arrResult['quantity'][$positions->product_name]=$positions->getQuantity();
                                       }
                             }
                else {
                       $arrResult['error']=true;
                       $arrResult['errorMessage']='Stock is insufficient';

                }
                       }
                   else
                   {
                       if($varQuantity=='' || $varQuantity=='')
                        {
                           $arrResult['errorMessage']='Please enter quantity';
                        }
                    else { 
                            $arrResult['errorMessage']='Invalid quantity';
                        }
                       $arrResult['error']=true;
                      
                   }
                   echo json_encode($arrResult);
                   
}
 public function actionRemovefromcart() {
     //print_r($_POST);
      $id=$_POST['id'];
      $model = Product::findOne($id);
      $settingModel=  Settings::findOne(1);
    $varGstCharge=$settingModel->settingGstCharge;
      
    if ($model) {
     \Yii::$app->cart->remove($model);
    }
    $arrResult['gstCharge']=$varGstCharge;
     $arrResult['count']=\Yii::$app->cart->count;
    $arrResult['cost']=\Yii::$app->cart->getCost();
    $arrResult['products']=array();
    $i=0;
    foreach(\Yii::$app->cart->getPositions() as $positions)
  {
       
    $arrResult['products'][]=$positions->attributes;
    $i++;
     //$positions->
  }
  foreach(\Yii::$app->cart->getPositions() as $positions)
  {
    $arrResult['quantity'][$positions->product_name]=$positions->getQuantity();
  }
    echo json_encode($arrResult);
     
 }
    
}
