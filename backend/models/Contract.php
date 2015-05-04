<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "contract".
 *
 * @property integer $pkContractID
 * @property string $contractName
 * @property string $contractContent
 * @property string $contractAddDate
 * @property string $contractUpdateDate
 */
class Contract extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return CONTRACT_TEMPLATE;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contractName', 'contractContent', 'contractAddDate', 'contractUpdateDate'], 'required'],
            [['contractContent'], 'string'],
            [['contractAddDate', 'contractUpdateDate'], 'safe'],
            [['contractName'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkContractID' => 'Pk Contract ID',
            'contractName' => 'Contract Name',
            'contractContent' => 'Contract Content',
            'contractAddDate' => 'Contract Add Date',
            'contractUpdateDate' => 'Contract Update Date',
        ];
    }
}
