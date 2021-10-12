<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Department */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-form">

    <!-- <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createdAt')->textInput() ?>

    <?= $form->field($model, 'updatedAt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?> -->


<div class="message"></div>
<div class="department-form">

<?php yii\widgets\Pjax::begin() ?>
<?php $form = ActiveForm::begin(['options' =>  [ 'data-pjax' => true,'id' => $model->formName() ]]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 200]) ?>

    <!-- <?= $form->field($model, 'createdAt')->textInput() ?>

    <?= $form->field($model, 'updatedAt')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app',"Create" ) : Yii::t('app', "Update"), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', "id"=>'submit-department-form']) ?>
    </div>

<?php ActiveForm::end(); ?>
<?php yii\widgets\Pjax::end() ?>
</div>



</div>

   