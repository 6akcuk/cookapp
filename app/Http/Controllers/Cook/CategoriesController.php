<?php namespace App\Http\Controllers\Cook;

use App\Commands\Cook\CreateCategoryCommand;
use App\Commands\Cook\UpdateCategoryCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\Cook\CategoryRequest;
use App\Models\Cook\Category;
use App\Repositories\Cook\CategoriesRepository;
use Illuminate\Http\Request;

class CategoriesController extends Controller {

  public function __construct() {
    $this->loadAndAuthorizeResource(['class' => 'App\Models\Cook\Category']);
  }

  /**
   * Display a listing of the resource.
   *
   * @param CategoriesRepository $categoriesRepository
   * @return Response
   */
	public function index(CategoriesRepository $categoriesRepository)
	{
		$categories = Category::paginate(20);
    $categoriesTotal = $categoriesRepository->total();

    return view('cook.categories.index', compact('categories', 'categoriesTotal'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    $categoriesList = Category::lists('name', 'id');
    $productTypesList = config('cook.product_types_list');

		return view('cook.categories.create', compact('categoriesList', 'productTypesList'));
	}

  /**
   * Store a newly created resource in storage.
   *
   * @param CategoryRequest $request
   * @return Response
   */
	public function store(CategoryRequest $request)
	{
    $this->dispatchFrom(CreateCategoryCommand::class, $request);

    flash()->success('Категория успешно добавлена.');
    return redirect('categories');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = Category::findOrFail($id);
    $categoriesList = Category::lists('name', 'id');
    $productTypesList = config('cook.product_types_list');

    return view('cook.categories.edit', compact('category', 'categoriesList', 'productTypesList'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int $id
   * @param CategoryRequest $request
   * @return Response
   */
	public function update($id, CategoryRequest $request)
	{
    $this->dispatchFrom(UpdateCategoryCommand::class, $request, compact('id'));

    flash()->success('Изменения успешно сохранены.');
    return redirect('categories');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
    $category = Category::findOrFail($id);
    $category->delete();

    flash()->success('Категория успешно удалена.');
    return redirect('categories');
	}

}
