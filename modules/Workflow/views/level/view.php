<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\ApprovalLevel */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Approval Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?php $url = \Yii::$app->request->baseUrl;?>
<div class="approval-level-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
                <?= Html::button('Update', [ 'value'=>Url::to("$url/Workflow/level/update?id=$model->id"), 'class' => 'btn btn-primary','id'=>'modalButton']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php  Pjax::begin(['id'=>'level-detail',]) ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'level',
            'description',
            'name',
            'createdAt',
            'updatedAt',
        ],
    ]) ?>
<?php Pjax::end()?>
</div>
