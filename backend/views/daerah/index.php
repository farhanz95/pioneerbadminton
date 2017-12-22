<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DaerahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daerahs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daerah-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Daerah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'daerah_id',
            'daerah_nama',
            [
                'attribute'=>'negeri_id',
                'value'=> function($model){
                    return $model->negeri->negeri_nama;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
