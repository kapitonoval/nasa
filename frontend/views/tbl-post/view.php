<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TblPost */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-post-view">

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
//            'id',
            [
                'attribute'=>'photo',
                'value'=>'../../upload-content/img/'.$model->img,
                'format' => ['image',['width'=>'350','height'=>'350']],
            ],
            [
                'attribute'=>'Public date',
                'format'=>'raw',
                'value'=>Html::a(date('d.m.Y H:i:s',strtotime($model->pub_date)), $model->link_to_nasa,['target' => '_blank']),
            ],
//            [Html::a('$model',$model->link_to_nasa)],
//            'pub_date:datetime',
            [
                'attribute'=>'Upload date',
                'format'=>'raw',
                'value'=>date('d.m.Y H:i:s',strtotime($model->pub_date)),
            ],
//            'up_date:datetime',
            'description',

//            'img',
//            'link_to_nasa',
        ],
    ]);
    ?>

</div>
