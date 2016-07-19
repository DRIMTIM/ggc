<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Categoria */

$this->title = Yii::t('app', 'Editar {modelClass}: ', [
    'modelClass' => 'Categoria',
]) . ' ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Editar');
?>
<div class="categoria-update">

    <div class="box box-solid box-default">
        <div class="box-header">
            <h1 class="box-title"><?= Html::encode($this->title) ?></h1>
        </div>

        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
