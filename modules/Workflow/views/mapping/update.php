<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ApprovalMapping */

$this->title = 'Update Approval Mapping: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Approval Mappings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="approval-mapping-update">

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
    
   let formJson = getFormAsJson(formArray);
 
$.ajax({
  url: "/restapi/mapping/update?id=$model->id",
  type: "PUT",
  data: formJson,
   
}).done(function(result){
    console.log('Result: ',result);
    $.pjax.reload({container:'#mapping-detail'})
}).fail(function(err){
    console.log("Save mapping: ",err );
});

return false;
});

JS;
$this->registerJs($script);

?>