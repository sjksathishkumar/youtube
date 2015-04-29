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
use frontend\models\Contact;
use yii\data\Pagination;



/**
 * Site controller
 */
class SiteController extends Controller
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
    
     public function successCallback($client)
    {
        $attributes = $client->getUserAttributes();
        if(count($attributes) > 0)
        {
           /* print_r(Yii::$app->authClientCollection->getClients());
            echo Yii::$app->authClientCollection->hasClient('744467832327-srahqqgt5q7tn6f7ounb1oiq94ig0hct.apps.googleusercontent.com');
            setExpireDuration()
            exit();*/
           $model = new LoginForm();
           
           if(array_key_exists('email', $attributes))
            $useEmail = $attributes['email'];
           else
               $useEmail = $attributes['emails'][0]['value'];
            if($useEmail=="")
            {
                 Yii::$app->session->setFlash('error', 'Your email address not associated with facebook account.');
                return $this->action->redirect(Yii::$app->urlManager->createUrl("site/signup"),true);
                
            }else{            
            $checkEmail = User::find()->where(['email' => $useEmail])->one();
            
            if(count($checkEmail) > 0)
            {
                
                 if (preg_match('/www.google.com/',$attributes['id']))
                {
                   $providerName = 'google';

                }else {
                    
                   $providerName = 'facebook';
                }
            
                if($useEmail == $checkEmail->email)
                {
                    $usercheck = $model->loginWithEmail($checkEmail);
                 Yii::$app->session->set('userId',$checkEmail->id);
                 Yii::$app->session->set('userEmail',$checkEmail->email);
                 
                 return $this->action->redirect(Yii::$app->urlManager->createUrl("user/dashboard"), true);
               
                    
                }else {
                                     
                 Yii::$app->session->setFlash('error', 'Your email address already exists.');
                 return $this->action->redirect(Yii::$app->urlManager->createUrl("site/signuup"), true);
               
                }
                
                 
            }else {
                
                
                $mdoelSignUp = SignupForm::socialSignup($attributes);
                if(isset($mdoelSignUp))
                {
                $usercheck = $model->loginWithEmail($mdoelSignUp);
                 Yii::$app->session->set('userId',$mdoelSignUp->id);
                 Yii::$app->session->set('userEmail',$mdoelSignUp->email);
                return $this->action->redirect(Yii::$app->urlManager->createUrl("user/dashboard"),true);
                }
                
                
            }
            }
                        
        }
      
    
    }
    
    public function actionIndex()
    {
        $modelProduct= new \app\models\Product;
        return $this->render('index');
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
    public function actionLogin()
    {
       
        

        $model = new LoginForm();
         
        $errorMsg = array();
        
         if (isset($_POST['LoginForm'])) {
             
             if ((trim($_POST['LoginForm']['email']) == "") || (trim($_POST['LoginForm']['password']) == "")) {
                 
                  if (trim($_POST['LoginForm']['email']) == "") {

                    $errorMsg['email'] = "Email could not be blank.";
                }if (trim($_POST['LoginForm']['email']) != "") {
                    $errorMsg['email'] = "";
                }
                
                 if (trim($_POST['LoginForm']['password']) == "") {

                    $errorMsg['password'] = "Password could not be blank.";
                    
                }if (trim($_POST['LoginForm']['password']) != "") {

                    $errorMsg['password'] = "";
                }
                 $errorMsg['loginMsg'] = "";

                $errorMsg['redirectUrl'] = '';

                
                
             }else {
                  $errorMsg['loginMsg'] = "";

                $errorMsg['redirectUrl'] = '';
                
                  $errorMsg['email'] = '';

                $errorMsg['password'] = '';
               $user =  User::findByUsername(trim($_POST['LoginForm']['email']));
               if (!$user || !User::validatePasswordWithHash(trim($_POST['LoginForm']['password']),$user->password_hash)) {
                    $errorMsg['email'] = "Incorrect email or password.";
              //  $this->addError($attribute, 'Incorrect username or password.');
             }
             else
                {
             if($user->verifyemail!=1)
                 {
                     $errorMsg['email'] = "Verify your email id before login.";
                 }
                 else {
                 
                 $usercheck = $model->loginWithEmail($user);
                 Yii::$app->session->set('userId',$user->id);
                 Yii::$app->session->set('userEmail',$user->email);
                 $errorMsg['redirectUrl'] = \Yii::$app->urlManager->createUrl("user/dashboard");
             }
               }
             
              
                 
             }
             
              echo json_encode($errorMsg);
             
             
         }
         
     
    }

    public function actionLogout()
    {
        
       // Yii::$app->user->logout();
     //  Yii::$app->cookie->expire= time()-60*60*24*180;
         Yii::$app->session->close();
        Yii::$app->session->destroy();
         Yii::$app->session->remove('userEmail');
          Yii::$app->session->remove('userId');
        
       
         return $this->redirect(\Yii::$app->urlManager->createUrl("site/index"));
    }

    public function actionContact()
    {
        $model = new Contact();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //echo "hello";
            //exit();
            $model->contactCreatedDate=date('Y-m-d H:i:s');
            $model->contactUpdatedDate=date('Y-m-d H:i:s');
            if($model->save(false))
            {
                    if ($model->sendEmail(\Yii::$app->params['adminEmail'])) {
                        Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
                    } else {
                        Yii::$app->session->setFlash('error', 'There was an error please try again.');
                    }

                    return $this->refresh();
            }
            else
            {
                //echo "hi";
                //  exit();
                Yii::$app->session->setFlash('error', 'There was an error please try again.');
                 return $this->refresh();
            }
        }else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionFaq()
            
    {
         $searchModel = new searchfaq();
         
         $query = \app\models\searchfaq::find()->where(['status' => '1']);
        // $pagination = new Pagination(['totalCount' => $query->count()]);
         
        $pagination = new Pagination(['defaultPageSize' => 3, 'totalCount' => $query->count(),]);
        
        $models = $query->orderBy('id DESC')->offset($pagination->offset)->limit($pagination->limit)->all();
        

    
    

    return $this->render('faq', [
         'models' => $models,
         'searchModel' => $searchModel,
        'pages' => $pagination,
        
    ]);
    
        
        
    }
     public function actionLoadmoredata()
            
    {
         $geteddata = $_POST['vpb_total'];
         echo $geteddata;die();
         
         $varFaqData= \app\models\faq::find()->where(['status' => '1'])->all();
        
        return $this->render('loadmoredata',array('varFaqData' => $varFaqData));
    }
    
    
    
    
    
    
     public function actionSearchfaq()
             
    {  
     
      $geteddata = $_GET['question'];
      if($geteddata!=''){
         $varFaqData2 = \app\models\faq::find()->where('question LIKE :question OR answer LIKE :question', [':question' => '%' . $geteddata . '%'])->limit(100)->all();
        
          }else {
              $varFaqData2= \app\models\faq::find()->where(['status' => '1'])->all();
          }
        return $this->renderPartial('faqsearchajax', array('varFaqData2' => $varFaqData2));
        
    }
    
    

    public function actionSignup()
    {
       if(Yii::$app->session->get('userId'))
         {
             return $this->redirect(Yii::$app->urlManager->createUrl("site/index"), true);
         }
        
        $model = new SignupForm();
        
     
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
           
            if ($user = $model->signup($_POST['SignupForm'])) {
              
                 if ($model->sendEmail($user)) {
                     
                      Yii::$app->getSession()->setFlash('success', 'An email with the activation link has been sent. Go to your email and click on the link.');
                     return $this->redirect(\Yii::$app->urlManager->createUrl("site/signup"));
                     
                 }
               
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }
    
    
     public function actionRecovery()
    {
        $model = new PasswordResetRequestForm();
                
        $errorMsg = array();
        $successMsg = array();
              if (trim($_POST['email']) == "") {
             
                     $errorMsg['email'] = "Email could not be blank.";
                }
              else {
                  
                  $errorMsg['email']='';
                  $errorMsg['success']='';
           
                $userDetails =  User::findByUsername(trim($_POST['email']));
              
                if(!$userDetails)
                {
                    $errorMsg['email'] = "Email id does not exist in our database.";
                }else {
                        if($user->verifyemail=='0')
                        {
                            $errorMsg['email'] = "your emailId not verify.";
                        }else {
                            if($user->status=='0')
                            {
                                $errorMsg['email'] = "your account is inactive. Please contact admin.";
                            }else {
                                
                                  if ($model->sendEmail($userDetails->email)) {
                                      $errorMsg['email'] ='';
                                      $errorMsg['success'] = "Check your email for further instructions.";
                                      
                                  }
                                
                            }
                            
                        }
                    
                }
           
             }
             
              echo json_encode($errorMsg);
     
    }
  
    public function actionResetPassword($token)
    {
        if(Yii::$app->session->get('userId'))
         {
             return $this->redirect(Yii::$app->urlManager->createUrl("site/index"), true);
         }
         
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('successlogin', 'New password has been saved.');
                return $this->redirect(\Yii::$app->urlManager->createUrl("site/index"));

               // return $this->goHome();
            //return $this->redirect(\Yii::$app->urlManager->createUrl("site/signup"));
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    
    
     public function actionSignupVerify($acitivation)
    {
         if(Yii::$app->session->get('userId'))
         {
             return $this->redirect(Yii::$app->urlManager->createUrl("site/index"), true);
         }
         
        $model= new SignupForm();
      
        if($acitivation!='')
        {
            $modelVerify = SignupForm::acitveUser($acitivation);
           
            if($modelVerify=='')
            {
                Yii::$app->getSession()->setFlash('error', 'Your\'s activaction key worng.');
            }else{
                    if($modelVerify->verifyemail=='1')
                    {
                        Yii::$app->getSession()->setFlash('error', 'Your\'s email has been already verified.');
                        
                    }else {
                        
                        $customer = User::findOne($modelVerify->id);
                        $customer->verifyemail = '1';
                        $customer->save(); 
                      
                         //Yii::$app->getSession()->setFlash('success', 'Your account has been activated, Please login.');
                         Yii::$app->getSession()->setFlash('successlogin', 'Your account has been activated, Please login.');
                return $this->redirect(\Yii::$app->urlManager->createUrl("site/index"));
                    }
                
            }
            
        }
        return $this->redirect(\Yii::$app->urlManager->createUrl("site/signup"));
      
    
    }   
   public function actionAbout()
    {
        echo $this->actionView('about');
    }
    public function actionPrivacy()
    {
        echo $this->actionView('privacy-policy');
    }
    public function actionTerms()
    {
        echo $this->actionView('bluesky-terms');
    }
     public function actionSupport()
    {
        echo $this->actionView('support');
    }
    public function actionFeatures()
    {
        echo $this->actionView('features');
    }
    public function actionRefundpolicy()
    {
        echo $this->actionView('pricing-plans');
    }
    public function actionTransplantservices()
    {
        echo $this->actionView('get-started');
    }
     public function actionProduct()
            
    {
         /*$searchModel = new searchfaq();
         
         $query = \app\models\searchfaq::find()->where(['status' => '1']);
        // $pagination = new Pagination(['totalCount' => $query->count()]);
         
        $pagination = new Pagination(['defaultPageSize' => 3, 'totalCount' => $query->count(),]);
        
        $models = $query->orderBy('id DESC')->offset($pagination->offset)->limit($pagination->limit)->all();
        */

    
    

    return $this->render('product', [
         //'models' => $models,
         //'searchModel' => $searchModel,
        //'pages' => $pagination,
        
    ]);
    
        
        
    }
    
}
