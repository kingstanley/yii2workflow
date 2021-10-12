<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use \app\models\Department;
use \app\models\User;
use \app\models\ApprovalLevel;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\ApprovalMapping */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="approval-mapping-form">
<?php Pjax::begin()?>
    <?php $form = ActiveForm::begin(['options' => ['id'=>$model->formName(), 'data-pjax'=>true]]); ?>

     <?= $form->field($model, 'userId')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(User::find()->all(), 'id','fullName'),
    'options' => ['placeholder' => 'Select a User ...', 'id'=>'userId'],
    'pluginOptions' => [
        'allowClear' => true]
    ]);
    ?>
    <?= $form->field($model,'departmentId')->textInput(['readonly'=> true, 'id'=>'department-id'])?>
    <div id='department-name' class="mb-4" ></div>
 
    
   
     <?= $form->field($model, 'approvalLevelId')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(ApprovalLevel::find()->all(), 'id','name'),
    'options' => ['placeholder' => 'Select an Approval Level ...'],
    'pluginOptions' => [
        'allowClear' => true]
    ]
        );
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?php Pjax::end()?>
</div>

<?php 
$script = <<< JS
// use ajax to update component

$('#userId').change(function(){
    let userId = $(this).val();
    console.log(userId);
$.ajax({
    url: "/restapi/user/department?id=" + userId,
      
}).done(function(department){
    console.log('result: ', department);
     $('#department-id').attr('value', department.id)
    $('#department-name').html(department.name)
    
     
}).fail(function(err){
    console.log('Error: ', err);
})

})

JS;
$this->registerJs($script);
?>