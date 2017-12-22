<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Daerah;

/**
 * DaerahSearch represents the model behind the search form about `app\models\Daerah`.
 */
class DaerahSearch extends Daerah
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['daerah_id', 'negeri_id'], 'integer'],
            [['daerah_nama'], 'safe'],
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
        $query = Daerah::find();

        $query->joinWith('negeri negeri');
        $query->orderBy(['negeri.negeri_nama'=>SORT_ASC]);
        $query->orderBy(['daerah_nama'=>SORT_ASC]);

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
            'daerah_id' => $this->daerah_id,
            'negeri_id' => $this->negeri_id,
        ]);

        $query->andFilterWhere(['like', 'daerah_nama', $this->daerah_nama]);

        return $dataProvider;
    }
}
