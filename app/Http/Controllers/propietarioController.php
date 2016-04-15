<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatepropietarioRequest;
use App\Http\Requests\UpdatepropietarioRequest;
use App\Repositories\propietarioRepository;
use Illuminate\Http\Request;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class propietarioController extends AppBaseController
{
    /** @var  propietarioRepository */
    private $propietarioRepository;

    public function __construct(propietarioRepository $propietarioRepo)
    {
        $this->propietarioRepository = $propietarioRepo;
    }

    /**
     * Display a listing of the propietario.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->propietarioRepository->pushCriteria(new RequestCriteria($request));
        $propietarios = $this->propietarioRepository->all();

        return view('propietarios.index')
            ->with('propietarios', $propietarios);
    }

    /**
     * Show the form for creating a new propietario.
     *
     * @return Response
     */
    public function create()
    {
        return view('propietarios.create');
    }

    /**
     * Store a newly created propietario in storage.
     *
     * @param CreatepropietarioRequest $request
     *
     * @return Response
     */
    public function store(CreatepropietarioRequest $request)
    {
        
        $input=$request->all();
        $propietario = $this->propietarioRepository->create($input);

        Flash::success('Datos registrados con éxito');

        return redirect(route('propietarios.index'));
    }

    /**
     * Display the specified propietario.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $propietario = $this->propietarioRepository->findWithoutFail($id);

        if (empty($propietario)) {
            Flash::error('propietario not found');

            return redirect(route('propietarios.index'));
        }

        return view('propietarios.show')->with('propietario', $propietario);
    }

    /**
     * Show the form for editing the specified propietario.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $propietario = $this->propietarioRepository->findWithoutFail($id);

        if (empty($propietario)) {
            Flash::error('propietario not found');

            return redirect(route('propietarios.index'));
        }

        return view('propietarios.edit')->with('propietario', $propietario);
    }

    /**
     * Update the specified propietario in storage.
     *
     * @param  int              $id
     * @param UpdatepropietarioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepropietarioRequest $request)
    {
        $propietario = $this->propietarioRepository->findWithoutFail($id);

        if (empty($propietario)) {
            Flash::error('propietario not found');

            return redirect(route('propietarios.index'));
        }

        $propietario = $this->propietarioRepository->update($request->all(), $id);

        Flash::success('propietario updated successfully.');

        return redirect(route('propietarios.index'));
    }

    /**
     * Remove the specified propietario from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $propietario = $this->propietarioRepository->findWithoutFail($id);

        if (empty($propietario)) {
            Flash::error('propietario not found');

            return redirect(route('propietarios.index'));
        }

        $this->propietarioRepository->delete($id);

        Flash::success('propietario deleted successfully.');

        return redirect(route('propietarios.index'));
    }
}
