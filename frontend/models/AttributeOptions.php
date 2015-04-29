<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attribute_options".
 *
 * @property integer $optionID
 * @property integer $fkAttributeID
 * @property string $optionLabel
 * @property string $optionValue
 */
class AttributeOptions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attribute_options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkAttributeID', 'optionLabel', 'optionValue'], 'required'],
            [['fkAttributeID'], 'integer'],
            [['optionLabel'], 'string', 'max' => 100],
            [['optionValue'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'optionID' => 'Option ID',
            'fkAttributeID' => 'Fk Attribute ID',
            'optionLabel' => 'Option Label',
            'optionValue' => 'Option Value',
        ];
    }
    
    public function findOptionsByAttributeID($id)
        {
           return $this->findAll(['fkAttributeID'=>$id]);
            
        }
}
