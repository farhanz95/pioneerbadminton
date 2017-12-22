<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NegeriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Negeris';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="negeri-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Negeri', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'negeri_id',
            'negeri_nama',
            // 'negeri_aktif',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
