<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCategoriaRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\CategoriaRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;


class CategoriaController extends AppBaseController
{

	/** @var  CategoriaRepository */
	private $categoriaRepository;

	function __construct(CategoriaRepository $categoriaRepo)
	{
		$this->middleware('auth');
		$this->categoriaRepository = $categoriaRepo;
	}

	/**
	 * Display a listing of the Categoria.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->categoriaRepository->search($input);

		$categorias = $result[0];

		$attributes = $result[1];

		return view('categorias.index')
		    ->with('categorias', $categorias)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Categoria.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('categorias.create');
	}

	/**
	 * Store a newly created Categoria in storage.
	 *
	 * @param CreateCategoriaRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCategoriaRequest $request)
	{
        $input = $request->all();

		$categoria = $this->categoriaRepository->store($input);

		Flash::message('Categoria saved successfully.');

		return redirect(route('categorias.index'));
	}

	/**
	 * Display the specified Categoria.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$categoria = $this->categoriaRepository->findCategoriaById($id);

		if(empty($categoria))
		{
			Flash::error('Categoria not found');
			return redirect(route('categorias.index'));
		}

		return view('categorias.show')->with('categoria', $categoria);
	}

	/**
	 * Show the form for editing the specified Categoria.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$categoria = $this->categoriaRepository->findCategoriaById($id);

		if(empty($categoria))
		{
			Flash::error('Categoria not found');
			return redirect(route('categorias.index'));
		}

		return view('categorias.edit')->with('categoria', $categoria);
	}

	/**
	 * Update the specified Categoria in storage.
	 *
	 * @param  int    $id
	 * @param CreateCategoriaRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateCategoriaRequest $request)
	{
		$categoria = $this->categoriaRepository->findCategoriaById($id);

		if(empty($categoria))
		{
			Flash::error('Categoria not found');
			return redirect(route('categorias.index'));
		}

		$categoria = $this->categoriaRepository->update($categoria, $request->all());

		Flash::message('Categoria updated successfully.');

		return redirect(route('categorias.index'));
	}

	/**
	 * Remove the specified Categoria from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$categoria = $this->categoriaRepository->findCategoriaById($id);

		if(empty($categoria))
		{
			Flash::error('Categoria not found');
			return redirect(route('categorias.index'));
		}

		$categoria->delete();

		Flash::message('Categoria deleted successfully.');

		return redirect(route('categorias.index'));
	}

}
