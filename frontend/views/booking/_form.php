<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
use kartik\daterange\DateRangePicker;
use yii\helpers\ArrayHelper;
use app\models\Court;
use app\models\Location;
use dosamigos\fileupload\FileUpload;
use yii\helpers\Url;

$locationArray = ArrayHelper::map(Location::find()->orderBy(['location_name'=>SORT_ASC])->asArray()->all(),'location_id','location_name');

// $courtArray = ArrayHelper::map(Court::find()->orderBy(['court_name'=>SORT_ASC])->asArray()->all(),'court_id','court_name');
/* @var $this yii\web\View */
/* @var $model app\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if (!$model->isNewRecord): ?>

        <label class="control-label" for="booking-booking_code">Booking Code</label>
        
        <span class="form-control" disabled><?= $model->booking_code ?></span>

        <br>

    <?php endif ?>

    <?= $form->field($model, 'booking_name')->textInput(['maxlength' => true]) ?> 

    <div class="row">

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

    <?= '<label>Booking Date</label>' ?>
    <?php 
    // echo DatePicker::widget([
    //     'model' => $model,
    //     'attribute' => 'booking_date',
    //     'pluginOptions' => [
    //       'format' => 'yyyy-mm-dd',
    //       'todayHighlight' => true
    //     ]
    // ]); 
    ?> 

    </div>
    
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">

    <?php
    // echo '<label>Start</label>';
    // echo TimePicker::widget([
    //     'model' => $model,
    //     'attribute' => 'start_time', 
    //     'pluginOptions' => [
    //         'showSeconds' => false
    //     ]
    // ]);
    ?>

    </div>
    
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">

    <?php
    // echo '<label>End</label>';
    // echo TimePicker::widget([
    //     'model' => $model,
    //     'attribute' => 'end_time', 
    //     'pluginOptions' => [
    //         'showSeconds' => false
    //     ]
    // ]);
    ?>

    </div>

    </div>

    <?php

    echo DateRangePicker::widget([
    'model'=>$model,
    'attribute'=>'date_start_end',
    'convertFormat'=>true,
    'pluginOptions'=>[
        'timePicker'=>true,
        'timePickerIncrement'=>30,
        'locale'=>[
            'format'=>'Y-m-d h:i A'
        ]
    ],
    'options' => [
            'class' => 'form-control dateSelector'
    ]
    ]);

    ?>

    <span class="text-danger dateLength"></span>

    <?= $form->field($model, 'ip_address')->textInput(['maxlength' => true])->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'location')->dropDownList($locationArray,['prompt'=>'-Select Location-']) ?>

    <?= $form->field($model, 'court_id')->dropDownList([],['prompt'=>'-Select Location First-']) ?> 

    <?= FileUpload::widget([
        'name' => 'filename',
        'model' => $model,
        'attribute' => 'file',
        'url' => ['file-upload', 'id' => $model->booking_id], // your url, this is just for demo purposes,
        'options' => ['accept' => 'pdf/png/jpeg/jpg'],
        'clientOptions' => [
            'maxFileSize' => 2000000
        ],
        // Also, you can specify jQuery-File-Upload events
        // see: https://github.com/blueimp/jQuery-File-Upload/wiki/Options#processing-callback-options
        'clientEvents' => [
            'fileuploadchange' => 'function(e, data) {
                        // START VALIDATE FILE UPLOAD
                        var acceptedFileType = e["currentTarget"].accept;
                        var arrayAcceptedFileType = acceptedFileType.split("/");

                        var filetype = data["files"]["0"].type.split("/");
                        var filetype = filetype.slice(-1)[0];

                        if($.inArray(filetype, arrayAcceptedFileType) == -1) {
                          alert("Please upload only "+arrayAcceptedFileType+" format files.");
                          return false;
                        }

                        if(data["files"]["0"].size > maxUploadFileSize()){
                            alert("Max Uploaded File Size Is "+bytesToSize(maxUploadFileSize()));
                            return false;
                        }
                        // END VALIDATE FILE UPLOAD
            }',
            'fileuploaddone' => 'function(e, data) {

                                    console.log(e);
                                    console.log(data);

                                    $.each(JSON.parse(data.result), function (index, file) {
                                      var tempUploadFile = file[0].url;
                                      var tempDir = "'.Url::base().'/"+tempUploadFile;

                                      var filename = data["files"]["0"].name;
                                      var tempDirPath = "<a href=\'"+tempDir+"\'>"+filename+"</a>";
                                      $(".bar").attr("style","width: 100%;background-color:#fff");
                                      $(".bar").html(tempDirPath);

                                    });

                                }',
            'fileuploadfail' => 'function(e, data) {
                                    alert("fileuploadfail");
                                }',
            'fileuploadprogress' => 'function(e, data){

                                    var progress = parseInt(data.loaded / data.total * 100, 10);
                                    $(\'#progress .bar\').css(
                                      \'width\',
                                      progress + \'%\'
                                    );

            }'
        ],
    ]); ?> 

    <div id="progress">
        <div class="bar" style="width: 0%;"></div>
    </div>

    <?php if (Yii::$app->user->can('Admin')): ?>
    
    <?= $form->field($model, 'booking_status')->dropDownList([1=>'Not Confirmed',2=>'Confirmed',3=>'Paid']) ?>

    <?php else: ?>

    <?= $form->field($model, 'booking_status')->hiddenInput(['value'=>1])->label(false) ?>

    <?php endif ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php 

$this->registerJs("

$('body').on('change','select[name=\"Booking[location]\"]',function(){

    if($('select[name=\"Booking[location]\"] option:selected').val()){

        var selected = $('select[name=\"Booking[location]\"] option:selected').val();

        $.ajax({
            type: 'post',
            url: 'get-court',
            data: 'location_id='+selected,
            success: function(data){
                $('select[name=\"Booking[court_id]\"]').html(data);
            } 
        })

    }else{
        $('select[name=\"Booking[court_id]\"]').html('<option value=\"\">-Select Location First-</option>')
    }

});

$('body').on('change','input[name=\"Booking[date_start_end]\"]',function(){

var booking_date = $('.dateSelector')[\"0\"]['value'];

$.ajax({
    type: 'post',
    url: 'get-date-length',
    data: 'booking_date='+booking_date,
    success: function(response){
        $('.dateLength').text(response);
    } 
});


});

");

?>

<?php if (!$model->isNewRecord): ?>

<?php 

$this->registerJs("

$('select[name=\"Booking[location]\"]').val(".$model->court->location->location_id.");

var selected = $('select[name=\"Booking[location]\"] option:selected').val();

$.ajax({
    type: 'post',
    url: 'get-court',
    data: 'location_id='+selected,
    success: function(data){
        $('select[name=\"Booking[court_id]\"]').html(data);

        $('select[name=\"Booking[court_id]\"]').val(".$model->court->court_id.");
    } 
});

");

?>    

<?php endif ?>
