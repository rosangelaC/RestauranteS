<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePersonalRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\PersonalRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class PersonalController extends AppBaseController
{

	/** @var  PersonalRepository */
	private $personalRepository;

	function __construct(PersonalRepository $personalRepo)
	{
		$this->middleware('auth');
		$this->personalRepository = $personalRepo;
	}

	/**
	 * Display a listing of the Personal.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->personalRepository->search($input);

		$personals = $result[0];

		$attributes = $result[1];

		return view('personals.index')
		    ->with('personals', $personals)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Personal.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('personals.create');
	}

	/**
	 * Store a newly created Personal in storage.
	 *
	 * @param CreatePersonalRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePersonalRequest $request)
	{
        $input = $request->all();

		$personal = $this->personalRepository->store($input);

		Flash::message('Personal saved successfully.');

		return redirect(route('personals.index'));
	}

	/**
	 * Display the specified Personal.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$personal = $this->personalRepository->findPersonalById($id);

		if(empty($personal))
		{
			Flash::error('Personal not found');
			return redirect(route('personals.index'));
		}

		return view('personals.show')->with('personal', $personal);
	}

	/**
	 * Show the form for editing the specified Personal.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$personal = $this->personalRepository->findPersonalById($id);

		if(empty($personal))
		{
			Flash::error('Personal not found');
			return redirect(route('personals.index'));
		}

		return view('personals.edit')->with('personal', $personal);
	}

	/**
	 * Update the specified Personal in storage.
	 *
	 * @param  int    $id
	 * @param CreatePersonalRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatePersonalRequest $request)
	{
		$personal = $this->personalRepository->findPersonalById($id);

		if(empty($personal))
		{
			Flash::error('Personal not found');
			return redirect(route('personals.index'));
		}

		$personal = $this->personalRepository->update($personal, $request->all());

		Flash::message('Personal updated successfully.');

		return redirect(route('personals.index'));
	}

	/**
	 * Remove the specified Personal from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$personal = $this->personalRepository->findPersonalById($id);

		if(empty($personal))
		{
			Flash::error('Personal not found');
			return redirect(route('personals.index'));
		}

		$personal->delete();

		Flash::message('Personal deleted successfully.');

		return redirect(route('personals.index'));
	}

}
