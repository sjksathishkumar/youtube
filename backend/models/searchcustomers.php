<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\customer;
use app\models\Subscription;

/**
 * searchusers represents the model behind the search form about `app\models\user`.
 */
class searchcustomers extends customer
{
    /**
     * @inheritdoc
     */
   public $subscriber_phone;
   public $subid; 
    public function rules()
    {
        return [
            
            [['first_name', 'last_name', 'username', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'contact_number', 'delivery_address1', 'delivery_address2', 'suburb', 'city', 'created_at', 'updated_at'], 'safe'],
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
     *subscription_details
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    /*public function getOrders()
    {
        return $this->hasMany(Order::className(), ['customer_id' => 'id']);
    }*/
   /* public function getSubscription()
    {
        return $this->hasMany(Subscription::className(), ['fkuser_id'=>'id' ]);
    }*/
    public function search($params)
    {
        
        //exit();
        //$query = Customer::find()->joinWith('subscription', true, 'LEFT JOIN');
        //$query=$this->hasMany(Subscription::className(), ['fkuser_id'=>'id' ]);
       // ->joinWith('customer', true, 'LEFT JOIN')->onCondition(['id' => 'fkuser_id']);
       //$query=Customer::find()->with('subscription');
       $query=Customer::find()->joinWith('subscription', true, 'LEFT JOIN');
        //$query=Customer::find()->join('LEFT JOIN','subscription','');
       // $query=Customer::find()->join('INNER JOIN','subscription_details');
       // $query=Customer::find()->join('INNER JOIN','subscription_details')->onCondition(['subscriber_name' => 'fgdfgh']);
        //$query=$this->hasMany(Subscription::className(), ['fkuser_id' => 'id'])->;
        //$query = Customer::find()->joinWith('subscription_details', true, 'LEFT JOIN');
       //$query = customer::find();
       //$query = Subscription::find()->joinWith('customer', true, 'LEFT JOIN');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'sort'=> ['defaultOrder' => ['id'=>SORT_ASC]],
            'pagination' => [
            'pageSize' => Yii::$app->session->get('pagging'),
            
        ],
            
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
            
        }
        if(isset($params['searchcustomers']['subid']) and ($params['searchcustomers']['subid']!='' or $params['searchcustomers']['subscriber_phone']!=null))
        {
          $query->orOnCondition(['subscription_details.id' => $params['searchcustomers']['subid']]
            );
           $query->orOnCondition([ 'subscriber_phone' => $params['searchcustomers']['subscriber_phone']]);
        } 
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
           //'subscriber_phone'=>$this->subscriber_phone
        ]);
        $firstname='';
        $lastname='';
        if(isset($this->first_name) && $this->first_name!='')
        {
            $name = preg_split('/(\s)/', $this->first_name, PREG_SPLIT_DELIM_CAPTURE);
            $firstname = $name[0];
            $lastname = isset($name[1])?$name[1]:$name[0];
           
        }

        $query->andFilterWhere(['like', 'first_name', $firstname])
            ->orFilterWhere(['like', 'last_name', $lastname])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'contact_number', $this->contact_number])
            ->andFilterWhere(['like', 'delivery_address1', $this->delivery_address1])
            ->andFilterWhere(['like', 'delivery_address2', $this->delivery_address2])
            ->andFilterWhere(['like', 'suburb', $this->suburb])
            ->andFilterWhere(['like', 'city', $this->city]);

        return $dataProvider;
    }
}
