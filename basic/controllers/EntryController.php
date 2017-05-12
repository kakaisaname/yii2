<?php
namespace app\controllers;

use yii;
use yii\web\controller;
use app\models\EntryForm;

class EntryController extends Controller
{
	public function actionEntry()
	{
		$model = new EntryForm;
		if ($model->load(Yii::$app->request->post()) && $model->validate()){
			//
			return $this->render('entry-confirm',['model'=>$model]);
		} else {
			return $this->render('entry',['model'=>$model]);
		}
	}
}
