<?php
namespace frontend\models;
//namespace app\models;

use Yii;

/**
 * This is the model class for table "channel".
 *
 * @property integer $pkChannelID
 * @property integer $fkPartnerID
 * @property string $youtubeChannelID
 * @property string $channelName
 * @property integer $fkChannelCategoryID
 * @property string $channelStatus
 * @property string $channelAddDate
 * @property string $channelUpdateDate
 */
class Channel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'channel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkPartnerID', 'youtubeChannelID', 'channelName', 'fkChannelCategoryID', 'channelStatus', 'channelAddDate', 'channelUpdateDate'], 'required'],
            [['fkPartnerID', 'fkChannelCategoryID'], 'integer'],
            [['channelStatus'], 'string'],
            [['channelAddDate', 'channelUpdateDate','fkPartnerID'], 'safe'],
            [['youtubeChannelID', 'channelName'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkChannelID' => 'Pk Channel ID',
            'fkPartnerID' => 'Fk Partner ID',
            'youtubeChannelID' => 'Youtube Channel ID',
            'channelName' => 'Channel Name',
            'fkChannelCategoryID' => 'Fk Channel Category ID',
            'channelStatus' => 'Channel Status',
            'channelAddDate' => 'Channel Add Date',
            'channelUpdateDate' => 'Channel Update Date',
        ];
    }
}
