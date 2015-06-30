<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateMahasiswaRequest extends Request {

	protected $redirect = 'dashboard/mahasiswa/create';
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
			'nama' 	 		=> 'required|unique:mahasiswa,nama',
			'nim'	 		=> 'required|numeric|unique:mahasiswa,nim',
			'alamat'		=> 'required',
			'agama'			=> 'required|alpha',
			'prodi'			=> 'required',
			'angkatan'		=> 'required|numeric',
			'tmplahir' 		=> 'required|alpha',
			'tgllahir' 		=> 'required',
			'nohp'			=> 'required|numeric',
			'email'			=> 'required|email|unique:mahasiswa,email',
			'ststransfer' 	=> 'required',
			'stskelas' 		=> 'required',
			'stsinvestasi' 	=> 'required',
			'stskuliah'		=> 'required',
			'dosenwali' 	=> 'required',
			'notlp'			=> 'numeric',
			'pass'			=> 'required',
		];
	}
}
