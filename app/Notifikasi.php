<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mahasiswa;

class Notifikasi extends Model {

	protected $table = 'notifikasi';

	public function mhs()
	{
		return $this->belongsTo('App\Mahasiswa', 'sender', 'nim');
	}

}
