<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Court */

$this->title = 'Update Court: ' . $model->court_name;
$this->params['breadcrumbs'][] = ['label' => 'Courts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->court_name, 'url' => ['view', 'id' => $model->court_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="court-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
