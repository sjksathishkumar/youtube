<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Channel;

/**
 * SearchChannel represents the model behind the search form about `common\models\Channel`.
 */
class SearchChannel extends Channel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pkChannelID', 'fkPartnerID', 'fkChannelCategoryID'], 'integer'],
            [['youtubeChannelID', 'channelName', 'channelStatus', 'channelAddDate', 'channelUpdateDate'], 'safe'],
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
        $query = Channel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->pagination->pageSize=Yii::$app->session->get('pagging');
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'pkChannelID' => $this->pkChannelID,
            'fkPartnerID' => $this->fkPartnerID,
            'fkChannelCategoryID' => $this->fkChannelCategoryID,
            'channelAddDate' => $this->channelAddDate,
            'channelUpdateDate' => $this->channelUpdateDate,
        ]);

        $query->andFilterWhere(['like', 'youtubeChannelID', $this->youtubeChannelID])
            ->andFilterWhere(['like', 'channelName', $this->channelName])
            ->andFilterWhere(['like', 'channelStatus', $this->channelStatus]);

        return $dataProvider;
    }
}
