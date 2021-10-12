<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Request */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="request-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model'=>$model,
        // 'template' => '<p><b>{label}</b>: {value}</p>',
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            "requestor",
//            [
// 'label' => 'Requestor',
// 'value' => Html::a(Html::encode(
// $model->requestor->id),
// ['user/view','id'=>$model->requestor]),
// 'format' => 'html'
// ],
            'currentApprovalLevel',
            'approvalStatus',
            'maxApprovalLevel',
            'departmentId',
            'createdAt',
            'updatedAt',
        ],
    ]) ?>

</div>
