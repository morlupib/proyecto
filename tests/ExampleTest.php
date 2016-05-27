<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\cabanas;

class ExampleTest extends TestCase
{
    
 
  public function testPublicar()
 {

 
   $cabana=factory(App\Models\cabanas::class)->create();
   $idCab=$cabana->id;

    $cabanas = cabanas::where('publicar', '=', '1')->get();

    try{
       foreach ($cabanas as $cabana) 
      {
           if($cabana->id==$idCab)
               $contador=1;
           else
               $contador=0;
       }
 
      if($contador==1)
           echo 'La propiedad se publico en la pantalla principal: '.$cabana->nombre;
       else
           echo 'La propiedad no se publico en la pantalla principal: '.$cabana->nombre;
 
       }catch(Exception $e)
      {
          echo 'Error en la publicación de propiedad. Excepcion capturada: ',  $e->getMessage(), "\n";
      }
 }




}
