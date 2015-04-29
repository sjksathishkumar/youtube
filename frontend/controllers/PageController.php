<?php
namespace frontend\controllers;


use Yii;
use common\models\User;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\verifyphone;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\faq;
use app\models\searchfaq;
use yii\data\Pagination;



/**
 * Site controller
 */
class PageController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => [''],
                'rules' => [
                    [
                       
                        'actions' => ['signup','login','faq','signup-verify'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post','get'],
                ],
            ],
        ];
    }

     

   
    
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
             'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successCallback'],
            ],
        ];
    }
    
     
   public function actionView($slug)
    {
       //echo $slug;
     
        if ($slug == '')
        {
            return $this->render('index');
        }
        else
        {
           $varPageData= \app\models\Cms::find()->where('slug = :slug', ['slug'=>$slug])->all();
      //echo '<pre>';print_r($varPageData);
      // exit;
            $this->layout = 'main';
            if ($varPageData == null)
            {
                throw new CHttpException(404, 'The specified Page cannot be found.');
            }
            else
            {
                // # Page Related Data
                //CommonFunctions::getMetaTags($varPageData->slug);
               return $this->render('view', array('varPageData' => $varPageData));
            }
        }
    }
}
