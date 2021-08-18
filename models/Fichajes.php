<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fichajes".
 *
 * @property int $id
 * @property string $fecha_ingreso
 * @property string $fi
 * @property string $hora_ingreso
 * @property string $fecha_salida
 * @property string $fs
 * @property string $hora_salida
 * @property string $persona
 * @property string $cant_horas
 * @property string $observaciones
 * @property int $licencia
 */
class Fichajes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fichajes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_ingreso', 'hora_ingreso'], 'required'],
            [['fi', 'fs'], 'safe'],
            [['licencia'], 'integer'],
            [['fecha_ingreso', 'fecha_salida', 'persona'], 'string', 'max' => 10],
            [['hora_ingreso', 'hora_salida', 'cant_horas'], 'string', 'max' => 8],
            [['observaciones'], 'string', 'max' => 95],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha_ingreso' => 'Fecha Ingreso',
            'fi' => 'Fi',
            'hora_ingreso' => 'Hora Ingreso',
            'fecha_salida' => 'Fecha Salida',
            'fs' => 'Fs',
            'hora_salida' => 'Hora Salida',
            'persona' => 'Persona',
            'cant_horas' => 'Cant Horas',
            'observaciones' => 'Observaciones',
            'licencia' => 'Licencia',
        ];
    }
}
