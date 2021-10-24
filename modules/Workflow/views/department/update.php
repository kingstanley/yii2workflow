<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Department */

$this->title = 'Update Department: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="department-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div> 
<?php 
$script = <<< JS

$('#department').on('beforeSubmit', function(e){
    let \$form = $(this);
    let formArray =  \$form.serializeArray();
    // console.log('jquery json: ',formArray);
   var formJson = getFormAsJson(formArray);
 
$.ajax({
  url: "/restapi/department/update?id=$model->id",
  type: "PUT",
  data: formJson,
   
}).done(function(result){
    console.log('Result: ',result );
    $.pjax.reload({container:'#department-detail'})
}).fail(function(err){
    console.log("Saved Level: ",err );
});

return false;
});

JS;
$this->registerJs($script);

?>