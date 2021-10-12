<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\RequestApprovalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Request Approvals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-approval-index">

    <h1><?= Html::encode($this->title) ?></h1> 
    <!-- <p>
        <?= Html::a('Create Request Approval', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?php Pjax::begin(['id'=>'request-grid']); ?> 
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'options'=>[
            'class'=>'row'
        ],
        "itemView" =>'_card_item'
    ]); ?>

     <?php Pjax::end(); ?>  
   
</div>
