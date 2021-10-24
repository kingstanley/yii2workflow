<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Request */

$this->title = 'Update Request: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="request-update">

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
 
    // console.log("Registed JS on form: ",formJson);
    
    $.ajax({
  type: 'PUT',
  url: '/restapi/request/update?id=$model->id',
  data: formJson,
  success: function(result){
     console.log('result: ',result);
  },
  error: function(err){
      console.log('Error: ', err);
},
  dataType: 'application/json'
});
   

    return false;
});


  

JS;
$this->registerJs($script);
?>


</div>
