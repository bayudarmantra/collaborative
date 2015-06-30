<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MhsKelas;
use App\Post;

class Mahasiswa extends Model {

	protected $table = 'mahasiswa';

	public function mhskelas()
	{
		return $this->belongsTo('App\Mhskelas', 'nim');
	}

	public function dosenWali()
	{
		return $this->belongsTo('App\Dosen', 'dosenwali', 'nip');
	}
}
