<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BuscarCategorias */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categorias');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-index">

    <div class="box box-solid box-default">

        <div class="box-header">
            <i class="fa fa-tags"></i><h1 class="box-title"><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>

        <div class="box-body">

            <div style="float: right">
                <?= Html::a(Yii::t('app', 'Nueva Categoria'), ['create'], ['class' => 'btn btn-success']) ?>
            </div>

            <br/><br/>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'nombre',
                    'descripcion',

                    /*array(
                        'format' => 'image',
                        'value'=>function($data) { return $data->imageurl; },
                    ),*/

                    [
                        'attribute' => 'Imagen',
                        'format' => 'html',
                        'value' => function ($data) {
                            return Html::img(Yii::getAlias('@web') . '/uploads/categorias/'. $data['imagen'],
                                ['width' => '36px', 'margin' => '2px']);
                        },
                    ],

                    'ultima_mod',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

        </div>

    </div>

</div>
