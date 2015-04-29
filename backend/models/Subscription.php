<?php

namespace app\models;

use Yii;
use app\models\customer;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "subscription_details".
 *
 * @property integer $id
 * @property integer $fkuser_id
 * @property string $subscriber_phone
 * @property string $subscriber_name
 * @property string $DOB
 * @property string $matrial_status
 * @property string $IMSI
 * @property string $date_of_subscription
 *
 * @property User $fkuser
 */
class Subscription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subscription_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkuser_id', 'subscriber_phone', 'subscriber_name', 'DOB', 'matrial_status', 'IMSI', 'date_of_subscription'], 'required'],
            [['fkuser_id'], 'integer'],
            [['matrial_status'], 'string'],
            [['date_of_subscription'], 'safe'],
            [['subscriber_phone'], 'string', 'max' => 15],
            [['subscriber_name', 'IMSI'], 'string', 'max' => 50],
            [['DOB'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fkuser_id' => 'Fkuser ID',
            'subscriber_phone' => 'Subscriber Phone',
            'subscriber_name' => 'Subscriber Name',
            'DOB' => 'Dob',
            'matrial_status' => 'Matrial Status',
            'IMSI' => 'Imsi',
            'date_of_subscription' => 'Date Of Subscription',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'fkuser_id']);
    }
    
    public function search($params)
    {
        $query = Subscription::find()->joinWith('customer', true, 'LEFT JOIN')->onCondition(['id' => 'fkuser_id']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]],
            'pagination' => [
            'pageSize' => 10,
            
        ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'subscriber_phone' => $this->subscriber_phone,
        ]);

        $query->andFilterWhere(['like', 'subscriber_name', $this->subscriber_name])
            ->andFilterWhere(['like', 'DOB', $this->DOB])
            ->andFilterWhere(['like', 'matrial_status', $this->matrial_status])
            ->andFilterWhere(['like', 'source', $this->source])
            ->andFilterWhere(['like', 'IMSI', $this->IMSI])
            ->andFilterWhere(['like', 'date_of_subscription', $this->date_of_subscription])
            ;

        return $dataProvider;
    }
}
