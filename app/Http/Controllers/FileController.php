<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\cabanasRepository;
use App\Models\cabanas;
use App\Imagen;

class FileController extends Controller
{
    //

	public function index()
	{
	    return view('form');
	}


	public function store(Request $request)
	{
		//acá lo guarda en public/uploads/(nombreImagen)
            $path = public_path().'/uploads/';
            $files = $request->file('file');
            $idCab= 1;

            $cabana = cabanas::find($idCab);
            


            foreach($files as $file){
                $fileName = $file->getClientOriginalName();
               	
               	//if ($cabana->empty()) {}  
               	$subir= $file->move($path, $path.$fileName); 


               		
                if ($subir) {
                	
                	$imagen = new Imagen;
		            $imagen->nombre = $path;
		            $imagen->cabana()->associate($cabana);
		            $imagen->save();

                } 
                
                
               


	               
               /* if (move_uploaded_file($path, $fileName)) {
                    
                    $imagen->save();
                }
                
                */
            }
	}

		//cuando quieera borrar un archivo Storage::delete('file.jpg');
}
