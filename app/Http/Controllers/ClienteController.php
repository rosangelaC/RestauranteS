<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateClienteRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\ClienteRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class ClienteController extends AppBaseController
{

	/** @var  ClienteRepository */
	private $clienteRepository;

	function __construct(ClienteRepository $clienteRepo)
	{
		$this->middleware('auth');
		$this->clienteRepository = $clienteRepo;
	}

	/**
	 * Display a listing of the Cliente.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->clienteRepository->search($input);

		$clientes = $result[0];

		$attributes = $result[1];

		return view('clientes.index')
		    ->with('clientes', $clientes)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Cliente.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('clientes.create');
	}

	/**
	 * Store a newly created Cliente in storage.
	 *
	 * @param CreateClienteRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateClienteRequest $request)
	{
        $input = $request->all();
        $input['idRestaurant']="5";

		$cliente = $this->clienteRepository->store($input);

		Flash::message('Cliente saved successfully.');

		return redirect(route('clientes.index'));
	}

	/**
	 * Display the specified Cliente.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$cliente = $this->clienteRepository->findClienteById($id);

		if(empty($cliente))
		{
			Flash::error('Cliente not found');
			return redirect(route('clientes.index'));
		}

		return view('clientes.show')->with('cliente', $cliente);
	}

	/**
	 * Show the form for editing the specified Cliente.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$cliente = $this->clienteRepository->findClienteById($id);

		if(empty($cliente))
		{
			Flash::error('Cliente not found');
			return redirect(route('clientes.index'));
		}

		return view('clientes.edit')->with('cliente', $cliente);
	}

	/**
	 * Update the specified Cliente in storage.
	 *
	 * @param  int    $id
	 * @param CreateClienteRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateClienteRequest $request)
	{
		$cliente = $this->clienteRepository->findClienteById($id);

		if(empty($cliente))
		{
			Flash::error('Cliente not found');
			return redirect(route('clientes.index'));
		}

		$cliente = $this->clienteRepository->update($cliente, $request->all());

		Flash::message('Cliente updated successfully.');

		return redirect(route('clientes.index'));
	}

	/**
	 * Remove the specified Cliente from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$cliente = $this->clienteRepository->findClienteById($id);

		if(empty($cliente))
		{
			Flash::error('Cliente not found');
			return redirect(route('clientes.index'));
		}

		$cliente->delete();

		Flash::message('Cliente deleted successfully.');

		return redirect(route('clientes.index'));
	}

}
