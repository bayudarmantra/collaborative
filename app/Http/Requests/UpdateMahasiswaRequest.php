<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateMahasiswaRequest extends Request {

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
			'nama' 	 		=> 'required',
			'nim'	 		=> 'required|numeric',
			'alamat'		=> 'required',
			'agama'			=> 'required|alpha',
			'prodi'			=> 'required',
			'angkatan'		=> 'required|numeric',
			'tmplahir' 		=> 'required|alpha',
			'tgllahir' 		=> 'required',
			'nohp'			=> 'required|numeric',
			'email'			=> 'required|email',
			'ststransfer' 	=> 'required',
			'stskelas' 		=> 'required',
			'stsinvestasi' 	=> 'required',
			'stskuliah'		=> 'required',
			'dosenwali' 	=> 'required',
			'notlp'			=> 'numeric',
		];
	}

}
