<?php namespace App\Http\Requests\Cook;

use App\Http\Requests\Request;

class CreateProcessRequest extends Request {

  public function authorize()
  {
    return true;
  }

  public function rules() {
    return [
      'name' => 'required|string|max:255',
      'product_id' => 'exists|products,id',
      'coldproc' => 'integer|between:0,100',
      'hotproc' => 'integer|between:0,100',
      'finalproc' => 'integer|between:0,100',
      'protein' => 'integer|between:0,100',
      'grease' => 'integer|between:0,100',
      'ch' => 'integer|between:0,100',
      'is_default' => 'boolean'
    ];
  }
}