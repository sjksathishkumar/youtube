<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $role
 * @property integer $status
 * @property string $delivery_address1
 * @property string $delivery_address2
 * @property string $suburb
 * @property string $city
 * @property integer $post_code
 * @property integer $contact_number
 * @property string $created_at
 * @property string $updated_at
 */
class Combo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'combo';
    }

    /**
     * @inheritdoc
     */ 
    public function rules()
    {
        return [
           [['ComboName','fkCategoryID','ComboPrice','ComboAddedDate','ComboModifiedDate','ComboDetails','ComboImage'], 'required','on'=>'create'],
            [['ComboName','ComboDetails'], 'string'],
            [['ComboPrice'], 'number'],
   // [['items', 'pkComboID', 'ComboNa  me','ComboImage', 'ComboPrice'], 'safe'],
            [['ComboImage'],'file','extensions' => 'gif, jpg, png',],
            //[['ComboImage'],'image','minWidth' => 160,],
            //[['ComboImage'],'image','minHeight' => 260,],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkComboID' => 'Combo ID',
            
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function getItems()
    {
        return $this->hasMany(ComboItemRelation::className(), ['fkComboID' => 'pkComboID']);
    }

    /**
     * @inheritdoc
     */
    public function search($params)
    {
        $query = Combo::find();
        $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                    'sort' => ['defaultOrder' => ['pkComboID' => SORT_DESC]],
                    'pagination' => [
                        'pageSize' => Yii::$app->session->get('pagging'),
                        ],
                ]);

        if (!($this->load($params) && $this->validate()))
        {
            return $dataProvider;
        }

        if ($params['Combo']['ComboPrice'] != '')
        {
            $this->ComboPrice = $params['Combo']['ComboPrice'];
            $query->where('ComboPrice=:from', array('from' => $this->ComboPrice));
        }
        $query->andFilterWhere(['like', 'ComboName', $this->ComboName]);
        return $dataProvider;
    }

}
