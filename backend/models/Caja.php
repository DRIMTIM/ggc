<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cajas".
 *
 * @property integer $id
 * @property string $monto_disponible
 * @property string $monto_inicial
 * @property string $fecha_cierre
 * @property string $observacion
 * @property string $ultima_mod
 */
class Caja extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cajas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['monto_disponible', 'monto_inicial'], 'number'],
            [['monto_inicial'], 'required'],
            [['fecha_cierre', 'ultima_mod'], 'safe'],
            [['observacion'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'monto_disponible' => Yii::t('app', 'Monto Disponible'),
            'monto_inicial' => Yii::t('app', 'Monto Inicial'),
            'fecha_cierre' => Yii::t('app', 'Fecha Cierre'),
            'observacion' => Yii::t('app', 'Observacion'),
            'ultima_mod' => Yii::t('app', 'Ultima Mod'),
        ];
    }
}
