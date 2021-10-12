<?php

namespace app\controllers\restapi;

class RequestController extends \yii\rest\ActiveController
{
    public $modelClass = '\app\models\Request';
    public function actionIndex()
    {
        return $this->render('index');
    }

}
