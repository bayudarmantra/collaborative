<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PerkuliahanRequest extends Request {

	protected $redirect = 'dashboard/perkuliahan/create';
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
			'kodekelas'	=> 'required|unique:perkuliahan,kodekelas',
			'kodemk'	=> 'required',
			'hari'		=> 'required',
			'jam'		=> 'required',
			'nip'		=> 'required'
		];
	}

}
