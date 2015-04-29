<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_attribute".
 *
 * @property integer $id
 * @property integer $fkcategoryID
 * @property integer $fkAttributeID
 */
class categoryAttribute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_attribute';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkcategoryID', 'fkAttributeID'], 'required'],
            [['fkcategoryID', 'fkAttributeID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fkcategoryID' => 'Fkcategory ID',
            'fkAttributeID' => 'Fk Attribute ID',
        ];
    }
}
