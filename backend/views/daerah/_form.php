<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Daerah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="daerah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'daerah_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'negeri_id')->dropDownList(ArrayHelper::map(\app\models\Negeri::find()->orderBy(['negeri_nama'=>SORT_ASC])->asArray()->all(),'negeri_id','negeri_nama'),['prompt'=>'-Select Negeri-']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
