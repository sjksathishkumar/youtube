<?php

namespace backend\controllers;
use Yii;
use app\models\staff;
use app\models\searchStaff;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class StaffController extends \yii\web\Controller
{
    public function actionIndex()
    {
       if(!isset(Yii::$app->user->id) )
                 {
                   return $this->redirect(['/site/login']);     
		 }
                 
            $staffModel = new searchStaff();
            //print_r(Yii::$app->request->queryParams);
            //exit();
            $dataProvider = $staffModel->search(Yii::$app->request->queryParams);
            $searchModel = new searchStaff();
            
            return $this->render('index', [
                'searchModel'=>$searchModel,
            'staffModel' => $staffModel,
            'dataProvider' => $dataProvider,
            ]);
    }
    public function actionCreate()
    {
         if(!isset(Yii::$app->user->id) )
            {
                return $this->redirect(['/site/login']);     
            }
           // print_r(Yii::$app->request->post());
           // exit();
        $model = new staff();
        if($model->load(Yii::$app->request->post()) && $model->validate()) {
        $model->staffDateAdded = date('Y-m-d H:i:s');
        $model->staffDateUpdated =  date('Y-m-d H:i:s');
       $password = Yii::$app->security->generatePasswordHash($_POST['staff']['password']);
       $model->staffPassword=$password;
        if($model->save())
            {
               Yii::$app->session->setFlash('create', true);
                 return   $this->redirect(['index']);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
           }
    }

    public function actionView($id)
    {
       
        $model = $this->findModel($id);
        $searchmode= $model->staffview($id);
        return $this->render('view', [
            'model' => $searchmode[0],
        ]);
    }
    public function actionUpdate($id)
    {
         if(!isset(Yii::$app->user->id) )
            {
                return $this->redirect(['/site/login']);     
            }
         $model = $this->findModel($id);
         $staff=$model->getAttributes(['staffPassword']);
         //$model->password=$staff['staffPassword'];
         //$model->confirm_password=$staff['staffPassword'];
         $modelTicketIssue = \app\models\department::findOne(['id'=> $id]);
         if ($model->load(Yii::$app->request->post()) ) {
             $password = Yii::$app->security->generatePasswordHash($_POST['staff']['password']);
             $model->staffPassword=$password;
            if($model->save())
            {
                Yii::$app->session->setFlash('update', true);
             return   $this->redirect(['index']);
                
            }
           else {
            return $this->render('update', [
                'model' => $model,
                'searchModelIssue'=>$modelTicketIssue,
            ]);
        }
             
        } else {
            return $this->render('update', [
                'model' => $model,
                'searchModelIssue'=>$modelTicketIssue,
            ]);
        }
    }

    public function actionDelete($id)
    {
       
        $this->findModel($id)->delete();
          Yii::$app->session->setFlash('deletestaff', true);
        return $this->redirect(['index']);

    }
    
    protected function findModel($id)
    {
        if (($model = staff::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
