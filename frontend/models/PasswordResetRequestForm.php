<?php
namespace frontend\models;

use Yii;
use common\models\User;
use yii\base\Model;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\swiftmailer\Message;
use yii\helpers\Html;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\common\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with such email.'
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail($useremail)
    {
       
        /* @var $user User */
        $user = User::findOne([
            'status' => '1',
            'email' => $useremail,
        ]);
       
        if ($user) {
            if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
                $user->generatePasswordResetToken();
            }

             if ($user->save()) {  
                
                $messageValue = "Dear ".$user->first_name." ".$user->last_name.",<br><br>We have received your request for uturn password to be reset.<br><br>
                    In the event that another person sent this request to us, or if you remember your password and do not wish to change it, you can simply ignore this message and continue to use your old password.<br><br>
		If you would like to reset your password, please click on this <br><br>".Html::a(Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]), Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]))."
<br><br>
		
		If you're unable to click on the link you can also copy the URL and paste it into your browser manually.
		<br/><br />
		
		Regards<br />uturn Team";
            
               // $resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token])
               //mail("arun.thakur@mail.vinove.com","emailseererewrr",$messageValue);
             
            return \Yii::$app->mail->compose()
                ->setFrom([\Yii::$app->params['adminEmail'] => 'uturn'])
                ->setTo($useremail)
                ->setSubject('Password reset for uturn')
                ->setHtmlBody($messageValue)
                ->send();
            
            
            
            }
        }

        return false;
    }
}
