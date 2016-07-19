<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "categorias".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $imagen
 * @property string $descripcion
 * @property string $ultima_mod
 *
 * @property Gastos[] $gastos
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categorias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'imagen'], 'required'],
            [['ultima_mod'], 'safe'],
            [['nombre', 'imagen'], 'string', 'max' => 100],
            [['descripcion'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'imagen' => Yii::t('app', 'Imagen'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'ultima_mod' => Yii::t('app', 'Ultima Mod'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGastos()
    {
        return $this->hasMany(Gastos::className(), ['id_categoria' => 'id']);
    }
}
