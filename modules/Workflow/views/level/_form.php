<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\ApprovalLevel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="approval-level-form">
<?php Pjax::begin()?>
    <?php $form = ActiveForm::begin(['options' => ['id'=>$model->formName(), 'data-pjax'=>true]]); ?>

    <?= $form->field($model, 'level')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'createdAt')->textInput() ?>

    <?= $form->field($model, 'updatedAt')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?php Pjax::end()?>
</div>
