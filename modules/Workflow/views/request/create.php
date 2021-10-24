<?php

use yii\helpers\Html;
use \app\models\Department;

/* @var $this yii\web\View */
/* @var $model app\models\Request */

$this->title = 'Create Request';
$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>


<?php
$script = <<< JS

$('form#{$model->formName()}').on('beforeSubmit', function(e){
    let \$form = $(this);
    let formArray =  \$form.serializeArray(); 
   const formJson = getFormAsJson(formArray);
  
    $.ajax({
  type: 'POST',
  url: '/restapi/request/save',
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

