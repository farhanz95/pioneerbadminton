<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CourtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="court-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Court', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'court_id',
            'court_name',
            'location.location_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
