<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_attribute_property".
 *
 * @property integer $id
 * @property string $optionValue
 * @property string $optionDescription
 * @property integer $fkProductID
 * @property integer $fkAttributeID
 * @property integer $fkOptionID
 * @property string $content
 */
class ProductAttributeProperty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $label;
    public $comment;
    public $optionvalue;
    public $optionlabel;
    public $isattribute;
    public $AttributeInputType;
    public static function tableName()
    {
        return 'product_attribute_property';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['optionValue', 'optionDescription', 'fkProductID', 'fkAttributeID', 'fkOptionID', 'content'], 'required'],
            [['optionDescription', 'content'], 'string'],
            [['fkProductID', 'fkAttributeID', 'fkOptionID'], 'integer'],
            [['optionValue'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'optionValue' => 'Option Value',
            'optionDescription' => 'Option Description',
            'fkProductID' => 'Fk Product ID',
            'fkAttributeID' => 'Fk Attribute ID',
            'fkOptionID' => 'Fk Option ID',
            'content' => 'Content',
        ];
    }
}
