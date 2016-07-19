<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "grupos".
 *
 * @property integer $id
 * @property integer $id_agenda
 * @property string $nombre
 * @property string $observacion
 * @property string $fechaCreacion
 * @property string $ultima_mod
 *
 * @property Agendas $idAgenda
 * @property GruposPersonas[] $gruposPersonas
 * @property Personas[] $idPersonas
 * @property Notificaciones[] $notificaciones
 */
class Grupo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grupos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_agenda', 'nombre', 'observacion'], 'required'],
            [['id_agenda'], 'integer'],
            [['fechaCreacion', 'ultima_mod'], 'safe'],
            [['nombre'], 'string', 'max' => 100],
            [['observacion'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_agenda' => Yii::t('app', 'Id Agenda'),
            'nombre' => Yii::t('app', 'Nombre'),
            'observacion' => Yii::t('app', 'Observacion'),
            'fechaCreacion' => Yii::t('app', 'Fecha Creacion'),
            'ultima_mod' => Yii::t('app', 'Ultima Mod'),
        ];
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
    public function getGruposPersonas()
    {
        return $this->hasMany(GruposPersonas::className(), ['id_grupo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersonas()
    {
        return $this->hasMany(Personas::className(), ['id' => 'id_persona'])->viaTable('grupos_personas', ['id_grupo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotificaciones()
    {
        return $this->hasMany(Notificaciones::className(), ['id_grupo' => 'id']);
    }
}
