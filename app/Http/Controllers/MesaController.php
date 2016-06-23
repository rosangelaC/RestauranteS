<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateMesaRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\MesaRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class MesaController extends AppBaseController
{

	/** @var  MesaRepository */
	private $mesaRepository;

	function __construct(MesaRepository $mesaRepo)
	{
		$this->middleware('auth');
		$this->mesaRepository = $mesaRepo;
	}

	/**
	 * Display a listing of the Mesa.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->mesaRepository->search($input);

		$mesas = $result[0];

		$attributes = $result[1];

		return view('mesas.index')
		    ->with('mesas', $mesas)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Mesa.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		return view('mesas.create');
	}

	/**
	 * Store a newly created Mesa in storage.
	 *
	 * @param CreateMesaRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateMesaRequest $request)
	{
        $input = $request->all();

		$mesa = $this->mesaRepository->store($input);

		Flash::message('Mesa saved successfully.');

		return redirect(route('mesas.index'));
	}

	/**
	 * Display the specified Mesa.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$mesa = $this->mesaRepository->findMesaById($id);

		if(empty($mesa))
		{
			Flash::error('Mesa not found');
			return redirect(route('mesas.index'));
		}

		return view('mesas.show')->with('mesa', $mesa);
	}

	/**
	 * Show the form for editing the specified Mesa.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$mesa = $this->mesaRepository->findMesaById($id);

		if(empty($mesa))
		{
			Flash::error('Mesa not found');
			return redirect(route('mesas.index'));
		}

		return view('mesas.edit')->with('mesa', $mesa);
	}

	/**
	 * Update the specified Mesa in storage.
	 *
	 * @param  int    $id
	 * @param CreateMesaRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateMesaRequest $request)
	{
		$mesa = $this->mesaRepository->findMesaById($id);

		if(empty($mesa))
		{
			Flash::error('Mesa not found');
			return redirect(route('mesas.index'));
		}

		$mesa = $this->mesaRepository->update($mesa, $request->all());

		Flash::message('Mesa updated successfully.');

		return redirect(route('mesas.index'));
	}

	/**
	 * Remove the specified Mesa from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$mesa = $this->mesaRepository->findMesaById($id);

		if(empty($mesa))
		{
			Flash::error('Mesa not found');
			return redirect(route('mesas.index'));
		}

		$mesa->delete();

		Flash::message('Mesa deleted successfully.');

		return redirect(route('mesas.index'));
	}

}
