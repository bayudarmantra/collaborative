<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdatePerkuliahanRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'kodekelas'	=> 'required',
			'kodemk'	=> 'required',
			'hari'		=> 'required',
			'jam'		=> 'required',
			'nip'		=> 'required'
		];
	}

}
