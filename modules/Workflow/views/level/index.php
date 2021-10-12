<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ApprovalLevelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Approval Levels';
$this->params['breadcrumbs'][] = $this->title;

$url = \Yii::$app->request->baseUrl;
?>
<div class="approval-level-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Create Approval Level', [ 'value'=>Url::to("$url/Workflow/level/create"), 'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>

    <?php Pjax::begin(['id'=>'level-grid']); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'level',
            'description',
            'name',
            'createdAt',
            //'updatedAt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
