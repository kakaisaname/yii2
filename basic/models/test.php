<?php

namespace app\models;

use yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Country;

class CountrySearch extends Country
{
    public function rules()
    {
        return [
            [['code','name'],'safe'],
            [['population'],'integer'],
        ];
    }
    public function search($params)
    {
        $query = Country::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'population' => $this->population,
        ]);
        $query->andFilterWhere(['like','code',$this->code])
            ->andFilterWhere(['like','name',$this->name]);
        return $dataProvider;
    }
}