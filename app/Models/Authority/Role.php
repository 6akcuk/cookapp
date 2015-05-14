<?php namespace App\Models\Authority;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model {

  use SoftDeletes;

  protected $dates = ['deleted_at'];

  protected $fillable = [
    'name'
  ];
}