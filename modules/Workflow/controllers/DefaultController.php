<?php

namespace app\modules\Workflow\controllers;

use yii\web\Controller;

/**
 * Default controller for the `Workflow` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
