<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TblPostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nasa photos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a('Add new row', ['create'], ['class' => 'btn btn-success']); ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['class' => 'yii\grid\ActionColumn'],
            [
                'attribute'=>'image_path',
                'label'=>'img',
                'format'=>'html',
                'content' => function($data){
                    $url = $data->getImageurl();
                    return Html::img($url, ['alt'=>'yii','width'=>'250']);
                }
            ],
            'title',
            [
                'attribute'=>'url',
                'label'=>'pub_date',
                'format'=>'utl',
                'content' => function($data){
//                    $url = ;
                    return Html::a(date('d.m.Y H:i:s',strtotime($data->pub_date)),$data->link_to_nasa, ['target'=>'_blank']);
                }
            ],
            [
                'attribute' => 'newstitle',
                'value' => function ($data) {
                    return Html::a(date('d.m.Y H:i:s',strtotime($data->up_date)), Url::to(['view', 'id' => $data->id]));
                },
                'format' => 'raw',
            ],
//            'up_date',
//            'description',
            // 'img',
            // 'link_to_nasa',


        ],
    ]); ?>
</div>
