<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Daerah;
/* @var $this yii\web\View */
/* @var $model app\models\Location */
/* @var $form yii\widgets\ActiveForm */

$daerahArray = ArrayHelper::map(Daerah::find()->orderBy(['daerah_nama'=>SORT_ASC])->asArray()->all(),'daerah_id','daerah_nama');
?>

<div class="location-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'location_id')->hiddenInput()->label(false) ?> -->

    <?= $form->field($model, 'location_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'daerah_id')->dropDownList($daerahArray,['prompt'=>'-Select City-']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
