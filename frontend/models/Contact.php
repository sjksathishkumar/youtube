<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "contactRequest".
 *
 * @property integer $pkcontactID
 * @property string $contactName
 * @property string $contactEmail
 * @property string $contactSubject
 * @property string $contactBody
 * @property string $contactCreatedDate
 * @property string $contactUpdatedDate
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $verifyCode;
    public static function tableName()
    {
        return 'contactRequest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contactName', 'contactEmail', 'contactSubject', 'contactBody'], 'required'],
            [['contactBody'], 'string'],
            [['contactCreatedDate', 'contactUpdatedDate'], 'safe'],
            [['contactName', 'contactEmail', 'contactSubject'], 'string', 'max' => 255],
            ['verifyCode', 'captcha'],
             ['contactEmail', 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkcontactID' => 'Pkcontact ID',
            'contactName' => 'Name',
            'contactEmail' => 'Email',
            'contactSubject' => 'Subject',
            'contactBody' => 'Question',
            'contactCreatedDate' => 'Contact Created Date',
            'contactUpdatedDate' => 'Contact Updated Date',
        ];
    }
    
     /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param  string  $email the target email address
     * @return boolean whether the email was sent
     */
    public function sendEmail($email)
    {
        return \Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom($this->contactEmail)
            ->setSubject($this->contactSubject)
            ->setTextBody($this->contactBody)
            ->send();
    }
}
