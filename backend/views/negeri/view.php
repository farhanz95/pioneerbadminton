<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Negeri */

$this->title = $model->negeri_nama;
$this->params['breadcrumbs'][] = ['label' => 'Negeris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="negeri-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->negeri_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->negeri_id], [
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
            // 'negeri_id',
            'negeri_nama',
            [
                'label' => 'Negeri Aktif',
                'value' => $model->negeri_aktif ? 'Aktif' : 'Tak Aktif'
            ],
        ],
    ]) ?>

</div>
