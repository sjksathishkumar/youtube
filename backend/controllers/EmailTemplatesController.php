<?php

namespace backend\controllers;

use Yii;
use backend\models\EmailTemplates;
use backend\models\EmailTemplatesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmailTemplatesController implements the CRUD actions for EmailTemplates model.
 */
class EmailTemplatesController extends Controller
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
     * Lists all EmailTemplates models.
     * @return mixed
     */
    public function actionIndex()
    {
        /*$ip = Yii::$app->CommonFunction->RealIP();
        echo $ip;
        die();*/
        if(!isset(Yii::$app->user->id) )
        {
            return $this->redirect(['/site/login']);     
        }   
        else{
            $searchModel = new EmailTemplatesSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single EmailTemplates model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(!isset(Yii::$app->user->id) )
                 {
                   return $this->redirect(['/site/login']);     
        }
        else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new EmailTemplates model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!isset(Yii::$app->user->id) )
                 {
                   return $this->redirect(['/site/login']);     
        }
        else{
            $model = new EmailTemplates();

            $model->emailDateAdded =  date('Y-m-d H:i:s');
           
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('createTemplateSuccess',true);
                return $this->redirect(['index']);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Updates an existing EmailTemplates model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(!isset(Yii::$app->user->id) )
                 {
                   return $this->redirect(['/site/login']);     
        }
        else{
            $model = $this->findModel($id);
            $model->emailDateUpdated =  date('Y-m-d H:i:s');
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('editTemplateSuccess',true);
                return $this->redirect(['index']);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Deletes an existing EmailTemplates model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(!isset(Yii::$app->user->id) )
                 {
                   return $this->redirect(['/site/login']);     
        }
        else{
            $model = $this->findModel($id);
            if($model->emailTemplateIsUsed == '1')
            {
                Yii::$app->session->setFlash('deleteTemplateFaild',true);
                return $this->redirect(['index']);    
            }
            else
            {
                $this->findModel($id)->delete();
                Yii::$app->session->setFlash('deleteTemplateSuccess',true);
                return $this->redirect(['index']);
            }
        }
    }

    /**
     * Finds the EmailTemplates model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EmailTemplates the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EmailTemplates::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
