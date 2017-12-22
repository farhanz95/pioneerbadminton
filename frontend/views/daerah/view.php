<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Daerah */

$this->title = $model->daerah_nama;
$this->params['breadcrumbs'][] = ['label' => 'Daerahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daerah-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->daerah_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->daerah_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'daerah_id',
            'daerah_nama',
            [
                'label' => 'Negeri',
                'value' => $model->negeri->negeri_nama,
            ],
        ],
    ]) ?>

</div>
