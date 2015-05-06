<?php

namespace frontend\models;

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
            [['channelCategoryName', 'channelUsed', 'channelAddedDate', 'channelUpdateDate'], 'required'],
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
            'pkChannelCategoryID' => 'Pk Channel Category ID',
            'channelCategoryName' => 'Channel Category Name',
            'channelUsed' => 'Channel Used',
            'channelAddedDate' => 'Channel Added Date',
            'channelUpdateDate' => 'Channel Update Date',
        ];
    }
}
