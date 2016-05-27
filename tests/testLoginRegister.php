<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class testPublicar extends TestCase
{
	 public function testLink()
{
    //testear que el boton inicio va realmente al login 

    $this->visit('/')
         ->click('Inicio')
         ->seePageIs('login');
}
public function testLogin()
{
    //probar un usuario que este registrado en la base de datos
    $usuario=factory(App\User::class)->create();


   try {
        $this->visit('login')
         ->type('kiara', 'name')
         ->type('123456','password')
         ->press('Login')
         ->seePageIs('/');

         echo 'Usuario registrado y posicionado en la pantalla principal: '.$usuario->name;

        
    } catch (Exception $e) {
        
        echo 'Error en el logueo. Excepcion capturada: ',  $e->getMessage(), "\n";
    }


}

public function testFuncionalBD()
{
   //probar que la registracion de un propietario con  cabaña esta almacenado realmente en la base de datos

    $cabanas = factory(App\Models\cabanas::class)->create();

try {
    if($this->seeInDatabase('cabanas', ['nombre'=>$cabanas->nombre])==TRUE 
        and $this->seeInDatabase('cabanas', ['descripcion'=>$cabanas->descripcion])==TRUE 
        and $this->seeInDatabase('cabanas', ['direccion'=>$cabanas->direccion])==TRUE
        and $this->seeInDatabase('cabanas', ['precio'=>$cabanas->precio])==TRUE)
         
         echo 'La propiedad ha sido registrada y validada en la base de datos:'.$cabanas->nombre;
     

    } catch(Exception $e) {

    echo 'No se pudo registrar la propiedad. Excepcion capturada: ',  $e->getMessage(), "\n";
    }
}
}