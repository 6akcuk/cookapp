<?php namespace App\Models\Cook;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model {

  use SoftDeletes;

  protected $fillable = [
    'name',
    'unit',
    'gramm',
    'buyprice',
    'protein',
    'grease',
    'ch',
    'dry',
    'sugar',
    'fat',
    'salt',
    'state',
    'product_type',
    'category_id',
    'alco',
    'vita',
    'vitb',
    'vitb1',
    'vitb2',
    'vitc',
    'vitd',
    'vite',
    'vitpp',
    'minca',
    'mink',
    'minmg',
    'minfe',
    'minna',
    'minp'
  ];
}
