<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "channel_category".
 *
 * @property integer $pkChannelCategoryID
 * @property string $channelCategoryName
 * @property string $channelUsed
 * @property string $channelAddedDate
 * @property string $channelUpdateDate
 */
class ChannelCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'channel_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['channelCategoryName'], 'required'],
            [['channelCategoryName','channelCategoryName'], 'match', 'pattern'=>'/[a-zA-Z]+$/s', 'message' => 'Bank name must contains only letters.'],
            ['channelCategoryName', 'filter', 'filter' => 'trim'],            
            [['channelUsed'], 'string'],
            [['channelAddedDate', 'channelUpdateDate'], 'safe'],
            [['channelCategoryName'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkChannelCategoryID' => 'Channel Category ID',
            'channelCategoryName' => 'Channel Category Name',
            'channelUsed' => 'Channel Used',
            'channelAddedDate' => 'Channel Added Date',
            'channelUpdateDate' => 'Channel Update Date',
        ];
    }
}
