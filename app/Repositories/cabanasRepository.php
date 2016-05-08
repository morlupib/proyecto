<?php

namespace App\Repositories;

use App\Models\cabanas;
use InfyOm\Generator\Common\BaseRepository;

class cabanasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion',
        'direccion',
        'precio'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return cabanas::class;
    }
}
