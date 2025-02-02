<?php namespace App\Http\Requests\Geography;

use App\Http\Requests\Request;

class CountryRequest extends Request {

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
			'name' => 'required|max:100',
      'phonecode' => 'required|integer'
		];
	}

}
