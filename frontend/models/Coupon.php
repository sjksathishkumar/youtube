<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "Discount".
 *
 * @property integer $id
 * @property string $CouponName
 * @property string $CouponCode
 * @property integer $Discount
 * @property string $StartDate
 * @property string $EndDate
 * @property string $CouponAddedDate
 * @property string $CouponUpdatedDate
 */
class Coupon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Discount';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           //[['CouponName', 'CouponCode', 'Discount', 'StartDate', 'EndDate'], 'required'],
            [['id', 'Discount'], 'integer'],
            [[ 'CouponAddedDate', 'CouponUpdatedDate'], 'safe'],
            [['CouponName', 'CouponCode'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'CouponName' => 'Coupon Name',
            'CouponCode' => 'Coupon Code',
            'Discount' => 'Discount',
            'StartDate' => 'Start Date',
            'EndDate' => 'End Date',
            'CouponAddedDate' => 'Coupon Added Date',
            'CouponUpdatedDate' => 'Coupon Updated Date',
        ];
    }
      public function search($params)
    {   
        $query = Discount::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
            'pageSize' => Yii::$app->session->get('pagging'),
            
    ],
            
        ]);
           if (!($this->load($params) && $this->validate())) {
           return $dataProvider;
            
        }
       
        return $dataProvider;
    }
 
}
