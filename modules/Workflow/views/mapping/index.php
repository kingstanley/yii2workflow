<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ApprovalMappingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Approval Mappings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="approval-mapping-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Approval Mapping', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

     

    <?php Pjax::begin(['id'=>'mapping-grid']); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'userId',
            'departmentId',
            'approvalLevelId',
            'createdAt',
            //'updatedAt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
