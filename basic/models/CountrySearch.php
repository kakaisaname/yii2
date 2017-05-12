<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Country;

/**
 * CountrySearch represents the model behind the search form about `app\models\Country`.
 */
class CountrySearch extends Country
{
    /**
     * @inheritdoc
     */
    public function rules() //输入查询项的规则 同时也是能在表格中查询的关键,只有有验证的字段才会有查询框
    {
        return [
            [['code', 'name'], 'safe'],
            [['population'], 'integer'],
            [['ctime'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Country::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [      //实现分页
                'pageSize' => 5,
            ],
            'sort'=>[
                'defaultOrder' =>[
                    'ctime' => SORT_DESC   //按时间排序（倒序）
                ]
            ]
        ]);

        $this->load($params);//加载参数

        if (!$this->validate()) { //如果没通过验证，则返回错误信息
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider; //如population 不为数字,则告诉填写必须为数字
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'population' => $this->population, //等于
        ]);
        $query->andFilterWhere([
            'ctime' => $this->ctime, //等于
        ]);
        $query->andFilterWhere(['like', 'code', $this->code]) //模糊查找
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
