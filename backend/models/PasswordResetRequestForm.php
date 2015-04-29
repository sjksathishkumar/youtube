<?php
namespace backend\models;

use Yii;
use app\models\Admin;
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
                'targetClass' => 'app\models\Admin',
                'filter' => ['status' => Admin::STATUS_ACTIVE],
                'message' => 'There is no user with such email.'
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail()
    {
       
        /* @var $user tbl_admin */
        $user = Admin::findOne([
            'status' => Admin::STATUS_ACTIVE,
            'email' => $this->email,
        ]);
       

        if ($user) {
            if (!Admin::isPasswordResetTokenValid($user->password_reset_token)) {
                $user->generatePasswordResetToken();
            }

            if ($user->save()) {  
                
                $messageValue = "Dear Admin,<br><br>We have received your request for Uturn password to be reset.<br><br>
                    In the event that another person sent this request to us, or if you remember your password and do not wish to change it, you can simply ignore this message and continue to use your old password.<br><br>
		If you would like to reset your password, please click on this <br><br>".Html::a(Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]), Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]))."
<br><br>
		
		If you're unable to click on the link you can also copy the URL and paste it into your browser manually.
		<br/><br />
		
		Regards<br />Uturn Team";
            
               // $resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token])
                $textbodyMessage = "";
            return \Yii::$app->mail->compose()
                ->setFrom([\Yii::$app->params['adminEmail'] => 'Uturn'])
                ->setTo($this->email)
                ->setSubject('Password reset for Uturn::Admin')
                ->setHtmlBody($messageValue)
                ->send();
            
            
            
            }
          }

        return false;
    }
}
