<?php

namespace app\controllers\restapi;

use app\models\Request;
use app\models\RequestApproval;
use app\models\User;
use app\models\ApprovalMapping;
use Yii;

class ApprovalController extends \yii\rest\ActiveController
{
    public $modelClass = '\app\models\RequestApproval';
    public function actionIndex()
    {
        return $this->render('index');
    }

public function actionApprove($requestId)
{
    $requestApproval = new RequestApproval();
    $request = Request::findOne(['id'=>$requestId]);
     $approvalMapping = ApprovalMapping::findOne(['userId'=> Yii::$app->user->id]);
     if($request->maxApprovalLevel == $approvalMapping->approvalLevelId){
        $requestApproval->approvalStatus = 'Approved';
        $request->approvalStatus = 'Approved';
     }else{
         $requestApproval->approvalStatus = 'InProgress';
         $request->approvalStatus = 'InProgress';
     }
// check if the user is the first to approve or the approval level before his has approved
  if($approvalMapping->approvalLevelId == 1 && !RequestApproval::findOne(['requestId'=> $requestId, 'approvalPersonId'=>Yii::$app->user->id])){
      $request->currentApprovalLevel = 1;
     $request->save();
     $requestApproval->requestId = $requestId;
     $requestApproval->approvalLevelId = $approvalMapping->approvalLevelId;
     $requestApproval->approvalPersonId = Yii::$app->user->id;
     $requestApproval->save();
  return 'Your approval has been saved';
// return ['user' => Yii::$app->user->id,'mapping'=> $approvalMapping, $request];
  } 
//   User is not the first approval person. The approval person before him must have approved
if(RequestApproval::findOne(['requestId'=> $requestId, 'approvalLevelId' => $approvalMapping->approvalLevelId - 1]  )){
    if(!RequestApproval::findOne(['requestId'=> $requestId, 'approvalPersonId'=>Yii::$app->user->id])){
    $request->currentApprovalLevel =  $approvalMapping->approvalLevelId;
     $request->save();
     $requestApproval->requestId = $requestId;
     $requestApproval->approvalLevelId = $approvalMapping->approvalLevelId;
     $requestApproval->approvalPersonId = Yii::$app->user->id;
     $requestApproval->save();
 return $requestApproval;
 }
return 'You have already approved this request';
  }else{
      return 'The user who is suppose to approve before you have not approved yet';
  }
   
}
public function actionReject($requestId){
       $approvalMapping = ApprovalMapping::findOne(['userId'=> Yii::$app->user->id]);
    if(RequestApproval::findOne(['requestId'=> $requestId, 'approvalLevelId' => $approvalMapping->approvalLevelId - 1] )){
    $requestApproval = new RequestApproval();
    $request = Request::findOne(['id'=>$requestId]);
    $requestApproval = new RequestApproval();
    $request->approvalStatus = 'Rejected';

    // update requestApproval data
    $requestApproval->approvalStatus = 'Rejected';
    $requestApproval->approvalPersonId = Yii::$app->user->id;
    $requestApproval->approvalLevelId = ApprovalMapping::findOne(['userId'=> Yii::$app->user->id])->approvalLevelId;

    // save request and requestApproval
    $request->save();
    $requestApproval->save();
 return 'Your rejection has been saved';
}
return 'The user who is suppose to approve before you have not approved yet';
}

}
