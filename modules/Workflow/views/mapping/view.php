<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\models\ApprovalMapping */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Approval Mappings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="approval-mapping-view">

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
<?php  Pjax::begin(['id'=>'mapping-detail',]) ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'userId',
            'departmentId',
            'approvalLevelId',
            'createdAt',
            'updatedAt',
        ],
    ]) ?>
<?php Pjax::end()?>
</div>
