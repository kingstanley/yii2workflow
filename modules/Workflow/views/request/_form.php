<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Department; 
use kartik\select2\Select2;
use yii\widgets\Pjax;
use yii\bootstrap4\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Request */
/* @var $form yii\widgets\ActiveForm */
?>
<?php  
if($model->id){
    $url = \Yii::$app->request->baseUrl . "/restapi/level/update?$model->id";
    $action = 'PUT';
}else{
    $url = \Yii::$app->request->baseUrl . "/restapi/level/create";
    $action = 'POST';
}
?>
<div class="request-form">
    
<?php Pjax::begin(); ?>
    <?php $form = ActiveForm::begin(['options'=>['id'=>$model->formName()]]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'requestor')->textInput(['value'=>Yii::$app->user->id,'type'=> 'number','hidden'=>true]) ?>

    

    <?= $form->field($model, 'departmentId')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Department::find()->all(), 'id','name'),
    'options' => ['placeholder' => 'Select a Department ...'],
    'pluginOptions' => [
        'allowClear' => true
    ]]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php Pjax::end() ;?>

    </div>

   