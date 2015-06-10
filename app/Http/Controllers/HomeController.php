<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use PDO;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
    Config::set('database.fetch', PDO::FETCH_ASSOC);

    $foldersSeed = [];

    $folders = DB::connection('chef')->table('RECIPE')->get();
    foreach ($folders as &$folder) {
      foreach ($folder as $key => $value) {
        $folder[strtolower($key)] = $value; unset($folder[strtoupper($key)]);
      }

      $folder['recipe_at'] = $folder['recipedate']; unset($folder['recipedate']);
      $folder['organization_id'] = $folder['organizationid']; unset($folder['organizationid']);
      $folder['product_id'] = $folder['productid']; unset($folder['productid']);
      $folder['is_default'] = $folder['isdefault']; unset($folder['isdefault']);
      $folder['product_total'] = $folder['producttotal']; unset($folder['producttotal']);
      $folder['concept_id'] = $folder['conceptid']; unset($folder['conceptid']);

      $folder['created_at'] = $folder['cdate']; unset($folder['cdate']);
      $folder['updated_at'] = $folder['udate']; unset($folder['udate']);

      unset($folder['cuser']);
      unset($folder['uuser']);
      unset($folder['synid']);

      $fields = [];
      foreach ($folder as $key => $value) {
        $fields[] = "'$key' => '$value'";
      }

      $foldersSeed[] = 'Recipe::create(['. implode(', ', $fields) .']);';
    };

    echo implode("<br>", $foldersSeed);

		return view('home');
	}

}
