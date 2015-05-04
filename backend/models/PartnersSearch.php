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

        //$query = Partners::find()->joinWith(['channel'], true, 'LEFT JOIN');
        // Filter only new listing partners

        $query->andFilterWhere(['like', 'partnerStatus', '0']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->pagination->pageSize=Yii::$app->session->get('pagging');

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        /*echo '<pre>';
        print_r($params); die();*/
        /*if($params['PartnersSearch']['channelName']!='')
            {
                
                $query->andFilterWhere(['like', 'channel.channelName', $params['PartnersSearch']['channelName']]);
            }*/

        $query->andFilterWhere([
            'pkPartnerID' => $this->pkPartnerID,
            'partnerMobile' => $this->partnerMobile,
            'partnerDateOfBirth' => $this->partnerDateOfBirth,
            'fkCityID' => $this->fkCityID,
            'fkCountryID' => $this->fkCountryID,
            'fkBankID' => $this->fkBankID,
            'partnerBankAccNo' => $this->partnerBankAccNo,
            'partnerAddedDate' => $this->partnerAddedDate,
            'partnerUpdateDate' => $this->partnerUpdateDate,
        ]);


        $query->andFilterWhere(['like', 'partnerEmail', $this->partnerEmail])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'partnerFirstName', $this->partnerFirstName])
            ->andFilterWhere(['like', 'partnerLastName', $this->partnerLastName])
            ->andFilterWhere(['like', 'partnershipLevel', $this->partnershipLevel])
            ->andFilterWhere(['like', 'partnerFirstLogin', $this->partnerFirstLogin])
            ->andFilterWhere(['like', 'partnerProfilePicture', $this->partnerProfilePicture])
            ->andFilterWhere(['like', 'partnerKnowHow', $this->partnerKnowHow])
            //->andFilterWhere(['like', 'partnerStatus', '0'])
            ->andFilterWhere(['like', 'partnerContractSigned', $this->partnerContractSigned])
            ->andFilterWhere(['like', 'partnerNameInBank', $this->partnerNameInBank])
            ->andFilterWhere(['like', 'partnerSubscribeNewsletter', $this->partnerSubscribeNewsletter]);

        return $dataProvider;
    }
}
