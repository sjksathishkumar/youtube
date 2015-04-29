<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\staff;

/**
 * searchticket represents the model behind the search form about `app\models\ticket`.
 */
class searchStaff extends staff
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkdept_id'], 'integer'],
            [['staffFirstName', 'staffLastName', 'staffUsername', 'staffEmailID', 'staffPhoneNumber', 'staffExt', 'staffStatus', 'staffPassword', 'staffMobile', 'fkdept_id', 'staffDateAdded', 'staffDateUpdated'], 'safe'],
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
        $query = staff::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'sort'=> ['defaultOrder' => ['staffID'=>SORT_DESC]],
            'pagination' => [
            'pageSize' => Yii::$app->session->get('pagging'),
            
        ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'staffFirstName' => $this->staffFirstName,
            'fkdept_id' => $this->fkdept_id,
        ]);

        $query->andFilterWhere(['like', 'staffUsername', $this->staffUsername])
            ->andFilterWhere(['like', 'staffEmailID', $this->staffEmailID])
            ->andFilterWhere(['like', 'staffPhoneNumber', $this->staffPhoneNumber])
            ->andFilterWhere(['like', 'staffExt', $this->staffExt])
            ->andFilterWhere(['like', 'staffStatus', $this->staffStatus])
            ->andFilterWhere(['like', 'staffPassword', $this->staffPassword])
            ->andFilterWhere(['like', 'staffMobile', $this->staffMobile]);
           

        return $dataProvider;
    }
}

