<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Booking;

/**
 * BookingSearch represents the model behind the search form about `app\models\Booking`.
 */
class BookingSearch extends Booking
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['booking_id', 'booking_activeness', 'booking_parent_id','booking_status'], 'integer'],
            [['booking_code','booking_name', 'booking_type', 'booking_date','start_time','end_time','ip_address','submitted_date','user_id','court_id'], 'safe'],
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
        $query = Booking::find();

        if (!Yii::$app->user->can('Admin')) {
            $query->andWhere(['user_id'=>Yii::$app->user->id]);
        }

        if (isset(Yii::$app->request->get()['BookingSearch']['start_time']) && Yii::$app->request->get()['BookingSearch']['start_time']) {

            $valAA = Yii::$app->request->get()['BookingSearch']['start_time'];
            $ds = explode(' - ',$valAA);

            $start_time_begin = $ds[0];
            $start_time_end = $ds[1];

            $start_time_begin = date_format(date_create($start_time_begin),'Y-m-d H:i:s');
            $start_time_end = date_format(date_create($start_time_end),'Y-m-d H:i:s');
        }

        if (isset($start_time_begin) || isset($start_time_end)) {
        $query->andWhere(['between', 'start_time', $start_time_begin, $start_time_end]);
        }

        if (isset(Yii::$app->request->get()['BookingSearch']['end_time']) && Yii::$app->request->get()['BookingSearch']['end_time']) {

            $valBB = Yii::$app->request->get()['BookingSearch']['end_time'];
            $de = explode(' - ',$valBB);

            $end_time_begin = $de[0];
            $end_time_end = $de[1];

            $end_time_begin = date_format(date_create($end_time_begin),'Y-m-d H:i:s');
            $end_time_end = date_format(date_create($end_time_end),'Y-m-d H:i:s');
        }

        if (isset($end_time_begin) || isset($end_time_end)) {
        $query->andWhere(['between', 'end_time', $end_time_begin, $end_time_end]);
        }

        // $query->orderBy(['booking_id'=>SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith(['user','court']);

        // grid filtering conditions
        $query->andFilterWhere([
            'booking_id' => $this->booking_id,
            'booking_date' => $this->booking_date,
            'submitted_date' => $this->submitted_date,
            'booking_activeness' => $this->booking_activeness,
            'booking_status' => $this->booking_status,
            'booking_parent_id' => $this->booking_parent_id,
        ]);

        $query->andFilterWhere(['like', 'booking_name', $this->booking_name])
            ->andFilterWhere(['like', 'booking_code', $this->booking_code])
            ->andFilterWhere(['like', 'booking_type', $this->booking_type])
            ->andFilterWhere(['like', 'user.username', $this->user_id])
            ->andFilterWhere(['like', 'court.court_name', $this->court_id])
            ->andFilterWhere(['like', 'ip_address', $this->ip_address]);

        if (isset($start_time_begin) || isset($start_time_end)) {
        $query->andFilterWhere(['between', 'start_time', $start_time_begin, $start_time_end]);
        }
        if (isset($end_time_begin) || isset($end_time_end)) {
        $query->andWhere(['between', 'end_time', $end_time_begin, $end_time_end]);
        }

        return $dataProvider;
    }
}
