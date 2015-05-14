<?php namespace App\Http\Controllers\Geography;

use App\Commands\Geography\CreateCountryCommand;
use App\Commands\Geography\UpdateCountryCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\Geography\CountryRequest;
use App\Models\Geography\Country;
use Illuminate\Http\Request;

class CountriesController extends Controller {

  public function __construct() {
    $this->loadAndAuthorizeResource(['class' => 'App\Models\Geography\Country']);
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    $countries = Country::all();
    $countriesTotal = Country::count();

    return view('countries.index', compact('countries', 'countriesTotal'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('countries.create');
	}

  /**
   * Store a newly created resource in storage.
   *
   * @param CountryRequest $request
   * @return Response
   */
	public function store(CountryRequest $request)
	{
		$this->dispatchFrom(CreateCountryCommand::class, $request);

    flash()->success('Страна успешно добавлена.');
    return redirect('countries');
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
		$country = Country::findOrFail($id);

    return view('countries.edit', compact('country'));
	}

  /**
   * Update the specified resource in storage.
   *
   * @param  int $id
   * @param CountryRequest $request
   * @return Response
   */
	public function update($id, CountryRequest $request)
	{
    $this->dispatchFrom(UpdateCountryCommand::class, $request, compact('id'));

    flash()->success('Изменения успешно сохранены.');
    return redirect('countries');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$country = Country::findOrFail($id);
    $country->delete();

    flash()->success('Страна удалена.');
    return redirect('countries');
	}

}
