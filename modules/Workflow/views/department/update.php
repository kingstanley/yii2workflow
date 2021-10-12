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