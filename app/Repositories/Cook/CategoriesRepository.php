<?php namespace App\Repositories\Cook;

use App\Models\Cook\Category;

class CategoriesRepository {

  /**
   * Возвращает все категории.
   *
   * @return \Illuminate\Database\Eloquent\Collection|static[]
   */
  public function getAll() {
    return Category::all();
  }

  /**
   * Количество категорий в базе.
   *
   * @return mixed
   */
  public function total() {
    return Category::count();
  }
}