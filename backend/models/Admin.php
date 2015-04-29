<?php

namespace app\models;



use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\data\ActiveDataProvider;




/**
 * This is the model class for table "tbl_admin".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $role
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Admin extends ActiveRecord implements IdentityInterface 
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const ROLE_USER = 10;
     public $current_password;
    public $new_password;
    public $confirm_password;
    
    public $password;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
      
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'user_title', 'password_hash', 'email'], 'required','on' => 'register'],
             [['username', 'user_title', 'email','password'], 'required','on' => 'create'],
            [['role', 'status','page_setting'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
             [['created_at', 'updated_at','picture','page_setting'], 'safe'],
            [['current_password', 'new_password', 'confirm_password'], 'required', 'on' => 'changepassword'],
            [['new_password'], 'string', 'min' => 6, 'on' => 'changepassword'],
            [['confirm_password'], 'compare', 'compareAttribute' => 'new_password', 'message' => 'New password and Confirm passwords don\'t match.', 'on' => 'changepassword'],
            [['confirm_password'], 'compare', 'compareAttribute' => 'password', 'message' => 'New password and Confirm passwords don\'t match.', 'on' => 'create'],
            [['user_title', 'email', 'page_setting'], 'required', 'on' => 'editprofile'],
            [['picture'],'file','extensions' => 'gif, jpg, png',],
           
           

            
        ];
    }
    
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validateStrongPassword($newPassword)
    {
     
        if(preg_match('/^[a-zA-Z0-9$!@#%&\.\?]*$/i', $newPassword))
        {
            
             $this->addError('new_password', 'password should contain atleast one number and one special character.');
             
        }
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'role' => 'Role',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
       
        return static::findOne(['email' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
         return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
       
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    
    
    public function validateCurrentPassword($id, $curPassword)
    {
       
       $password_hash = Yii::$app->security->validatePassword($curPassword, $this->password_hash);
       
      if($password_hash!='')
       {
           return static::findOne([
            'id' => $id,
            'status' => self::STATUS_ACTIVE,
            'password_hash' => $this->password_hash,
        ]);
   
       }else {
           
            $this->addError('current_password', 'Password is incorrect.');
       }
       
       
    }

    
     public function updateAdmintable($arrPost)
    {
         
         $model = Admin::findOne(Yii::$app->user->id);
         $model->password_hash = Yii::$app->security->generatePasswordHash($arrPost['new_password']);
          
         $model->updated_at  = date('Y-m-d G:i:s');
         return $model->update();
         
      
	//$model->save();  // equivalent to $model->update();
        // return $model;
        
    }
    
        /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function memberRegister()
    {
        if ($this->validate()) {
            $user = new Admin();
            $user->user_title = $this->user_title;
            $user->username = $this->username;
            $user->email = $this->email;
            $user->role = $this->role;
            $user->setPassword($this->password_hash);
            $user->generateAuthKey();
            $user->save();
            return $user;
        }

        return null;
    }
    
    public function showMemberName($id)
    {
        $dept = Admin::findOne($id);
        
         return $dept->user_title!=''?$dept->user_title:'';
       
        
    }
    public function search($params)
    {
        $query = Admin::find();

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
            
            'status' => $this->status,
            
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
        
        /*if(isset($this->first_name) && $this->first_name!='')
        {
            $name = preg_split('/(\s)/', $this->first_name, PREG_SPLIT_DELIM_CAPTURE);
            $firstname = $name[0];
            $lastname = isset($name[1])?$name[1]:$name[0];
           
        }*/

        $query->andFilterWhere(['like', 'user_title', $user_title])
            ->orFilterWhere(['like', 'username', $username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'page_setting', $this->page_setting])
            ->andFilterWhere(['like', 'role', $this->role])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'adminUserType', $this->adminUserType])
            ->andFilterWhere(['like', 'created_at', $this->created_at]);

        return $dataProvider;
    }
    
}
