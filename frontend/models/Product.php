<?php //

namespace app\models;

use Yii;
use app\models\Category;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $fkattribute_id
 * @property integer $fkcategory_id
 * @property string $product_name
 * @property string $ref_code
 * @property double $price
 * @property double $discount_price
 * @property integer $stock
 * @property integer $alert_quentity
 * @property string $details
 * @property string $terms
 * @property string $more_details
 * @property string $meta_title
 * @property string $meta_description
 * @property integer $meta_keywords
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
/*class Product extends \yii\db\ActiveRecord  implements CartPositionProviderInterface
{
    
   
    public static function tableName()
    {
        return 'product';
    }

    
    public function rules()
    {
        return [
            [['fkattribute_id', 'fkcategory_id', 'product_name', 'ref_code', 'price', 'discount_price', 'stock', 'alert_quentity', 'details', 'terms', 'more_details', 'meta_title', 'meta_description', 'meta_keywords', 'status', 'created_at', 'updated_at'], 'required'],
            [['fkattribute_id', 'fkcategory_id', 'stock', 'alert_quentity', 'meta_keywords'], 'integer'],
            [['price', 'discount_price'], 'number'],
            [['details', 'terms', 'more_details', 'meta_title', 'meta_description', 'status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['product_name'], 'string', 'max' => 255],
            [['ref_code'], 'string', 'max' => 100]
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'id' => 'Product ID',
            'fkattribute_id' => 'Fkattribute ID',
            'fkcategory_id' => 'Fkcategory ID',
            'product_name' => 'Product Name',
            'ref_code' => 'Ref Code',
            'price' => 'Price',
            'discount_price' => 'Discount Price',
            'stock' => 'Stock',
            'alert_quentity' => 'Alert Quentity',
            'details' => 'Details',
            'terms' => 'Terms',
            'more_details' => 'More Details',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}*/



/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $fkattribute_id
 * @property integer $fkcategory_id
 * @property string $product_name
 * @property string $ref_code
 * @property double $price
 * @property double $discount_price
 * @property integer $stock
 * @property integer $alert_quentity
 * @property string $details
 * @property string $terms
 * @property string $more_details
 * @property string $meta_title
 * @property string $meta_description
 * @property integer $meta_keywords
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Product extends \yii\db\ActiveRecord  implements \yz\shoppingcart\CartPositionInterface
{
    
    public $quantity;
    public $color;
    
    /**
     * @inheritdoc
     */
    public function getCartPosition()
    {
        return \Yii::createObject([
            'class' => 'app\models\ProductCartPosition',
            'id' => $this->id,
        ]);
    }
    use \yz\shoppingcart\CartPositionTrait;

    public function getPrice()
    {
        return $this->price;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getColor()
    {
        return $this->color;
    }
    public function setColor($color)
    {
        $this->color=$color;
    }
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['fkattribute_id', 'fkcategory_id', 'product_name', 'ref_code', 'price', 'discount_price', 'stock', 'alert_quentity', 'details', 'terms', 'more_details', 'meta_title', 'meta_description', 'meta_keywords', 'status', 'created_at', 'updated_at','quantity'], 'required'],
            [['fkattribute_id', 'fkcategory_id', 'stock', 'alert_quentity', 'meta_keywords'], 'integer'],
            //[['quantity'],'integer','min'=>1],
            [['price', 'discount_price'], 'number'],
            [['details', 'terms', 'more_details', 'meta_title', 'meta_description', 'status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['product_name'], 'string', 'max' => 255],
            [['ref_code'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Product ID',
            'fkattribute_id' => 'Fkattribute ID',
            'fkcategory_id' => 'Fkcategory ID',
            'product_name' => 'Product Name',
            'ref_code' => 'Ref Code',
            'price' => 'Price',
            'discount_price' => 'Discount Price',
            'stock' => 'Stock',
            'alert_quentity' => 'Alert Quentity',
            'details' => 'Details',
            'terms' => 'Terms',
            'more_details' => 'More Details',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'fkcategory_id']);
        }
}

