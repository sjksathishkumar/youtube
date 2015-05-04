<?php

//namespace app\controllers;
namespace backend\controllers;

use Yii;
use app\models\ChannelCategory;
use app\models\SearchChannelCategory;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ChannelCategoryController implements the CRUD actions for ChannelCategory model.
 */
class ChannelCategoryController extends Controller
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
     * Lists all ChannelCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!isset(Yii::$app->user->id) )
                 {
                   return $this->redirect(['/site/login']);     
        }
        else{        
        $searchModel = new SearchChannelCategory();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        }
    }

    /**
     * Displays a single ChannelCategory model.
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
     * Creates a new ChannelCategory model.
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
        $model = new ChannelCategory();

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->pkChannelCategoryID]);
//        }
              if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                
                $model->channelAddedDate =  date('Y-m-d H:i:s');
                $model->channelUpdateDate =  date('Y-m-d H:i:s');
                 
            if($model->save())
            {
                 Yii::$app->session->setFlash('createchannelcat', true);
                 return   $this->redirect(['index']);
                
            }
    
            }
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        }
    }

    /**
     * Updates an existing ChannelCategory model.
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

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->pkChannelCategoryID]);
//        } 
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
                $model->channelUpdateDate =  date('Y-m-d H:i:s');
                 
            if($model->save())
            {
                 Yii::$app->session->setFlash('updatechannelcat', true);
                 //return $this->redirect(['view', 'id' => $model->pkChannelCategoryID]);
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
     * Deletes an existing ChannelCategory model.
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
        $this->findModel($id)->delete();
         Yii::$app->session->setFlash('deletechannelcat', true);
        return $this->redirect(['index']);
        }
    }

    /**
     * Finds the ChannelCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ChannelCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ChannelCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
