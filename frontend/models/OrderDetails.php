<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_details".
 *
 * @property integer $id
 * @property string $orderSubID
 * @property integer $fkorder_id
 * @property integer $fkuser_id
 * @property integer $fkproduct_id
 * @property string $productName
 * @property integer $fkcombo_id
 * @property double $amount
 * @property integer $quantity
 * @property double $subTotal
 * @property double $discount
 * @property double $grandTotal
 */
class OrderDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'fkorder_id', 'fkproduct_id', 'productName', 'quantity', 'subTotal', 'discount', 'grandTotal'], 'required'],
            [['fkorder_id', 'fkuser_id', 'fkproduct_id', 'fkcombo_id', 'quantity'], 'integer'],
            [['amount', 'subTotal', 'discount', 'grandTotal'], 'number'],
            [['orderSubID'], 'string', 'max' => 50],
            [['productName'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orderSubID' => 'Order Sub ID',
            'fkorder_id' => 'Fkorder ID',
            'fkuser_id' => 'Fkuser ID',
            'fkproduct_id' => 'Fkproduct ID',
            'productName' => 'Product Name',
            'fkcombo_id' => 'Fkcombo ID',
            'amount' => 'Amount',
            'quantity' => 'Quantity',
            'subTotal' => 'Sub Total',
            'discount' => 'Discount',
            'grandTotal' => 'Grand Total',
        ];
    }
}
