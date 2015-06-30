<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Matakuliah;
use App\Dosen;

class Perkuliahan extends Model {

	protected $table = 'perkuliahan';
	protected $primaryKey = 'kodekelas';

	public function mk()
	{
		return $this->belongsTo('App\Matakuliah','kodemk');
	}

	public function dosen()
	{
		return $this->belongsTo('App\Dosen','nip','nip');
	}

}
