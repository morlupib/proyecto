<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';

    public $fillable = ['path', 'cabana_id'];

    
    public function cabana()
    {
        return $this->belongsTo('App\Models\cabanas', 'cabana_id');
    }

}
