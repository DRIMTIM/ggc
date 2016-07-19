<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "personas".
 *
 * @property integer $id
 * @property integer $id_usuario
 * @property string $ci
 * @property string $apellido
 * @property string $nombre
 * @property string $celular
 * @property string $fecha_nac
 * @property integer $id_agenda
 * @property string $ultima_mod
 *
 * @property Gastos[] $gastos
 * @property GruposPersonas[] $gruposPersonas
 * @property Grupos[] $idGrupos
 * @property Ingresos[] $ingresos
 * @property Notificaciones[] $notificaciones
 * @property Agendas $idAgenda
 * @property User $idUsuario
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'ci', 'apellido', 'nombre', 'celular'], 'required'],
            [['id_usuario', 'id_agenda'], 'integer'],
            [['fecha_nac', 'ultima_mod'], 'safe'],
            [['ci'], 'string', 'max' => 8],
            [['apellido', 'nombre'], 'string', 'max' => 30],
            [['celular'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_usuario' => Yii::t('app', 'Id Usuario'),
            'ci' => Yii::t('app', 'Ci'),
            'apellido' => Yii::t('app', 'Apellido'),
            'nombre' => Yii::t('app', 'Nombre'),
            'celular' => Yii::t('app', 'Celular'),
            'fecha_nac' => Yii::t('app', 'Fecha Nac'),
            'id_agenda' => Yii::t('app', 'Id Agenda'),
            'ultima_mod' => Yii::t('app', 'Ultima Mod'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGastos()
    {
        return $this->hasMany(Gastos::className(), ['id_persona' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGruposPersonas()
    {
        return $this->hasMany(GruposPersonas::className(), ['id_persona' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGrupos()
    {
        return $this->hasMany(Grupos::className(), ['id' => 'id_grupo'])->viaTable('grupos_personas', ['id_persona' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngresos()
    {
        return $this->hasMany(Ingresos::className(), ['id_persona' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotificaciones()
    {
        return $this->hasMany(Notificaciones::className(), ['id_persona' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAgenda()
    {
        return $this->hasOne(Agendas::className(), ['id' => 'id_agenda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(User::className(), ['id' => 'id_usuario']);
    }
}
