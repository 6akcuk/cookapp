<?php namespace App\Models\Cook;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {

  use SoftDeletes;

  protected $fillable = [
    'name',
    'dry',
    'grease',
    'sugar',
    'salt',
    'gerber',
    'kma',
    'bgkp',
    'ecoli',
    'saureus',
    'proteus',
    'patogen',
    'parent_id',
    'product_type',
    'dry_koef',
    'salt_max',
    'biosanpin'
  ];
}
