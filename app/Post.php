<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Komentar;
use App\Mahasiswa;
use App\Perkuliahan;
use App\Dosen;
use Session;

class Post extends Model {

	protected $table = 'post';

	public function getTime()
	{
		//return dd(Carbon::now());
		return $this->created_at;
	}

	public function komentar()
	{
		return $this->hasMany('App\Komentar','post_id');
	}

	public function komentarTimeline()
	{
		$id = Session::get('user');
		return $this->hasMany('App\Komentar','post_id')->where('creator', '=', $id);
	}

	public function mhs()
	{
		return $this->hasOne('App\Mahasiswa','nim','creator');
	}

	public function dosen()
	{
		return $this->hasOne('App\Dosen','nip','creator');
	}

	public function perkuliahan()
	{
		return $this->hasOne('App\Perkuliahan', 'kodekelas', 'id_scope');
	}

	public function grup()
	{
		return $this->hasOne('App\Grup', 'id', 'id_scope');
	}

}
