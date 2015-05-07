<?php

namespace backend\controllers;

use Yii;
use common\models\Channel;
use backend\models\SearchChannel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ChannnelController implements the CRUD actions for Channel model.
 */
class ChannelController extends Controller
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
     * Lists all Channel models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!isset(Yii::$app->user->id) )
        {
            return $this->redirect(['/site/login']);     
        }else{        
        $searchModel = new SearchChannel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        }
    }

    /**
     * Displays a single Channel model.
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
     * Creates a new Channel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!isset(Yii::$app->user->id) )
        {
            return $this->redirect(['/site/login']);     
        }else{        
        $model = new Channel();

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->pkChannelID]);
//        } else 
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
                $model->channelAddDate =  date('Y-m-d H:i:s');
                $model->channelUpdateDate =  date('Y-m-d H:i:s');
                $model->fkPartnerID = $_POST['Partners']['pkPartnerID'];
                $model->fkChannelCategoryID = $_POST['ChannelCategory']['pkChannelCategoryID'];
//              $x = Yii::$app->request->post(); echo '<pre>';print_r($_POST);print_r($_POST['Partners']['pkPartnerID']); die;
            if($model->save())
            {
                 Yii::$app->session->setFlash('createchannel', true);
                 return   $this->redirect(['index']);
                
            }
    
            }else{
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        }
    }

    /**
     * Updates an existing Channel model.
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
//            return $this->redirect(['view', 'id' => $model->pkChannelID]);
//        } else {
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
                $model->channelUpdateDate =  date('Y-m-d H:i:s');
                 
            if($model->save())
            {
                 Yii::$app->session->setFlash('updatechannel', true);
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
     * Deletes an existing Channel model.
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
        Yii::$app->session->setFlash('deletechannel', true);
        return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Channel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Channel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Channel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
