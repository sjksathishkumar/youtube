<?php

namespace frontend\controllers;

use Yii;
use frontend\models\partner;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\PartnerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PartnerController implements the CRUD actions for partner model.
 */
class PartnerController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all partner models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PartnerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single partner model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Check Cancel or accept rule and redidirect to cancel or signup page.
     */
    public function actionRegister()
    {   
//        if($_REQUEST['error']=='access_denied'){
//            return $this->redirect('../partner/errorcancelrule',302);
//        }
        
        if(isset($_REQUEST['error'])){
            return $this->redirect(['/partner/errorcancelrule']);
            }
        if(isset($_REQUEST['code']))
        {
            return $this->redirect(['/partner/signup']);
        }
    }
    
    /**
     * Creates a new partner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionSignup()
    {   
        
        $model = new partner();

            if ($model->load(Yii::$app->request->post()) && $model->save()) { 
                //return $this->redirect(['view', 'id' => $model->pkPartnerID]);
                return $this->goHome();
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }

    }

    /**
     * Updates an existing partner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pkPartnerID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing partner model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the partner model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return partner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = partner::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /**
     * Partner Login.
     */    
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        
        if ($model->load(Yii::$app->request->post()) && $model->login()) {  print_r($_post);die;
            return $this->goBack();
        } else {
            $this->layout='login_layout';    
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Partner Logout.
     */    
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    /**
     * Join uturn.
     */    
    public function actionJoinuturn()
    {
            $model = new partner();
            return $this->render('joinuturn', [
                'model' => $model,
            ]);
    }
    /**
     * Thank you.
     */        
    public function actionThankyou()
    {
            $model = new partner();
            return $this->render('thankyou', [
                'model' => $model,
            ]);
    }
    /**
     * youtube channel error.
     */        
    public function actionErrorcancelrule()
    {
            $model = new partner();
            return $this->render('errorCancelRule', [
                'model' => $model,
             ]);
    }   
    /**
     * Function for Forgot Password.
     */     
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
}
