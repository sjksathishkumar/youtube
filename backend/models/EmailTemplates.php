<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "email_templates".
 *
 * @property integer $pkEmailID
 * @property string $emailTitle
 * @property string $emailFromName
 * @property string $emailFromEmail
 * @property string $emailSubject
 * @property string $emailContent
 * @property string $emailDateAdded
 * @property string $emailDateUpdated
 */
class EmailTemplates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return EMAIL_TEMPLATE;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emailTitle', 'emailFromName', 'emailFromEmail', 'emailSubject', 'emailContent','emailTemplateType', 'emailDateAdded'], 'required'],
            [['emailContent'], 'string'],
            [['inUse', 'emailDateAdded', 'emailDateUpdated'], 'safe'],
            [['emailTitle', 'emailFromName', 'emailSubject'], 'string', 'max' => 225],
            [['emailFromEmail'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkEmailID' => 'Template ID',
            'emailTitle' => 'Title',
            'emailFromName' => 'Sender Name',
            'emailFromEmail' => 'Sender Email',
            'emailSubject' => 'Subject',
            'emailContent' => 'Content',
            'emailTemplateType' => 'Type',
            'emailDateAdded' => 'Date Added',
            'emailDateUpdated' => 'Date Updated',
        ];
    }
}
