<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<?= Html::a('Delete', ['delete', 'id' => $model->code], [
    'class' => 'btn btn-danger',
    'data' => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method' => 'post',
    ],
]) ?>
<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'code',
        'name',
        'population',
    ],
]) ?>
