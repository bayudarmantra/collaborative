<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Perkuliahan;
use App\Mahasiswa;
use App\Matakuliah;

class Mhskelas extends Model {

	protected $table = 'mhskelas';

	public function perkuliahan()
	{
		return $this->belongsTo('App\Perkuliahan', 'kodekelas');
	}

	public function mhs()
	{
		return $this->belongsTo('App\Mahasiswa', 'nim', 'nim');
	}

	public function mk()
	{
		return $this->belongsTo('App\Matakuliah', 'kodemk');
	}
}
