<?php

namespace frontend\models;
use common\models\User;
use yii\base\Model;
use Yii;

/**
 * This is the model class for table "partner_details".
 *
 * @property integer $pkPartnerID
 * @property string $partnerEmail
 * @property string $partnerFirstName
 * @property string $partnerLastName
 * @property integer $fkChannelID
 * @property string $partnershipLevel
 * @property integer $partnerMobile
 * @property string $partnerDateOfBirth
 * @property integer $partnerCity
 * @property integer $partnerCountry
 * @property string $partnerProfilePicture
 * @property string $howPartnerKnow
 * @property string $partnerStatus
 * @property string $partnerBankName
 * @property string $partnerNameInBank
 * @property integer $partnerBankAccNo
 * @property string $partnerAddedDate
 * @property string $partnerUpdateDate
 *
 * @property Channel[] $channels
 * @property Channel $fkChannel
 * @property PartnerLogin[] $partnerLogins
 */
class partner extends \yii\db\ActiveRecord
{
    public $channelCategory;
    public $accept_agreement;
    public $accept_term;
    public $partnerConfirmEmail;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partners';
    }

    /**
     * @inheritdoc
     */
   /**  public function rules()
    {
        return [
            [['partnerEmail', 'partnerFirstName', 'partnerLastName', 'fkChannelID', 'partnerMobile', 'partnerDateOfBirth', 'partnerCity', 'partnerCountry', 'partnerProfilePicture', 'partnerBankName', 'partnerNameInBank', 'partnerBankAccNo', 'partnerAddedDate'], 'required'],
            [['fkChannelID', 'partnerMobile', 'partnerCity', 'partnerCountry', 'partnerBankAccNo'], 'integer'],
            [['partnershipLevel', 'howPartnerKnow', 'partnerStatus'], 'string'],
            [['partnerDateOfBirth', 'partnerAddedDate', 'partnerUpdateDate'], 'safe'],
            [['partnerEmail', 'partnerFirstName', 'partnerLastName'], 'string', 'max' => 150],
            [['partnerProfilePicture', 'partnerBankName', 'partnerNameInBank'], 'string', 'max' => 250],
            [['fkChannelID'], 'unique']
        ];
    }**/
    
    public function rules()
    {
        return [
            [['partnerEmail', 'partnerFirstName', 'partnerLastName', 'partnerDateOfBirth','partnerKnowHow','channelCategory','accept_term','partnerConfirmEmail'], 'required'],
            [['partnerFirstName','partnerLastName'], 'match', 'pattern'=>'/[a-zA-Z]+$/s', 'message' => 'Must contains only letters.'],
            ['partnerEmail', 'filter', 'filter' => 'trim'],
            ['partnerEmail', 'required'],
            ['partnerEmail', 'email'],
           // [['fkChannelID', 'partnerMobile', 'partnerCity', 'partnerCountry', 'partnerBankAccNo'], 'integer'],
           // [['partnershipLevel', 'howPartnerKnow', 'partnerStatus'], 'string'],
            [['partnerDateOfBirth', 'partnerAddedDate', 'partnerUpdateDate'], 'safe'],
            [['partnerEmail', 'partnerFirstName', 'partnerLastName'], 'string', 'max' => 150],
            //[['partnerProfilePicture', 'partnerBankName', 'partnerNameInBank'], 'string', 'max' => 250],
           // [['fkChannelID'], 'unique']
            ['accept_term', 'compare', 'compareValue' => true, 'message' => 'You must agree to the Uturn terms'], 
            [['partnerConfirmEmail'], 'compare', 'compareAttribute' => 'partnerEmail', 'message' => 'Email and Confirm Email don\'t match.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkPartnerID' => 'Pk Partner ID',
            'partnerEmail' => 'Email',
            'partnerFirstName' => 'First Name',
            'partnerLastName' => 'Last Name',
            //'fkChannelID' => 'Fk Channel ID',
            //'partnershipLevel' => 'Partnership Level',
            //'partnerMobile' => 'Partner Mobile',
            'partnerDateOfBirth' => 'Date of Birth',
            //'partnerCity' => 'Partner City',
           // 'partnerCountry' => 'Partner Country',
           // 'partnerProfilePicture' => 'Partner Profile Picture',
            'partnerKnowHow' => 'How did you Hear about us?',
            //'partnerStatus' => 'Partner Status',
            //'partnerBankName' => 'Partner Bank Name',
           // 'partnerNameInBank' => 'Partner Name In Bank',
           // 'partnerBankAccNo' => 'Partner Bank Acc No',
           // 'partnerAddedDate' => 'Partner Added Date',
           // 'partnerUpdateDate' => 'Partner Update Date',
            //'accept_term' => '',
            'partnerConfirmEmail' => 'Confirm Email',
        ];
    }

/**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup($arrSignup)
    {
         //echo '<pre>'; print_r($arrSignup);die;
        //if ($this->validate()) {
            $user = new User();
            $user->partnerEmail = $this->partnerEmail;
            $user->partnerFirstName = $this->partnerFirstName;
            $user->partnerLastName = $this->partnerLastName;
            $user->partnerDateOfBirth =  $this->partnerDateOfBirth; //$arrSignup['year'].'-'.$arrSignup['month'].'-'.$arrSignup['date'];
            $user->partnerAddedDate =  date('Y-m-d H:i:s');
             if($user->save(false)){
            return $user;
        }

        return null;
    }
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChannels()
    {
        return $this->hasMany(Channel::className(), ['fkPartnerID' => 'pkPartnerID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkChannel()
    {
        return $this->hasOne(Channel::className(), ['pkChannelID' => 'fkChannelID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartnerLogins()
    {
        return $this->hasMany(PartnerLogin::className(), ['fkPartnerID' => 'pkPartnerID']);
    }
}
