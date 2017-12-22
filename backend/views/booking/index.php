<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bookings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row" style="margin-bottom:10px !important">

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
        <?= Html::a('Create Booking', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 pull-left">
            <div class="bulkAction" style="display:none">

            <?=Html::beginForm(['booking/bulk'],'post',['id'=>'formActionBulk']);?>
            <?=Html::dropDownList('action','',['d'=>'Delete','c'=>'Confirm','nc'=>'Not Confirm','p'=>'Paid'],['class'=>'form-control bulkAction','style'=>'display:inline !important;width:auto !important;','prompt'=>'-Mark Selected As-'])?>
            <?=Html::submitButton('Send', ['class' => 'btn btn-info',]);?>

            </div>
        </div>

    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

            // 'booking_id',
            'booking_code',
            // 'booking_date',
            [
                'attribute' => 'start_time',
                'value' => function($model){
                    return date_format(date_create($model->start_time),'Y-m-d h:i A (l)');
                },
                'filter' => DateRangePicker::widget([
                    'model'=>$searchModel,
                    'attribute'=>'start_time',
                    'convertFormat'=>true,
                    'pluginOptions'=>[
                        'timePicker'=>true,
                        'timePickerIncrement'=>30,
                        'locale'=>[
                            'format'=>'Y-m-d h:i A'
                        ]
                    ]
                ])
            ],
            [
                'attribute' => 'end_time',
                'value' => function($model){
                    return date_format(date_create($model->end_time),'Y-m-d h:i A (l)');
                },
                'filter' => DateRangePicker::widget([
                    'model'=>$searchModel,
                    'attribute'=>'end_time',
                    'convertFormat'=>true,
                    'pluginOptions'=>[
                        'timePicker'=>true,
                        'timePickerIncrement'=>30,
                        'locale'=>[
                            'format'=>'Y-m-d h:i A'
                        ]
                    ]
                ])
            ],
            // [
            //     'header' => '',
            //     'format' => 'raw',
            //     'value' => function($model){
            //         return "<span class='label label-primary label-lg fsi fwi'>".$model->lengthTimeBooked."</span>";
            //     }
            // ],
            'booking_name',
            [
                'attribute' => 'booking_status',
                'format' => 'raw',
                'value' => function($model){
                    return $model->bookingStatusName;
                },
                'filter'=>[1=>'Not Confirmed',2=>'Confirm',3=>'Paid'],
            ],
            // 'booking_type',
            // 'booking_ip',
            'submitted_date',
            // 'booking_activeness',
            [
                'attribute' => 'court_id',
                'value' => 'court.court_name'
            ],
            [   
                'attribute' => 'user_id',
                'value' => 'user.username'
            ],
            // 'booking_parent_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php 

$this->registerJs("

$('body').on('click','input:checkbox[name=\"selection[]\"]',function(){ 

    if($('input[name=\"selection[]\"]:checked').length > 0){
        $('.bulkAction').show();
    }else{
        $('.bulkAction').hide();
    }

});

$('body').on('click','input:checkbox[name=\"selection_all\"]',function(){
    
    if($('input[name=\"selection_all\"]:checked').length > 0){
        $('.bulkAction').show();
    }else{
        $('.bulkAction').hide();
    }

});

$('#formActionBulk').submit(function(){

    var selected = $('select[name=\"action\"] option:selected').val();
    var text = $('select[name=\"action\"] option:selected').text();

    if(!selected){
        alert('Please select action to mark with selected data');
        return false;
    }

    var confirmation = confirm('Are you sure you want to '+text+' this data?');

    if(confirmation){
        return true;
    }else{
        return false;
    }
})


")

?>
