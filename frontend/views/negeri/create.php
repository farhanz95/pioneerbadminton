<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Negeri */

$this->title = 'Create Negeri';
$this->params['breadcrumbs'][] = ['label' => 'Negeris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="negeri-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
