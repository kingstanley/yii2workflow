<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ApprovalLevel */

$this->title = 'Create Approval Level';
$this->params['breadcrumbs'][] = ['label' => 'Approval Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="approval-level-create">

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
   let formJson = getFormAsJson(formArray);

    // console.log("Registed JS on form: ",$model->id);
   
    $.post(
        "/restapi/level/create",
      formJson
    ).done(function(result){
        if(result){
            console.log("Create Result: ",result)
         $(\$form).trigger('reset');
        $.pjax.reload({container:'#level-grid'})
        }else{
            $('#message').html(result);
        }
        // alert("Result result ", result);
    }).fail(function(err){
        console.log("Create Error: ", err);
        
    })
 
    return false;
});
 
JS;
$this->registerJs($script);
?>
</div>
