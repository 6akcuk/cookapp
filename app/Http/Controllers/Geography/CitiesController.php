<?php namespace App\Http\Controllers\Geography;

use App\Commands\Geography\CreateCityCommand;
use App\Commands\Geography\UpdateCityCommand;
use App\Models\Geography\City;
use App\Models\Geography\Country;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\Geography\CityRequest;

class CitiesController extends Controller {

  public function __construct() {
    $this->loadAndAuthorizeResource(['class' => 'App\Models\Geography\City']);
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cities = City::all();
    $citiesTotal = City::count();

    return view('cities.index', compact('cities', 'citiesTotal'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    $countriesList = Country::lists('name', 'id');
    return view('cities.create', compact('countriesList'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param CityRequest $request
   * @return Response
   */
	public function store(CityRequest $request)
	{
    $this->dispatchFrom(CreateCityCommand::class, $request);

    flash()->success('Город успешно добавлен.');
    return redirect('cities');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$city = City::findOrFail($id);
    $countriesList = Country::lists('name', 'id');

    return view('cities.edit', compact('city', 'countriesList'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int $id
   * @param CityRequest $request
   * @return Response
   */
	public function update($id, CityRequest $request)
	{
    $this->dispatchFrom(UpdateCityCommand::class, $request, compact('id'));

    flash()->success('Изменения успешно сохранены.');
    return redirect('cities');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$city = City::findOrFail($id);
    $city->delete();

    flash()->success('Город успешно удален.');
    return redirect('cities');
	}

}
