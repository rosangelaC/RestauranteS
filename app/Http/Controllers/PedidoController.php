<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePedidoRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\PedidoRepository;
use App\Libraries\Repositories\ProductoRepository;
use App\Libraries\Repositories\CategoriaRepository;
use App\Libraries\Repositories\MesaRepository;
use App\Libraries\Repositories\PersonalRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class PedidoController extends AppBaseController
{

	/** @var  PedidoRepository */
	private $pedidoRepository;
	private $productoRepository;
	private $categoriaRepository;
	private $mesasRepository;
	private $personalRepository;

	function __construct(PedidoRepository $pedidoRepo,ProductoRepository $productoRepo,CategoriaRepository $categoriaRepo,MesaRepository $mesaRepo,PersonalRepository $peronalRepo)
	{
		$this->middleware('auth');
		$this->pedidoRepository = $pedidoRepo;
		$this->productoRepository=$productoRepo;
		$this->categoriaRepository=$categoriaRepo;
		$this->mesasRepository=$mesaRepo;
		$this->personalRepository=$peronalRepo;
	}

	/**
	 * Display a listing of the Pedido.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->pedidoRepository->search($input);

		$pedidos = $result[0];

		$attributes = $result[1];

			return view('pedidos.index')
		    ->with('pedidos', $pedidos)		   
		    ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Pedido.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categorias = $this->categoriaRepository->all();
		$mesas = $this->mesasRepository->all()->where('Estado','DISPONIBLE');
		$productos = $this->productoRepository->all();
		$personals = $this->personalRepository->all()->where('Cargo','MESERO');

		return view('pedidos.create')
		 	->with('mesas',$mesas)
		    ->with('personals',$personals)
		    ->with('categorias',$categorias)
		    ->with('productos',$productos);
	}

	

	/**
	 * Store a newly created Pedido in storage.
	 *
	 * @param CreatePedidoRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePedidoRequest $request)
	{
        $input = $request->all();

		$pedido = $this->pedidoRepository->store($input);

		Flash::message('Pedido saved successfully.');

		return redirect(route('pedidos.index'));
	}




	/**
	 * Display the specified Pedido.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$pedido = $this->pedidoRepository->findPedidoById($id);

		if(empty($pedido))
		{
			Flash::error('Pedido not found');
			return redirect(route('pedidos.index'));
		}

		return view('pedidos.show')->with('pedido', $pedido);
	}


	/**
	 * Show the form for editing the specified Pedido.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pedido = $this->pedidoRepository->findPedidoById($id);

		if(empty($pedido))
		{
			Flash::error('Pedido not found');
			return redirect(route('pedidos.index'));
		}

		return view('pedidos.edit')->with('pedido', $pedido);
	}


	/**
	 * Update the specified Pedido in storage.
	 *
	 * @param  int    $id
	 * @param CreatePedidoRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatePedidoRequest $request)
	{
		$pedido = $this->pedidoRepository->findPedidoById($id);

		if(empty($pedido))
		{
			Flash::error('Pedido not found');
			return redirect(route('pedidos.index'));
		}

		$pedido = $this->pedidoRepository->update($pedido, $request->all());

		Flash::message('Pedido updated successfully.');

		return redirect(route('pedidos.index'));
	}


	/**
	 * Remove the specified Pedido from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$pedido = $this->pedidoRepository->findPedidoById($id);

		if(empty($pedido))
		{
			Flash::error('Pedido not found');
			return redirect(route('pedidos.index'));
		}

		$pedido->delete();

		Flash::message('Pedido deleted successfully.');

		return redirect(route('pedidos.index'));
	}


}
