<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AnggotaGrup extends Model {

	protected $table = 'anggota_grup';

	public function mhs()
	{
		return $this->belongsTo('App\Mahasiswa', 'nim', 'nim');
	}

}
