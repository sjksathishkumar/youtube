<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ChannelCategory;

/**
 * SearchChannelCategory represents the model behind the search form about `app\models\ChannelCategory`.
 */
class SearchChannelCategory extends ChannelCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pkChannelCategoryID'], 'integer'],
            [['channelCategoryName', 'channelUsed', 'channelAddedDate', 'channelUpdateDate'], 'safe'],
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
        $query = ChannelCategory::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->pagination->pageSize=Yii::$app->session->get('pagging');
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'pkChannelCategoryID' => $this->pkChannelCategoryID,
            'channelAddedDate' => $this->channelAddedDate,
            'channelUpdateDate' => $this->channelUpdateDate,
        ]);

        $query->andFilterWhere(['like', 'channelCategoryName', $this->channelCategoryName])
            ->andFilterWhere(['like', 'channelUsed', $this->channelUsed]);

        return $dataProvider;
    }
}
