<?php

namespace backend\controllers;

use Yii;
use app\models\Bank;
use app\models\SearchBank;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BankController implements the CRUD actions for Bank model.
 */
class BankController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],'multipledelete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Bank models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!isset(Yii::$app->user->id) )
        {
            return $this->redirect(['/site/login']);     
        }else{ 
        $searchModel = new SearchBank();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        }
    }

    /**
     * Displays a single Bank model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(!isset(Yii::$app->user->id) )
        {
            return $this->redirect(['/site/login']);     
        }else{        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
        }
    }

    /**
     * Creates a new Bank model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!isset(Yii::$app->user->id) )
        {
            return $this->redirect(['/site/login']);     
        }else{        
        $model = new Bank();
        //$model->scenario = 'create';

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->pkBankID]);
//        } 
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
                $model->bankAdded =  date('Y-m-d H:i:s');
                $model->bankUpdate =  date('Y-m-d H:i:s');
                 
            if($model->save())
            {
                 Yii::$app->session->setFlash('createbank', true);
                 return   $this->redirect(['index']);
                
            }
    
            }else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        }
    }

    /**
     * Updates an existing Bank model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(!isset(Yii::$app->user->id) )
        {
            return $this->redirect(['/site/login']);     
        }else{        
        $model = $this->findModel($id);

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->pkBankID]);
//        } 
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
                $model->bankUpdate =  date('Y-m-d H:i:s');
                 
            if($model->save())
            {
                 Yii::$app->session->setFlash('updatebank', true);
                 //return $this->redirect(['view', 'id' => $model->pkBankID]);
                 return $this->redirect(['index']);
                
            }
    
            }else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        }
    }

    /**
     * Deletes an existing Bank model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(!isset(Yii::$app->user->id) )
        {
            return $this->redirect(['/site/login']);     
        }else{        
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('deletebank', true);
        return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Bank model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bank the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bank::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
