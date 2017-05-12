
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '荞面';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">
    <!--显示搜索项-->
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?> <!--点击submitButton按钮 又去找$searchModel了-->

    <?= GridView::widget([
       'tableOptions' => ['class' => 'table table-bordered table-hover'],
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,  //在列表中显示查询项
        'layout'=> '{items}<div class="text-right tooltip-demo">{pager}</div>',
        'pager'=>[
            //'options'=>['class'=>'hidden']//关闭分页
            'firstPageLabel'=>"首页",
            'prevPageLabel'=>'上一页',
            'nextPageLabel'=>'下一页',
            'lastPageLabel'=>'末页',
        ],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => '编号'
            ],//显示行号
            [
                'attribute' => 'code',
                'label' => '别名',
                'format' => 'text',
//                'options' => [
//                    'width' => 75,
//                ]
            ],
            [
                'attribute' =>'name',
                'label' => '名称',
            ],
            [
                'attribute' => 'population',
                'label' => '人口总数'
            ],
            [
                'attribute' => 'ctime',
                'label' => '创建时间',
                'value' => function($model) {
                    return Yii::$app->formatter->asDate($model->ctime,'php:Y-m-d H:i:s');
                }
            ],
//            ['class' => 'yii\grid\ActionColumn'], // 这个直接显示查看，编辑，删除按钮，且有对应的表单，可以用以下代替
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view' => function($url,$model,$key) {
                        return Html::a('',['view','id'=>$key],['class'=>'glyphicon glyphicon-eye-open']);
                    }
                ],
                'options' => [
                    'width' => 5
                ]
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'buttons' => [
                    'view' => function($url,$model,$key) {
                        return Html::a('',['update','id'=>$key],['class'=>'glyphicon glyphicon-pencil']);
                    }
                ],
                'options' => [
                    'width' => 5
                ]
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function($url,$model,$key) {
                        return Html::a('',['delete','id'=>$key],[
                            'class'=>'glyphicon glyphicon-trash',
                            'data' =>[
                                'confirm' => '你确认要删除吗？',
                                'method' => 'post'
                            ]
                        ]);
                    }
                ],
                'options' => [
                    'width' => 5
                ]
            ]
        ],
    ]); ?>
</div>