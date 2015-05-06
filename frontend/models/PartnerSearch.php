<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\partner;

/**
 * PartnerSearch represents the model behind the search form about `frontend\models\partner`.
 */
class PartnerSearch extends partner
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pkPartnerID', 'fkChannelID', 'partnerMobile', 'partnerCity', 'partnerCountry', 'partnerBankAccNo'], 'integer'],
            [['partnerEmail', 'partnerFirstName', 'partnerLastName', 'partnershipLevel', 'partnerDateOfBirth', 'partnerProfilePicture', 'howPartnerKnow', 'partnerStatus', 'partnerBankName', 'partnerNameInBank', 'partnerAddedDate', 'partnerUpdateDate'], 'safe'],
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
    public function search($params)
    {
        $query = partner::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'pkPartnerID' => $this->pkPartnerID,
            'fkChannelID' => $this->fkChannelID,
            'partnerMobile' => $this->partnerMobile,
            'partnerDateOfBirth' => $this->partnerDateOfBirth,
            'partnerCity' => $this->partnerCity,
            'partnerCountry' => $this->partnerCountry,
            'partnerBankAccNo' => $this->partnerBankAccNo,
            'partnerAddedDate' => $this->partnerAddedDate,
            'partnerUpdateDate' => $this->partnerUpdateDate,
        ]);

        $query->andFilterWhere(['like', 'partnerEmail', $this->partnerEmail])
            ->andFilterWhere(['like', 'partnerFirstName', $this->partnerFirstName])
            ->andFilterWhere(['like', 'partnerLastName', $this->partnerLastName])
            ->andFilterWhere(['like', 'partnershipLevel', $this->partnershipLevel])
            ->andFilterWhere(['like', 'partnerProfilePicture', $this->partnerProfilePicture])
            ->andFilterWhere(['like', 'howPartnerKnow', $this->howPartnerKnow])
            ->andFilterWhere(['like', 'partnerStatus', $this->partnerStatus])
            ->andFilterWhere(['like', 'partnerBankName', $this->partnerBankName])
            ->andFilterWhere(['like', 'partnerNameInBank', $this->partnerNameInBank]);

        return $dataProvider;
    }
}
