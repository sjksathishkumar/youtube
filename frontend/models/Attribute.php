<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attribute".
 *
 * @property integer $pkAttributeID
 * @property string $AttributeCode
 * @property string $AttributeLabel
 * @property integer $AttributeOrdering
 * @property string $AttributeVisible
 * @property string $AttributeSearchable
 * @property string $AttributeComparable
 * @property string $AttributeInputType
 * @property string $AttributeValidation
 * @property string $AttributeDateAdded
 * @property integer $fkcategoryID
 */
class Attribute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attribute';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AttributeCode', 'AttributeLabel', 'AttributeOrdering', 'AttributeInputType', 'AttributeValidation', 'fkcategoryID'], 'required'],
            [['AttributeOrdering', 'fkcategoryID'], 'integer'],
            [['AttributeVisible', 'AttributeSearchable', 'AttributeComparable'], 'string'],
            [['AttributeDateAdded'], 'safe'],
            [['AttributeCode', 'AttributeLabel', 'AttributeInputType', 'AttributeValidation'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkAttributeID' => 'Pk Attribute ID',
            'AttributeCode' => 'Attribute Code',
            'AttributeLabel' => 'Attribute Label',
            'AttributeOrdering' => 'Attribute Ordering',
            'AttributeVisible' => 'Attribute Visible',
            'AttributeSearchable' => 'Attribute Searchable',
            'AttributeComparable' => 'Attribute Comparable',
            'AttributeInputType' => 'Attribute Input Type',
            'AttributeValidation' => 'Attribute Validation',
            'AttributeDateAdded' => 'Attribute Date Added',
            'fkcategoryID' => 'Fkcategory ID',
        ];
    }
    public function findAttributeByID($id)
        {
           return $this->findAll(['pkAttributeID'=>$id]);
            
        }
}
