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

  public function getDependencyTree() {
    $list = [];
    $types = config('cook.product_types_list');

    function _nodes($parentId) {
      $list = [];
      $data = Category::whereParentId($parentId)->orderBy('name')->get();

      if ($data) {
        foreach ($data as $dt) {
          $list[] = [
            'id' => $dt->id,
            'title' => $dt->name,
            'type' => 'category',
            'product_type' => $dt->product_type,
            'nodes' => _nodes($dt->id)
          ];
        }
      }

      return $list;
    }

    foreach ($types as $id => $type) {
      $list[$id] = ['id' => $id, 'type' => 'root', 'title' => $type, 'nodes' => []];

      $data = Category::whereParentId(0)->whereProductType($id)->orderBy('name')->get();

      foreach ($data as $dt) {
        if ($dt->id == 0) continue;

        $list[$id]['nodes'][] = [
          'id' => $dt->id,
          'type' => 'category',
          'title' => $dt->name,
          'product_type' => $dt->product_type,
          'nodes' => _nodes($dt->id)
        ];
      }
    }

    return $list;
  }
}