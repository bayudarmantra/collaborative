<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreatePerkuliahanRequest extends Request {

	protected $redirect = 'dashboard/perkuliahan/create';

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
			'kodekelas'	=> 'required|alpha_num|unique:perkuliahan,kodekelas',
			'kodemk'	=> 'required',
			'hari'		=> 'required',
			'jam'		=> 'required',
			'dosen'		=> 'required',
		];
	}

}
