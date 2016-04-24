<?php

// use Yii;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TblPostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Наса фоторяды';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?php

    ?>
    <?php
        if(!Yii::$app->user->getIsGuest()){
            echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    // 'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id',
                        'title',
                        'anons:ntext',
                        'description',
                         ['class' => 'yii\grid\ActionColumn'],
                    ],
            ]);
        }else{
            echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    // 'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id',
                        'title',
                        'anons:ntext',
                        'description',
    //                    ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);
        }
      ?>
</div>
