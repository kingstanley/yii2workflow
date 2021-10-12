<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
$url = \Yii::$app->request->baseUrl;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
<p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
   <!-- <p>
        <?= Html::button('Create User', [ 'value'=>Url::to("$url/Workflow/user/create"), 'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p> -->

    <?php Pjax::begin(['id'=> 'user-grid']); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'fullName',
            'password',
            'authKey',
            //'accessToken',
            //'departmentId',
            //'createdAt',
            //'updatedAt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
