<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bank".
 *
 * @property integer $pkBankID
 * @property string $bankName
 * @property string $bankAdded
 * @property string $bankUpdate
 */
class Bank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bankName'], 'required'],//, 'bankAdded', 'bankUpdate'
            [['bankName','bankName'], 'match', 'pattern'=>'/[a-zA-Z]+$/s', 'message' => 'Bank name must contains only letters.'],
            ['bankName', 'filter', 'filter' => 'trim'],
            [['bankAdded', 'bankUpdate'], 'safe'],
            [['bankName'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkBankID' => 'Bank ID',
            'bankName' => 'Bank name',
            'bankAdded' => 'Bank Added Date',
            'bankUpdate' => 'Bank Update Date',
        ];
    }
}
