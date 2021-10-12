<?php

namespace app\controllers\restapi;
use yii\filters\auth\HttpBasicAuth;
use \app\models\Department;
use \app\models\User;

class UserController extends \yii\rest\ActiveController
{
    public $modelClass = '\app\models\user';

    public function actionDepartment($id){
        $user = User::findOne($id);
        $department = Department::findOne($user->departmentId);
       return $department;
    }
}


?>