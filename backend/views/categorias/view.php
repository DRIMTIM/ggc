<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Categoria */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-view col-md-8 row">

    <div class="box box-solid box-default">

        <div class="box-header">
            <h1 class="box-title"><?= Html::encode($this->title) ?></h1>
        </div>

        <div class="box-body">

            <div style="float: right">
                <?= Html::a(Yii::t('app', 'Editar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Borrar'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Esta seguro que desea eliminar esta Categoria?'),
                        'method' => 'post',
                    ],
                ]) ?>
            </div>

            <br/><br/>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'nombre',
                    'imagen',
                    'descripcion',
                    'ultima_mod',
                ],
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
            <img class="imgCategoria" src="/ggc/backend/web/<?= $model->imagen != null ? "uploads/categorias/" . $model->imagen : "img/avatar.png" ?>"
                    alt="<?= Yii::t('app', 'Imagen Categoria') ?>" style="width: 80%; margin-left: 10%">
        </div>

    </div>

</div>
