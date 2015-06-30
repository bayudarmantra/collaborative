<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminRequest extends Request {

	protected $redirect = 'dashboard/admin/create';

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
			'nama'			=> 'required',
			'username'		=> 'required',
			'alamat'		=> 'required',
			'password'		=> 'required',
			'konfirmasi'	=> 'required',
		];
	}

}
