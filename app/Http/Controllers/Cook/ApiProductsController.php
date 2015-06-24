<?php namespace App\Http\Controllers\Cook;

use App\Http\Controllers\Controller;
use App\Models\Cook\Category;
use App\Models\Cook\Product;
use Illuminate\Support\Facades\Response;

class ApiProductsController extends Controller
{

  public function __construct() {
    $this->loadAndAuthorizeResource(['class' => 'App\Models\Cook\Product']);
  }

  public function index($categoryId) {
    $list = [];
    $products = Product::whereCategoryId($categoryId)->orderBy('name')->get();

    foreach ($products as $product) {
      $list[] = [
        'id' => $product->id,
        'type' => 'product',
        'product_type' => $product->product_type,
        'title' => $product->name
      ];
    }

    return Response::json($list);
    //return Response::json(Product::whereCategoryId($categoryId)->get());
  }
}