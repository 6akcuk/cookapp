<?php namespace App\Http\Requests\Cook;

use App\Http\Requests\Request;

class CategoryRequest extends Request {

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
      'dry' => 'boolean',
      'grease' => 'boolean',
      'sugar' => 'boolean',
      'salt' => 'boolean',
      'gerber' => 'integer|between:0,100',
      'kma' => 'string',
      'bgkp' => 'string',
      'ecoli' => 'string',
      'saureus' => 'string',
      'proteus' => 'string',
      'patogen' => 'string',
      'parent_id' => 'exists:categories',
      'product_type' => 'integer|in:'. implode(',', array_keys(config('cook.product_types_list'))),
      'dry_koef' => 'numeric|between:0,1',
      'salt_max' => 'numeric|between:0,3',
      'biosanpin' => 'string'
		];
	}

}
