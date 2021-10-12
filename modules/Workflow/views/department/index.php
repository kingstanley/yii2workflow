<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap4\Modal;
use yii\web\View ;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = $this->title;
$url = \Yii::$app->request->baseUrl;
?>
<div class="department-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Create Department', [ 'value'=>Url::to("$url/Workflow/department/create"), 'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>


    <?php Pjax::begin(['id'=> 'department-grid']); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel, 
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'createdAt',
            'updatedAt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
 


 