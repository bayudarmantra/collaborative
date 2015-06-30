<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Grup extends Model {

	protected $table = 'grup';

	public function mk()
	{
		return $this->belongsTo('App\Matakuliah','kodemk');
	}

	public function mhs()
	{
		return $this->belongsTo('App\Mahasiswa','nim', 'nim');
	}

}
