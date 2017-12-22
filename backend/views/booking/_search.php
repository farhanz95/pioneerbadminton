<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BookingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'booking_id') ?>

    <?= $form->field($model, 'booking_name') ?>

    <?= $form->field($model, 'booking_status') ?>

    <?= $form->field($model, 'booking_type') ?>

    <?= $form->field($model, 'booking_date') ?>

    <?php // echo $form->field($model, 'ip_address') ?>

    <?php // echo $form->field($model, 'booking_activeness') ?>

    <?php // echo $form->field($model, 'court_id') ?>

    <?php // echo $form->field($model, 'booking_parent_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
