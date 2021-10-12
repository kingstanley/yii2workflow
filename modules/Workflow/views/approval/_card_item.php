<?php
use yii\helpers\Html;
?>

<?php $model ?>

<div class="card m-2" style="width: 18rem; height:330px" >

  <h5 class="card-header bg-dark text-white card-title" id="title"><?php echo $model->title ?></h5>
  <div class="card-body">
    <h5 class="card-title">Status:  <?php echo $model->approvalStatus?></h5>
    <p class="card-text"><?php echo $model->getShortDescription() ?></p>
  </div>
   
  <div class="card-body">
    <button  class="btn text-danger btn-link" id="reject" onclick="reject(<?php echo $model->id ?>)">Reject</button>
    <button  class="btn text-success btn-link" id="approve" onclick="approve(<?php echo $model->id ?>)">Approve</button>
    <!-- <button  class="btn  btn-link">View</button> -->
     <?= Html::a('View', ["/Workflow/request/view?id=$model->id"], ['class' => 'btn btn-link']) ?>
  </div> 
    <span id="<?php echo $model->id ?>" class=" alert-dark  m-1" role="alert" style="display:none"></span>
  
</div>


<script>
  // Using vanila Javascript 
  function approve(requestId){
    console.log("Data: ", requestId);
    $.post(
        "/restapi/approval/approve?requestId=" + requestId,
      ''
    ).done(function(result){

    const message =  document.getElementById(requestId);
    message.innerText = result;
    message.style.display = 'block';
     
        setTimeout(() => {
          $.pjax.reload({container:'#request-grid'});
        }, 5000);
        
        
    }).fail(function(err){
        console.log("Create Error: ", err);
        
    })
 
  }

  function reject(requestId){
    $.post(
        "/restapi/approval/reject?requestId=" + requestId,
      ''
    ).done(function(result){
        
        
    const message =  document.getElementById(requestId);
    message.innerText = result;
    message.style.display = 'block'; 
        setTimeout(() => {
          $.pjax.reload({container:'#request-grid'});
        }, 5000);
        
        
    }).fail(function(err){
        console.log("Create Error: ", err);
    });
  }
</script>
 