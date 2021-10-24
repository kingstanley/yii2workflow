<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ApprovalMapping */

$this->title = 'Create Approval Mapping';
$this->params['breadcrumbs'][] = ['label' => 'Approval Mappings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="approval-mapping-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

<?php

$script = <<< JS

$('form#{$model->formName()}').on('beforeSubmit', function(e){
    let \$form = $(this);
    let formArray =  \$form.serializeArray();
   let formJson = getFormAsJson(formArray);

    console.log("Registed JS on form: ",$model->id);
    
    $.post(
        "/restapi/mapping/create",
      formJson
    ).done(function(result){
        if(result){
            console.log("Create Result: ",result)
         $(\$form).trigger('reset');
        $.pjax.reload({container:'#mapping-grid'})
        }else{
            $('#message').html(result);
        }
    }).fail(function(err){
        console.log("Create Error: ", err);    
    })
 
    return false;
});
 
JS;
$this->registerJs($script);
?>
</div>

