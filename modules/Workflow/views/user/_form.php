<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use app\models\Department; 
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
<?php Pjax::begin()?>
    <?php $form = ActiveForm::begin([
'options' =>['data-pjax' => true, 'id' => $model->formName()]]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fullName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'authKey')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accessToken')->textInput(['maxlength' => true]) ?> -->
  <?= $form->field($model, 'departmentId')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Department::find()->all(), 'id','name'),
    'options' => ['placeholder' => 'Select a Department ...'],
    'pluginOptions' => [
        'allowClear' => true
    ]]);
    ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success',"id"=>'submit-user-form']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?php Pjax::end()?>
<div class="message"></div> 

<?php
$script = <<< JS

 console.log('Form')
 $('form#{$model->formName()}').on('beforeSubmit',function(e){
     console.log('Event: ',e);
 let \$form = $(this);
    let formArray =  \$form.serializeArray();
// console.log("formArray: ", formArray);

 const userFormJson = getFormAsJson(formArray)
   
     $.post(
        "/restapi/user/create",
      userFormJson
    ).done(function(result){
        
        if(result){
            console.log("Create Result: ",result)
         $(\$form).trigger('reset');
        $.pjax.reload({container:'#user-grid'})
        }else{
            $('#message').html(result);
        }
        // alert("Result result ", result);
    }).fail(function(err){
        console.log("Create Error: ", err);
        
    })

   
return false;
})
   
JS;
$this->registerJs($script);
?>


</div>
