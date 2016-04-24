<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblPost */

$this->title = 'Create Tbl Post';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
