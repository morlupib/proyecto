<?php

namespace App\Repositories;

use App\Models\propietario;
use InfyOm\Generator\Common\BaseRepository;

class propietarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'apellido',
        'email',
        'telefono'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return propietario::class;
    }
}
