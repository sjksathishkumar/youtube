<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Contract;

/**
 * SearchContract represents the model behind the search form about `backend\models\Contract`.
 */
class SearchContract extends Contract
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pkContractID'], 'integer'],
            [['contractName', 'contractContent', 'contractAddDate', 'contractUpdateDate'], 'safe'],
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
        $query = Contract::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'pkContractID' => $this->pkContractID,
            'contractAddDate' => $this->contractAddDate,
            'contractUpdateDate' => $this->contractUpdateDate,
        ]);

        $query->andFilterWhere(['like', 'contractName', $this->contractName])
            ->andFilterWhere(['like', 'contractContent', $this->contractContent]);

        return $dataProvider;
    }
}
