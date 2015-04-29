<?php

namespace backend\controllers;

use Yii;
use app\models\customer;
use app\models\searchcustomers;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * UserController implements the CRUD actions for user model.
 */
class CustomerController extends Controller
{
    public function behaviors()
    {
        return [
            
             'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['create', 'update', 'index', 'delete', 'view', 'multipledelete'],
                        'allow' => true,
                    ],
                    
                ],
                
            ],
            
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            
            
        ];
    }
    
   
    

    /**
     * Lists all user models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new searchcustomers();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single user model.
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
     * Creates a new user model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new customer();
        $model->scenario = 'usersignup';
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
                $model->password_hash = Yii::$app->security->generatePasswordHash($_POST['customer']['password']);
                $model->auth_key = Yii::$app->security->generateRandomString();
                $model->verifyemail = 1;
                $model->created_at =  date('Y-m-d H:i:s');
                $model->updated_at =  date('Y-m-d H:i:s');
                 
            if($model->save())
            {
                 Yii::$app->session->setFlash('create', true);
                 return   $this->redirect(['index']);
                
            }
    
            }else {
            return $this->render('create', [
                'model' => $model,
            ]);
     
        
    }
    }

    /**
     * Updates an existing user model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->updated_at =  date('Y-m-d H:i:s');
            
                    
            if(isset($_POST['customer']['password']) && $_POST['customer']['password']!='')
            {
                
                 $model->password_hash = Yii::$app->security->generatePasswordHash($_POST['customer']['password']);
                 $model->auth_key = Yii::$app->security->generateRandomString();
                
            }
            
        if ($model->save()) {
            Yii::$app->session->setFlash('update', true);
                 return   $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        }else {
            
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing user model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
         Yii::$app->session->setFlash('deleteuser', true);
        return $this->redirect(['index']);
    }

     /**
	   * Change discontinued Status
	   */ 
	public function actionMultipledelete()
	{
		 // $model = new Cms();
                 if(count($_POST['id']) > 0)
                 {
                  foreach($_POST['id'] as $id)
                 {
                      $model=$this->findModel($id);
                      $model->delete();
                      
                      
                  }
                  
                 }
                 return "Deleted";
	
	}
        
    /**
     * Finds the user model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return user the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = customer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
