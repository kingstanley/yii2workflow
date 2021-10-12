<?php

namespace app\controllers\restapi;

class MappingController extends \yii\rest\ActiveController
{
    public $modelClass = '\app\models\ApprovalMapping';
    public function actionIndex()
    {
        return $this->render('index');
    }

}
