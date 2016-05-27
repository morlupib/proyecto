<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class testPublicar extends TestCase
{
	public function testPublicar()
{
    $this->visit('cabanas.create')
    	->type('La Casona','nombre')
    	->type('Confortable','descricion')
    	->type('147.50','nombre')
    	->type('San Jose 147, San Jose de la Dormida','nombre')
    	->check('Publicar')
         ->press('Guardar')
         ->seePageIs('cabanas.index');
}
}