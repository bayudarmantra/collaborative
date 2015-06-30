<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateMatakuliahRequest extends Request {

	protected $redirect = 'dashboard/matakuliah/create';
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
			'kodemk'	=> 'required|unique:matakuliah,kodemk',
			'namamk'	=> 'required|unique:matakuliah,namamk',
			'sks'		=> 'required|numeric',
			'prodi'		=> 'required',
		];
	}

}
