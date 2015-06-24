<?php namespace App\Http\Controllers\Cook;

use App\Commands\Cook\UpdateCategoryCommand;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cook\CategoryRequest;
use App\Models\Cook\Category;
use App\Repositories\Cook\CategoriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ApiCategoriesController extends Controller {

  public function __construct() {
    $this->loadAndAuthorizeResource(['class' => 'App\Models\Cook\Category']);
  }

  public function index(CategoriesRepository $repository) {
    return Response::json($repository->getDependencyTree());
  }

  public function show($id) {
    $category = Category::findOrFail($id);
    $category->dry_koef = floatval($category->dry_koef);

    return Response::json($category);
  }

  public function update($id, CategoryRequest $request) {
    $this->dispatchFrom(UpdateCategoryCommand::class, $request, compact('id'));

    return Response::json(['success' => true]);
  }

  public function move($id, Request $request) {
    $category = Category::findOrFail($id);
    $category->parent_id = $request->input('destId');
    $category->save();

    return Response::json(['success' => true]);
  }
}