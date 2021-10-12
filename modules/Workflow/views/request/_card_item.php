<?php
use yii\helpers\Html;
?>

<?php $model ?>

<div class="card m-2" style="width: 18rem; height:330px" >
<span hidden id="id"><?php echo $model->id ?> </span>
  <h5 class="card-header bg-dark text-white card-title" id="title"><?php echo $model->title ?></h5>
  <div class="card-body">
    <h5 class="card-title">Status:  <?php echo $model->approvalStatus?></h5>
    <p class="card-text"><?php echo $model->getShortDescription() ?></p>
    <span class="m-1">
      <?php echo 'Created On: '. date("Y-m-d", $model->createdAt);?>
    </span>
  </div>
   
  <div class="card-body">
    <?= Html::a('Update', ["/Workflow/request/update?id=$model->id"], ['class' => 'btn text-success btn-link']) ?>
    <!-- <button  class="btn  btn-link">View</button> -->
     <?= Html::a('View', ["/Workflow/request/view?id=$model->id"], ['class' => 'btn btn-link']) ?>
  </div>
  <div >
    <span id="message" class="alet bg-dark text-white mb-4"></span>
  </div>
</div>

