<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipo_gastos".
 *
 * @property integer $id
 * @property string $nombre
 *
 * @property Gastos[] $gastos
 */
class TipoGasto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_gastos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 80]
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGastos()
    {
        return $this->hasMany(Gastos::className(), ['id_tipo' => 'id']);
    }
}
