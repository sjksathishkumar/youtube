<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\EmailTemplates;

/**
 * EmailTemplatesSearch represents the model behind the search form about `backend\models\EmailTemplates`.
 */
class EmailTemplatesSearch extends EmailTemplates
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pkEmailID'], 'integer'],
            [['emailTitle', 'emailFromName', 'emailFromEmail', 'emailSubject', 'emailContent', 'emailTemplateType', 'emailDateAdded', 'emailDateUpdated'], 'safe'],
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
        $query = EmailTemplates::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->pagination->pageSize=Yii::$app->session->get('pagging');

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'pkEmailID' => $this->pkEmailID,
            'emailDateAdded' => $this->emailDateAdded,
            'emailDateUpdated' => $this->emailDateUpdated,
        ]);

        $query->andFilterWhere(['like', 'emailTitle', $this->emailTitle])
            ->andFilterWhere(['like', 'emailFromName', $this->emailFromName])
            ->andFilterWhere(['like', 'emailFromEmail', $this->emailFromEmail])
            ->andFilterWhere(['like', 'emailSubject', $this->emailSubject])
            ->andFilterWhere(['like', 'emailTemplateType', $this->emailTemplateType])
            ->andFilterWhere(['like', 'emailContent', $this->emailContent]);

        return $dataProvider;
    }
}
