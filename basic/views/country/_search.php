
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CountrySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

        <div class="col-xs-3">
            <?= $form->field($model, 'code',['labelOptions'=>['label'=>'别名','style'=>'color:green;']]) ?>
        </div>
        <div class="col-xs-3">
            <?= $form->field($model, 'name')->label('国家',['style' => 'color:green']) ?>
        </div>
        <div class="col-xs-3">
            <?= $form->field($model, 'population')->label('人口') ?>
        </div>

        <div class="col-xs-1">
            <div class="form-group field-search">
                <?= Html::submitButton('搜索', ['class' => 'btn btn-primary'])?>
            </div>
        </div>
        <div class="col-xs-1">
            <?= Html::a('创建数据', ['create'], ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>