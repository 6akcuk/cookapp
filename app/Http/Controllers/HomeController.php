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
    /*Config::set('database.fetch', PDO::FETCH_ASSOC);
    $foldersSeed = [];
    $folders = DB::connection('chef')->table('FOLDER')->get();
    foreach ($folders as &$folder) {
      foreach ($folder as $key => $value) {
        $folder[strtolower($key)] = $value; unset($folder[strtoupper($key)]);
      }
      $folder['product_type'] = $folder['producttype']; unset($folder['producttype']);
      $folder['dry_koef'] = $folder['dryk']; unset($folder['dryk']);
      $folder['salt_max'] = $folder['saltmax']; unset($folder['saltmax']);
      $folder['sugar'] = $folder['suger']; unset($folder['suger']);
      $folder['parent_id'] = $folder['parentid']; unset($folder['parentid']);

      $folder['created_at'] = $folder['cdate']; unset($folder['cdate']);
      $folder['updated_at'] = $folder['udate']; unset($folder['udate']);
      unset($folder['cuser']);
      unset($folder['uuser']);
      unset($folder['synid']);
      $fields = [];
      foreach ($folder as $key => $value) {
        $fields[] = "'$key' => '$value'";
      }
      $foldersSeed[] = 'Category::create(['. implode(', ', $fields) .']);';
    };
    echo implode("<br>", $foldersSeed);*/

		return view('home');
	}

}
