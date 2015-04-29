<?php

namespace backend\controllers;

use backend\models\Contact;
use yii;
class ContactrequestController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model= new Contact();
         $dataProvider = $model->search(Yii::$app->request->queryParams);
        return $this->render('index',['dataProvider'=>$dataProvider]);
    }
    
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
          Yii::$app->session->setFlash('deleterequest', true);
        return $this->redirect(['index']);
       
    }
    protected function findModel($id)
    {
        if (($model = Contact::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
