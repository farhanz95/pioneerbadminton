<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Daerah */

$this->title = 'Update Daerah: ' . $model->daerah_nama;
$this->params['breadcrumbs'][] = ['label' => 'Daerahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->daerah_nama, 'url' => ['view', 'id' => $model->daerah_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="daerah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
