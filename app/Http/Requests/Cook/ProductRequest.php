<?php namespace App\Http\Requests\Cook;

use App\Http\Requests\Request;

class ProductRequest extends Request {

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'name' => 'required|max:255',
      'category_id' => 'exists:categories,id',
      'product_type' => 'integer|in:'. implode(',', array_keys(config('cook.product_types_list'))),
      'unit' => 'string|in:'. implode(',', config('cook.units_list')),
      'protein' => 'numeric',
      'grease' => 'numeric',
      'ch' => 'numeric',
      'sugar' => 'numeric',
      'fat' => 'numeric',
      'alco' => 'integer',
      'vita' => 'numeric',
      'vitb' => 'numeric',
      'vitb1' => 'numeric',
      'vitb2' => 'numeric',
      'vitc' => 'numeric',
      'vitd' => 'numeric',
      'vite' => 'numeric',
      'vitpp' => 'numeric',
      'minca' => 'numeric',
      'mink' => 'numeric',
      'minmg' => 'numeric',
      'minfe' => 'numeric',
      'minna' => 'numeric',
      'minp' => 'numeric'
    ];
  }

}
