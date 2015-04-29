<?php

namespace frontend\controllers;
use Yii;
use app\models\Product;
use app\models\productColor;
use app\models\ProductAttributeProperty;
use app\models\AttributeOptions;
use app\models\Attribute;
use app\models\Orders;
use app\models\OrderDetails;

//use app\omnilight\shoppingcart\CartPositionInterface;

class ComboController extends \yii\web\Controller 
{
    
    /*public function actionIndex($argCategoryName='',$argProductName='')
    {
        echo $argCategoryName;
        echo $argProductName;
        exit();
        $modelCombo= new \app\models\Combo;
        $varProduct=$modelCombo->find()->all();
        $varCategory=null;
        return $this->render('index', ['modelProduct'=> $varProduct,'modelCategory'=>$varCategory]);
       }*/
    
    public function actionIndex()
    {
        $modelCombo= new \app\models\Combo;
        $category='Combos';
        if(isset($_GET['categoryid']) && $_GET['categoryid']!=NULL && $_GET['categoryid']!='')
        {
            $cat=$_GET['categoryid'];
            if($cat=='weekly-combo')
            {
                $varProduct=$modelCombo->findAll(['ComboStatus'=> '1','fkCategoryID'=>2]);
                $category='Weekly Combos';
            }
            else
            {
                  $varProduct=$modelCombo->findAll(['ComboStatus'=> '1','fkCategoryID'=>1]);
                  $category='Monthly Combos';
            }
        }
        else
          $varProduct=$modelCombo->findAll(['ComboStatus'=> '1']);
        $varCategory=null;
        return $this->render('index', ['modelProduct'=> $varProduct,'categoryName'=>$category]);
       }
    public function actionDetails()
    {
        //echo "hello";
        $id=$_GET['id'];
        $modelProduct= new \app\models\Combo;
        $varProduct=$modelProduct->findOne(['pkComboID'=> $id]);
        return $this->render('details', ['modelProduct'=> $varProduct]);

    }
    
    
}