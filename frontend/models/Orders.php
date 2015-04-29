<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $order_id
 * @property integer $fkuser_id
 * @property string $billing_firstname
 * @property string $billing_lastname
 * @property string $email
 * @property string $shipping_address1
 * @property string $shipping_address2
 * @property string $shipping_suburb
 * @property string $shipping_city
 * @property string $shipping_postcode
 * @property string $contactno
 * @property string $ordering_date
 * @property string $ordering_done
 * @property string $ordering_confirmed
 * @property string $payment_method
 * @property integer $fkship_id
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $isCreateAccount;
    public $password;
    public $confirm_password;
    public $accept_term;
    public $coupon;
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['billing_firstname', 'billing_lastname' ,'shipping_address1', 'shipping_suburb', 'shipping_city', 'shipping_postcode','contactno','accept_term'], 'required','on'=>'createWithGuest'],
            [['billing_firstname', 'billing_lastname' ,'shipping_address1', 'shipping_suburb', 'shipping_city', 'shipping_postcode','contactno','accept_term'], 'required','on'=>'createWithUser'],
            [['password'], 'required','on'=>'createWithUser'],
            [[ 'shipping_postcode','contactno'], 'integer'],
            [['billing_firstname','billing_lastname'], 'match', 'pattern'=>'/[a-zA-Z]+$/s', 'message' => 'Must contains only letters.'],
           [['confirm_password'], 'compare', 'compareAttribute' => 'password', 'message' => 'Password and Confirm password don\'t match.'],
           [['password'], 'match', 'pattern'=>'((?=.*\d)(?=.*[A-Z])(?=.).{8,20})', 'message' => 'Password must contain at least one upper case and one numeric character.'],
            ['email', 'filter', 'filter' => 'trim'],
           ['email', 'required'],
           ['email', 'email'],
          ['email', 'unique', 'targetClass' => 'common\models\User', 'message' => 'This email address is already taken.','on'=>'createWithUser'],
            ['shipping_postcode','string','min'=>6,'message' => 'atleast 6 characters'],
            ['contactno','string','min'=>10,'max'=>15,'message' => 'characters between 10 to 15'],
            [['ordering_date'], 'safe'],
              [[ 'contactno'], 'string', 'max' => 15],
           ['accept_term', 'compare', 'compareValue' => true, 'message' => 'You must agree to the Bluesky terms'], 
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'fkuser_id' => 'Fkuser ID',
            'billing_firstname' => 'First Name',
            'billing_lastname' => 'Last Name',
            'email' => 'Email',
            'shipping_address1' => 'Address',
            'shipping_address2' => 'Address(Optional)',
            'shipping_suburb' => 'Suburbs',
            'shipping_city' => 'City',
            'shipping_postcode' => 'Postal Code',
            'contactno' => 'Contact Number',
            'ordering_date' => 'Ordering Date',
            'ordering_done' => 'Ordering Done',
            'ordering_confirmed' => 'Ordering Confirmed',
            'payment_method' => 'Payment Method',
            'fkship_id' => 'Fkship ID',
            'isCreateAccount'=>'Create an account',
            'accept_term'=>'I have read and accept Bluesky terms',
        ];
    }
}
