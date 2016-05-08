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
        $this->cabanasRepository->pushCriteria(new RequestCriteria($request));
        $cabanas = $this->cabanasRepository->all();

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

        $propietario = Auth::user()->propietario()->get();
        $cabana = new cabanas;
        $cabana->nombre = $request->input('nombre');
        $cabana->descripcion = $request->input('descripcion');
        $cabana->precio = $request->input('precio');
        $cabana->direccion = $request->input('direccion');
        $cabana->latitud = $request->input('latitud');
        $cabana->longitud = $request->input('longitud');

        //dd($propietario);
        $cabana->propietario()->associate($propietario);
        $cabana->save();
            
        if ($request->hasFile('file')) {

            $path = public_path().'/images/';
            $files = $request->file('file');

            foreach($files as $file){

                $fileName = uniqid().$file->getClientOriginalName();
                $file->move($path, $fileName);
                
                $pathName = $path.$fileName;

                $imagen = new Imagen;
                $imagen->path = $pathName;

                $imagen->cabana()->associate($cabana);
                $imagen->save();
                
            }     
        }

        Flash::success('Cabaña guardada con exito.');

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
            Flash::error('cabanas not found');

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
            Flash::error('cabanas not found');

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
            Flash::error('cabanas not found');

            return redirect(route('cabanas.index'));
        }

        $cabanas = $this->cabanasRepository->update($request->all(), $id);

        Flash::success('cabanas updated successfully.');

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
            Flash::error('cabanas not found');

            return redirect(route('cabanas.index'));
        }

        $this->cabanasRepository->delete($id);

        Flash::success('cabanas deleted successfully.');

        return redirect(route('cabanas.index'));
    }
}
