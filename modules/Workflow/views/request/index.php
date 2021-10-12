<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url; 
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Requests';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $url = \Yii::$app->request->baseUrl ?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>
 <p>
        <?= Html::a('Create Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <!-- <p>
        <?= Html::button('Create Request', [ 'value'=>Url::to("$url/Workflow/request/create"), 'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p> -->
    <?php Pjax::begin(['id'=>'request-grid']); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

     <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'options'=>[
            'class'=>'row'
        ],
        "itemView" =>'_card_item']); ?>


    <?php Pjax::end(); ?>

    
</div>
