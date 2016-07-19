<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Categoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <!--<?= $form->field($model, 'ultima_mod')->textInput() ?>-->

    <div class="form-group" style="float: right">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear Categoria') : Yii::t('app', 'Edtar Categoria'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
