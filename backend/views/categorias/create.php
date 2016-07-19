<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Categoria */

$this->title = Yii::t('app', 'Nueva Categoria');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-create col-md-6 row">

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

<div class="producto-create col-md-3">

    <div class="box box-solid box-default">

        <div class="box-header">
            <h1 class="box-title">Imagen de la Categoria</h1>
        </div>

        <div class="box-body">
            <img class="imagenProducto" src="/ggc/backend/web/img/png.png" style="width: 80%; margin:10%"
                 alt="<?= Yii::t('app', 'Imagen Categoria') ?>">
        </div>

    </div>

</div>
