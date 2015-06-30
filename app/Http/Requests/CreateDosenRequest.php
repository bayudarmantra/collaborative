<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateDosenRequest extends Request {

	protected $redirect = 'dashboard/dosen/create';
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
			'nama' 	 		=> 'required|unique:dosen,nama',
			'nip'	 		=> 'required|unique:dosen,nip',
			'alamat'		=> 'required',
			'agama'			=> 'required|alpha',
			'tmplahir' 		=> 'required|alpha',
			'tgllahir' 		=> 'required',
			'nohp'			=> 'required|numeric',
			'email'			=> 'required|email|unique:dosen,email',
			'notlp'			=> 'numeric',
			'statuspeg'		=> 'required',
			'pass'			=> 'required',
		];
	}

}
