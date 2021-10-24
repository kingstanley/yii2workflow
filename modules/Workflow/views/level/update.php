<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ApprovalLevel */

$this->title = 'Update Approval Level: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Approval Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="approval-level-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php 
$script = <<< JS

$('form#{$model->formName()}').on('beforeSubmit', function(e){
    let \$form = $(this);
    let formArray =  \$form.serializeArray(); 
   const formJson = getFormAsJson(formArray);
 
$.ajax({
  url: "/restapi/level/update?id=$model->id",
  type: "PUT",
  data: formJson,
   
}).done(function(result){
    console.log('Result: ',result);
    $.pjax.reload({container:'#level-detail'})
}).fail(function(err){
    console.log("Save department: ",err );
});

return false;
});

JS;
$this->registerJs($script);

?>