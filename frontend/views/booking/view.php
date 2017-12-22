<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Booking */

$this->title = $model->booking_name;
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->can('Admin')): ?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->booking_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->booking_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php endif ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'booking_id',
            'booking_code',
            'booking_name',
            [
                'attribute' => 'booking_status',
                'format' => 'raw',
                'visible' => Yii::$app->user->can('Admin'),
                'value' => function($model){
                    return $model->bookingStatusName;
                }
            ],
            // [
            //     'attribute' => 'booking_date',
            //     'value' => function($model){
            //         return date_format(date_create($model->booking_date),'Y-m-d (l) ');
            //     }
            // ],
            [
                'attribute' => 'start_time',
                'value' => function($model){
                    return date_format(date_create($model->start_time),'Y-m-d h:i A (l) ');
                }
            ],
            [
                'attribute' => 'end_time',
                'value' => function($model){
                    return date_format(date_create($model->end_time),'Y-m-d h:i A (l) ');
                }
            ],
            [
                'label' => 'LENGTH OF TIME BOOKED',
                'format' => 'raw',
                'value' => function($model){
                    return "<span class='label label-primary label-lg fsi fwi'>".$model->lengthTimeBooked."</span>";
                }
            ],
            [
                'attribute' => 'ip_address',
                'visible' => Yii::$app->user->can('Admin')
            ],
            // 'booking_activeness',
            [
                'attribute' => 'court.court_name',
                'label' => 'Court',
            ],
            'submitted_date',
            // 'booking_parent_id',
        ],
    ]) ?>

</div>
