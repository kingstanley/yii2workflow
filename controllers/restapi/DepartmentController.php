<?php

namespace app\controllers\restapi;
use yii\filters\auth\HttpBasicAuth;

class DepartmentController extends \yii\rest\ActiveController
{

    public $modelClass = 'app\models\department';
    // public function actionIndex()
    // {
    //     return $this->render('index');
    // }
    public function behaviors()
{
    $behaviors = parent::behaviors();

    // remove authentication filter
    $auth = $behaviors['authenticator'];
    unset($behaviors['authenticator']);
    
    // add CORS filter
    $behaviors['corsFilter'] = [
        'class' => \yii\filters\Cors::class,
    ];
    
    // re-add authentication filter
    $behaviors['authenticator'] = $auth;
    // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
    $behaviors['authenticator']['except'] = ['options'];

    return $behaviors;
}

}
