<?php namespace App\Http\Requests\Geography;

use App\Http\Requests\Request;

class CityRequest extends Request {

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
      'country_id' => 'required|exists:countries,id',
      'phonecode' => 'required|integer'
		];
	}

}
