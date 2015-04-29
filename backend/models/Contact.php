<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

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
     public function search($params)
    {
        $query = Contact::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'sort'=> ['defaultOrder' => ['pkcontactID'=>SORT_DESC]],
            'pagination' => [
            'pageSize' => Yii::$app->session->get('pagging'),
            
        ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        /*$query->andFilterWhere([
            'id' => $this->id,
            'addDate' => $this->addDate,
            'updateDate' => $this->updateDate,
        ]);

        $query->andFilterWhere(['like', 'question', $this->question])
            ->andFilterWhere(['like', 'answer', $this->answer])
            ->andFilterWhere(['like', 'status', $this->status]);*/

        return $dataProvider;
    }
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$this->contactEmail => $this->contactName])
            ->setSubject($this->contactSubject)
            ->setTextBody($this->contactBody)
            ->send();
    }
}
