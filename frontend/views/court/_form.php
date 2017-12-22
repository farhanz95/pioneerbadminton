<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Location;
use yii\helpers\ArrayHelper;
$locationArray = ArrayHelper::map(Location::find()->orderBy(['location_name'=>SORT_ASC])->asArray()->all(),'location_id','location_name');

/* @var $this yii\web\View */
/* @var $model app\models\Court */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="court-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'court_id')->textInput() ?> -->

    <?= $form->field($model, 'court_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location_id')->dropDownList($locationArray,['prompt'=>'-Select Location-']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
