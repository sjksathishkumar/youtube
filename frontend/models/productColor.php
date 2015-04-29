<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_color_property".
 *
 * @property integer $id
 * @property string $color
 * @property integer $fkProductID
 */
class productColor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_color_property';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['color', 'fkProductID'], 'required'],
            [['fkProductID'], 'integer'],
            [['color'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'color' => 'Color',
            'fkProductID' => 'Fk Product ID',
        ];
    }
}
