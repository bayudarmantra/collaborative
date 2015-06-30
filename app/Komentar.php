<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mahasiswa;

class Komentar extends Model {

	protected $table = 'komentar';

	public function mhs()
	{
		return $this->belongsTo('App\Mahasiswa','creator','nim');
	}

	public function dosen()
	{
		return $this->belongsTo('App\Dosen','creator','nip');
	}

}
