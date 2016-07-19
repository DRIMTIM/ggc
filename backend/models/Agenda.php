<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "agendas".
 *
 * @property integer $id
 * @property integer $anio
 *
 * @property Grupos[] $grupos
 * @property Personas[] $personas
 * @property Tareas[] $tareas
 */
class Agenda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agendas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['anio'], 'required'],
            [['anio'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'anio' => Yii::t('app', 'Anio'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupos::className(), ['id_agenda' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Personas::className(), ['id_agenda' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTareas()
    {
        return $this->hasMany(Tareas::className(), ['id_agenda' => 'id']);
    }
}
