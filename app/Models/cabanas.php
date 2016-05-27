<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="cabanas",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="descripcion",
 *          description="descripcion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="direccion",
 *          description="direccion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="latitud",
 *          description="latitud",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="longitud",
 *          description="longitud",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="precio",
 *          description="precio",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class cabanas extends Model
{
    use SoftDeletes;

    public $table = 'cabanas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'descripcion',
        'direccion',
        'latitud',
        'longitud',
        'precio',
        'publicar',
        'propietario_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'descripcion' => 'string',
        'direccion' => 'string',
        'precio' => 'float',
        'publicar' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'direccion' => 'required',
        'precio' => 'required'
    ];

    public function imagen()
    {
        return $this->hasMany('App\Imagen', 'cabana_id');
    }

    public function propietario()
    {
        return $this->belongsTo('App\Models\propietario', 'propietario_id');
    }
}
