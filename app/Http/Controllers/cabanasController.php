<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatecabanasRequest;
use App\Http\Requests\UpdatecabanasRequest;
use App\Repositories\cabanasRepository;
use Illuminate\Http\Request;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\cabanas;
use App\Imagen;
use Auth;

class cabanasController extends AppBaseController
{
    /** @var  cabanasRepository */
    private $cabanasRepository;

    public function __construct(cabanasRepository $cabanasRepo)
    {
        $this->cabanasRepository = $cabanasRepo;
    }

    /**
     * Display a listing of the cabanas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cabanas = cabanas::where('propietario_id', '=', Auth::user()->propietario->id)->get();

        return view('cabanas.index')
            ->with('cabanas', $cabanas);
    }

    /**
     * Show the form for creating a new cabanas.
     *
     * @return Response
     */
    public function create()
    {
        return view('cabanas.create');
    }

    /**
     * Store a newly created cabanas in storage.
     *
     * @param CreatecabanasRequest $request
     *
     * @return Response
     */
    public function store(CreatecabanasRequest $request)
    {

        $propietario = Auth::user()->propietario->id;

        $cabana = new cabanas;
        $cabana->nombre = $request['nombre'];
        $cabana->descripcion = $request['descripcion'];
        $cabana->precio = $request['precio'];
        $cabana->direccion = $request['direccion'];

        if($request['publicar'] == 1){
            $cabana->publicar = $request['publicar'];
        }
        else{
            $cabana->publicar = 0;
        }
        
        $cabana->propietario()->associate($propietario);
        $cabana->save();
            
        if ($request->hasFile('image')) {

            $path = public_path().'/imagenes/';
            $files = $request->file('image');

            foreach($files as $file){

                $fileName = uniqid().$file->getClientOriginalName();
                $file->move($path, $fileName);

                $imagen = new Imagen;
                $imagen->nombre = $fileName;

                $imagen->cabana()->associate($cabana);
                $imagen->save();
                
            }     
        }

        Flash::success('Cabaña guardada con éxito.');

        return redirect(route('cabanas.index'));
    }


    /**
     * Display the specified cabanas.
     *
     * @param  int $id
     *
     * @return Response
     */

    

    public function show($id)
    {
        $cabanas = $this->cabanasRepository->findWithoutFail($id);

        if (empty($cabanas)) {
            Flash::error('Cabaña no encontrada');

            return redirect(route('cabanas.index'));
        }

        return view('cabanas.show')->with('cabanas', $cabanas);
    }

    /**
     * Show the form for editing the specified cabanas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cabanas = $this->cabanasRepository->findWithoutFail($id);

        if (empty($cabanas)) {
            Flash::error('Cabaña no encontrada');

            return redirect(route('cabanas.index'));
        }

        return view('cabanas.edit')->with('cabanas', $cabanas);
    }

    /**
     * Update the specified cabanas in storage.
     *
     * @param  int              $id
     * @param UpdatecabanasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecabanasRequest $request)
    {
        $cabanas = $this->cabanasRepository->findWithoutFail($id);

        if (empty($cabanas)) {
            Flash::error('Cabaña no encontrada');

            return redirect(route('cabanas.index'));
        }

        $cabanas = $this->cabanasRepository->update($request->all(), $id);

        Flash::success('Cabaña actualizada con éxito.');

        return redirect(route('cabanas.index'));
    }

    /**
     * Remove the specified cabanas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cabanas = $this->cabanasRepository->findWithoutFail($id);

        if (empty($cabanas)) {
            Flash::error('Cabaña no encontrada');

            return redirect(route('cabanas.index'));
        }

        $this->cabanasRepository->delete($id);

        Flash::success('Cabaña eliminada.');

        return redirect(route('cabanas.index'));
    }

    public function publicar($id)
    {
        $cabana = $this->cabanasRepository->findWithoutFail($id);

        if ($cabana->publicar == 1) {
            $cabana->publicar=0;
        }else{
            $cabana->publicar=1;
        }

        $cabana->save();

        return redirect(route('cabanas.index'));
        /*
        $cabana = cabanas::find($request['cabId']);

        if($request['public'] == true){
            $cabana->publicar = 1;
        }
        else{
            $cabana->publicar = 0;
        }
       
        $cabana->update();

        return Response::json('ok', 200);
        */
    }
}
