<?php

namespace app\controllers\restapi;

class LevelController extends \yii\rest\ActiveController
{
    public $modelClass = '\app\models\ApprovalLevel';
    public function actionIndex()
    {
        return $this->render('index');
    }

}
