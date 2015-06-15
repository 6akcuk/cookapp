<?php namespace App\Http\Controllers\Cook;

use App\Commands\Cook\CreateProductCommand;
use App\Commands\Cook\UpdateCategoryCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\Cook\CategoryRequest;
use App\Http\Requests\Cook\ProductRequest;
use App\Models\Cook\Category;
use App\Models\Cook\Product;
use App\Repositories\Cook\ProductsRepository;

class ProductsController extends Controller {

  public function __construct() {
    $this->loadAndAuthorizeResource(['class' => 'App\Models\Cook\Product']);
  }

  /**
   * Display a listing of the resource.
   *
   * @param ProductsRepository $repository
   * @return Response
   */
  public function index(ProductsRepository $repository)
  {
    $products = Product::paginate(20);
    $productsTotal = $repository->total();

    return view('cook.products.index', compact('products', 'productsTotal'));
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
    $unitsList = config('cook.units_list');

    return view('cook.products.create', compact('categoriesList', 'productTypesList', 'unitsList'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param CategoryRequest $request
   * @return Response
   */
  public function store(ProductRequest $request)
  {
    $this->dispatchFrom(CreateProductCommand::class, $request);

    flash()->success('Продукт успешно добавлен.');
    return redirect('products');
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
    $product = Product::findOrFail($id);
    $categoriesList = Category::lists('name', 'id');
    $productTypesList = config('cook.product_types_list');
    $unitsList = config('cook.units_list');

    return view('cook.products.edit', compact('product', 'categoriesList', 'productTypesList', 'unitsList'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int $id
   * @param CategoryRequest $request
   * @return Response
   */
  public function update($id, ProductRequest $request)
  {
    $this->dispatchFrom(UpdateProductCommand::class, $request, compact('id'));

    flash()->success('Изменения успешно сохранены.');
    return redirect('products');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $product = Product::findOrFail($id);
    $product->delete();

    flash()->success('Продукт успешно удален.');
    return redirect('products');
  }

}
