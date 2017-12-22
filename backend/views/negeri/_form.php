<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Negeri */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="negeri-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'negeri_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'negeri_aktif')->dropDownList([1=>'Aktif',0=>'Tak Aktif']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
