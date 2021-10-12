<?php

namespace app\controllers\restapi;
use yii\db\ActiveRecord;
use \app\models\Request;
use \app\models\ApprovalMapping;
use yii\rest\ActiveController;
use yii\web\Response; 
use yii\db\Query;

use Yii;

class RequestController extends ActiveController
{
    public $modelClass = '\app\models\Request';
    public function actionIndex()
    {
        return $this->render('index');
    }
 

    public function actionSave(){
        
	Yii::$app->response->format = Response::FORMAT_JSON;
    $model = new Request();
	$post =  Yii::$app->request->post();
    $model->load($this->request->post());

    // Get total number of register approval persons in the department
        $q = new Query();
        $count =  $q->select('COUNT(*)')
        ->from('approval_mapping')->where(['departmentId'=>$post['departmentId']])
        ->count();

        $model->maxApprovalLevel = $count;
        $model->title = $post['title'];
        $model->requestor = $post['requestor'];
        $model->description = $post['description'];
        $model->departmentId = $post['departmentId'];

        $model->save();
     return $model;
    }
}
