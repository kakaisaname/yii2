
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container" style="80%">
        <div class="row">
            <div class="col-md-2">
                <div class="list-group">
                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
            <div class="col-md-7">

                <div class="panel panel-info">
                    <div class="panel-heading" style="text-align: center"><?=$model->isNewRecord ? '新增数据' : '修改数据'?></div>
                    <div class="pannel-body">
                        <form class="form-horizontal">
                            <div class="col-xs-8">
                                <div class="form-group" style="padding-top: 2%;">
                                    <?= $form->field($model, 'code',['template' => '<div class="input-group"><label class="input-group-addon">别名</label>{input}</div>{error}',]) ?>
                                </div>
                                <div class="form-group" style="padding-top: 1%;">
                                    <?= $form->field($model, 'name',['template' => '<div class="input-group"><label class="input-group-addon">名称</label>{input}</div>{error}',]) ?>
                                </div>
                                <div class="form-group" style="padding-top: 1%;">
                                    <?= $form->field($model, 'population',['template' => '<div class="input-group"><label class="input-group-addon">人数</label>{input}</div>{error}',]) ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>