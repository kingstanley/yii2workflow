<?php

namespace app\modules\Workflow;

/**
 * Workflow module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\Workflow\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->layout = 'main';
        // custom initialization code goes here
    }
}
