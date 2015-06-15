<?php namespace App\Repositories\Cook;

use App\Models\Cook\Product;

class ProductsRepository {

  /**
   * Возвращает все категории.
   *
   * @return \Illuminate\Database\Eloquent\Collection|static[]
   */
  public function getAll() {
    return Product::all();
  }

  /**
   * Количество категорий в базе.
   *
   * @return mixed
   */
  public function total() {
    return Product::count();
  }
}