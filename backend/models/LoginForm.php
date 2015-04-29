<?php
namespace app\models;

use Yii;

/**
 * Login form
 */
class LoginForm extends \yii\db\ActiveRecord
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }
    
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
           
          // echo "<pre>"; print_r($user); exit;
             if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect Email ID or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        
        if ($this->validate()) {
           
            Yii::$app->session->set('isAdmin','1');
            Yii::$app->session->set('pagging',$this->getUser()->getAttribute('page_setting'));
             return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
             
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Admin::findByUsername($this->email);
           
        }

        return $this->_user;
    }
}
