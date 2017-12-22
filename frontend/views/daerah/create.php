<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Daerah */

$this->title = 'Create Daerah';
$this->params['breadcrumbs'][] = ['label' => 'Daerahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daerah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
