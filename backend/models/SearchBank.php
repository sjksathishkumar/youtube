<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bank;

/**
 * SearchBank represents the model behind the search form about `app\models\Bank`.
 */
class SearchBank extends Bank
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pkBankID'], 'integer'],
            [['bankName', 'bankAdded', 'bankUpdate'], 'safe'],
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
        $query = Bank::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->pagination->pageSize=Yii::$app->session->get('pagging');
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'pkBankID' => $this->pkBankID,
            'bankAdded' => $this->bankAdded,
            'bankUpdate' => $this->bankUpdate,
        ]);

        $query->andFilterWhere(['like', 'bankName', $this->bankName]);

        return $dataProvider;
    }
}
