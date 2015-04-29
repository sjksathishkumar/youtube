<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "support_staff".
 *
 * @property integer $staffID
 * @property string $staffFirstName
 * @property string $staffLastName
 * @property string $staffUsername
 * @property string $staffEmailID
 * @property string $staffPhoneNumber
 * @property string $staffExt
 * @property string $staffStatus
 * @property string $staffPassword
 * @property integer $fkdept_id
 * @property integer $staffAddedBy
 * @property string $staffDateAdded
 * @property string $staffDateUpdated
 *
 * @property SupportDepartment $fkdept
 */
class staff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
  // public $department;
   public $password;
   public $confirm_password;
    public static function tableName()
    {
        return 'support_staff';
    }
   

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           [[ 'staffFirstName', 'staffLastName', 'staffEmailID', 'staffPhoneNumber', 'staffExt', 'staffMobile','fkdept_id'], 'required'],
           [['fkdept_id'], 'integer'],
            //['password', 'string', 'min' => 8],
            ['confirm_password','safe'],
             [['password'], 'match', 'pattern'=>'((?=.*\d)(?=.*[A-Z])(?=.).{8,20})', 'message' => 'Password must at least one upper case and one numeric character.'],
            [['confirm_password'], 'compare', 'compareAttribute' => 'password', 'message' => 'New password and Confirm password don\'t match.'],
            
           // [['staffStatus'], 'string'],
            [['staffDateAdded', 'staffDateUpdated'], 'safe'],
            [['staffEmailID'],'email'],
            //[['staffFirstName', 'staffLastName', 'staffPassword'], 'string', 'max' => 50],
            //[['staffUsername'], 'string', 'max' => 100],
           // [['staffEmailID'], 'string', 'max' => 300],
            [['staffPhoneNumber', 'staffExt'], 'string', 'max' => 15],
            [['department'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'staffID' => 'Staff ID',
            'staffFirstName' => 'Name',
            'staffLastName' => 'Last Name',
            'staffUsername' => 'Username',
            'staffEmailID' => 'Email ID',
            'staffPhoneNumber' => 'Phone Number',
            'staffExt' => 'Extention',
            'staffStatus' => 'Staff Status',
            'staffPassword' => 'Staff Password',
            'staffMobile' =>'Mobile',
            'fkdept_id' => 'Department',
            'staffAddedBy' => 'Staff Added By',
            'staffDateAdded' => 'Staff Date Added',
            'staffDateUpdated' => 'Staff Date Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(department::className(), ['id' => 'fkdept_id']);
    }
    
    public function staffview($id)
    {
        
       //$rsultValue =  staff::find($id)->joinWith('department')->all();
        $rsultValue =  staff::find()->joinWith('department', true, 'LEFT JOIN')->where(['support_staff.staffID'=>$id])->all();
      return $rsultValue;
    }
     public function search($params)
    {
         //$department=$this->getfkdept();
         /*$customer = staff::findOne(1);//;->getfkdept();
         $customer->department=$customer->getFkdept()->one();
         return $customer;*/
        // $customer = staff::findOne(1);
        // $departments = $customer->department;
         //return  $departments;
         $query = staff::find();
         $query->joinWith(['department']);
         /*return $query->all();*/
         //print_r($customer);

         /*$staff=$this::find()->with('department')->one();
         return staff;*/
        //$query=$this->find()->with('department');
        //return $query;
        //$query = staff::getFkdept();

       $dataProvider = new ActiveDataProvider([
           'query' => $query,
            'sort'=> ['defaultOrder' => ['staffID'=>SORT_DESC]],
            'pagination' => [
            'pageSize' => Yii::$app->session->get('pagging'),
            
    ],
        ]);
       $dataProvider->sort->attributes['department'] = [
        'asc' => ['support_department.dept_name' => SORT_ASC],
        'desc' => ['support_department.dept_name' => SORT_DESC],
    ];

        /*if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }*/

        $query->andFilterWhere([
            'staffFirstName' => $this->staffFirstName,
            'fkdept_id'=>$this->fk_dept_id,
            //'id' => $this->staffID,
            //'staffDateAdded' => $this->staffDateAdded,
            //'staffDateUpdated' => $this->staffDateUpdated,
        ]);

        $query->andFilterWhere(['like', 'staffUsername', $this->staffUsername])
            ->andFilterWhere(['like', 'staffEmailID', $this->staffEmailID])
            ->andFilterWhere(['like', 'staffExt', $this->staffExt])
            ->andFilterWhere(['like', 'staffStatus', $this->staffStatus]);

        return $dataProvider;
    }
    
}
