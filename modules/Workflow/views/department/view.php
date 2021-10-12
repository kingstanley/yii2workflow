<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\models\Department */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<?php $url = \Yii::$app->request->baseUrl;?>
<div class="department-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
         <?= Html::button('Update', [ 'value'=>Url::to("$url/Workflow/department/update?id=$model->id"), 'class' => 'btn btn-primary','id'=>'modalButton']) ?>
        <!-- <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?> -->
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php  Pjax::begin(['id'=>'department-detail',]) ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'createdAt',
            'updatedAt',
        ],
    ]) ?>
<?php Pjax::end()?>
</div>
