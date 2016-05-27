<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //rellenar la base de datos. ejecutar con php artisan migrate --seed
        $usuario = factory('App\User', 1)->create();
        $propietario = factory('App\Models\propietario', 1)->create();
        $cabana = factory('App\Models\cabanas', 1)->create();
       
        
    }
}
