<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personal".
 *
 * @property string $codigo
 * @property string $legajo
 * @property string $dni
 * @property string $apellido
 * @property string $nombre
 * @property string $direccion
 * @property string $telefono
 * @property int $titulo
 * @property int $sexo
 * @property string $fecha_ingreso
 * @property int $estado
 * @property int $servicio
 * @property int $departamento
 * @property int $hs_trabajo
 */
class Personal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'legajo', 'dni', 'apellido', 'nombre', 'direccion', 'sexo', 'fecha_ingreso'], 'required'],
            [['titulo', 'sexo', 'estado', 'servicio', 'departamento', 'hs_trabajo'], 'integer'],
            [['codigo'], 'string', 'max' => 6],
            [['legajo', 'fecha_ingreso'], 'string', 'max' => 10],
            [['dni'], 'string', 'max' => 8],
            [['apellido', 'nombre', 'direccion'], 'string', 'max' => 45],
            [['telefono'], 'string', 'max' => 20],
            [['legajo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codigo' => 'Codigo',
            'legajo' => 'Legajo',
            'dni' => 'Dni',
            'apellido' => 'Apellido',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'titulo' => 'Titulo',
            'sexo' => 'Sexo',
            'fecha_ingreso' => 'Fecha Ingreso',
            'estado' => 'Estado',
            'servicio' => 'Servicio',
            'departamento' => 'Departamento',
            'hs_trabajo' => 'Hs Trabajo',
        ];
    }
}
