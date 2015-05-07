<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Partners;
use common\models\channel;

/**
 * PartnersSearch represents the model behind the search form about `common\models\Partners`.
 */
class PartnersSearch extends Partners
{
    /**
     * @inheritdoc
     */
    public $channelName;
    public $startDate;
    public $endDate;

    public function rules()
    {
        return [
            [['pkPartnerID', 'partnerMobile', 'fkCityID', 'fkCountryID', 'fkBankID', 'partnerBankAccNo'], 'integer'],
            [['partnerEmail', 'auth_key', 'password_hash', 'password_reset_token', 'partnerFirstName', 'partnerLastName', 'partnershipLevel', 'partnerDateOfBirth', 'partnerFirstLogin', 'partnerProfilePicture', 'partnerKnowHow', 'partnerStatus', 'partnerContractSigned', 'partnerNameInBank', 'partnerSubscribeNewsletter', 'partnerAddedDate', 'partnerUpdateDate'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */

    /*public function getChannel()
    {
        return $this->hasOne(Channel::className(), ['fkPartnerID' => 'pkPartnerID']);
    }*/
    public function search($params)
    {
        
        $query = Partners::find();

        // Filter except new listing partners

        $query->andFilterWhere(['not like', 'partnerStatus', '0']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->pagination->pageSize=Yii::$app->session->get('pagging');

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        if(!empty($params['PartnersSearch']['startDate'] && $params['PartnersSearch']['endDate']))
        {
            $sDate = date('Y-m-d', strtotime($params['PartnersSearch']['startDate']));
            $eDate = date('Y-m-d', strtotime($params['PartnersSearch']['endDate']));
            $query->andFilterWhere(['between', 'partnerAddedDate', $sDate, $eDate]);
        }

        if(!empty($params['PartnersSearch']['partnerEmail']))
        {
            $query->andFilterWhere(['like', 'partnerEmail', $this->partnerEmail]);
        }
        
        if(!empty($params['PartnersSearch']['partnerFirstName']))
        {
            $query->andFilterWhere(['like', 'partnerFirstName', $this->partnerFirstName]);
        }

        if($params['PartnersSearch']['partnerStatus'] != 'prompt')
        {
            $query->andFilterWhere(['like', 'partnerStatus', $this->partnerStatus]);
        }

       /* $query->andFilterWhere([
            'pkPartnerID' => $this->pkPartnerID,
            'partnerMobile' => $this->partnerMobile,
            'partnerDateOfBirth' => $this->partnerDateOfBirth,
            'fkCityID' => $this->fkCityID,
            'fkCountryID' => $this->fkCountryID,
            'fkBankID' => $this->fkBankID,
            'partnerBankAccNo' => $this->partnerBankAccNo,
            'partnerAddedDate' => $this->partnerAddedDate,
            'partnerUpdateDate' => $this->partnerUpdateDate,
        ]);*/


        /*$query->andFilterWhere(['like', 'partnerEmail', $this->partnerEmail])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'partnerFirstName', $this->partnerFirstName])
            ->andFilterWhere(['like', 'partnerLastName', $this->partnerLastName])
            ->andFilterWhere(['like', 'partnershipLevel', $this->partnershipLevel])
            ->andFilterWhere(['like', 'partnerFirstLogin', $this->partnerFirstLogin])
            ->andFilterWhere(['like', 'partnerProfilePicture', $this->partnerProfilePicture])
            ->andFilterWhere(['like', 'partnerKnowHow', $this->partnerKnowHow])
            ->andFilterWhere(['like', 'partnerStatus', $this->partnerStatus])
            ->andFilterWhere(['like', 'partnerContractSigned', $this->partnerContractSigned])
            ->andFilterWhere(['like', 'partnerNameInBank', $this->partnerNameInBank])
            ->andFilterWhere(['like', 'partnerAddedDate', $this->partnerAddedDate])
            ->andFilterWhere(['like', 'partnerSubscribeNewsletter', $this->partnerSubscribeNewsletter]);*/

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        return $dataProvider;
    }
}
