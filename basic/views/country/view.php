
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->code], ['class' => 'btn btn-success']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->code], [
            'class' => 'btn btn-info',
            'data' => [
                'confirm' => '你确定要删除这条数据吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'code',
                'label' => '<font color="#6495ed">别名</font>',
            ],
            [
                'attribute' => 'name',
                'label' => '<font color="#6495ed">名称</font>'
            ],
            [
                'attribute' => 'population',
                'label' => '<font color="#6495ed">人数</font>'
            ]
        ],
    ]) ?>

</div>