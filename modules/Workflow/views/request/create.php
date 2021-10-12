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
    // console.log('jquery json: ',$.parseJSON(formArray));
   var formJson = {};
formArray.map(function(item, index) {
    console.log('index: ',index);
    if(index !=0){
        if ( formJson[item.name] ) {
        if ( typeof(formJson[item.name]) === "string" ) {
            
            formJson[item.name] = [formJson[item.name]];
        }
        formJson[item.name].push(item.value);
    } else {
        let key = item.name.split('[')[1];

        if(key){
            key = key.split('');
            key = key.splice(0, key.length -1)
            key = key.join('');
        }
            console.log("Key: ",key);
        formJson[key] = item.value;
    }
    }
});
    // console.log("Registed JS on form: ",formJson);
    
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

