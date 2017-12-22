<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Court;

/**
 * CourtSearch represents the model behind the search form about `app\models\Court`.
 */
class CourtSearch extends Court
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['court_id', 'location_id'], 'integer'],
            [['court_name'], 'safe'],
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
        $query = Court::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'court_id' => $this->court_id,
            'location_id' => $this->location_id,
        ]);

        $query->andFilterWhere(['like', 'court_name', $this->court_name]);

        return $dataProvider;
    }
}
