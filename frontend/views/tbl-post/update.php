<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPost */

$this->title = 'Update Tbl Post: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-post-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
