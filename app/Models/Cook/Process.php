<?php namespace App\Models\Cook;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Process extends Model {

  use SoftDeletes;

	protected $fillable = ['name', 'product_id', 'coldproc', 'hotproc', 'finalproc', 'protein', 'grease', 'ch', 'is_default'];

  protected function product() {
    return $this->belongsTo('App\Models\Cook\Product');
  }

}
