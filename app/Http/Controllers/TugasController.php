<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tugas;
use Carbon\Carbon;
use Request;

class TugasController extends Controller {

	public function store($id)
	{
		$tgl = Request::input('tglKumpul');
		$waktu = Carbon::createFromFormat('g:i a', Request::input('waktuKumpul'))->toTimeString();
		$pengumpulan = $tgl.' '.$waktu;
		$tugas = new Tugas;
		$tugas->judul = Request::input('judulTugas');
		$tugas->deskripsi = Request::input('deskripsi');
		$tugas->pengumpulan = $pengumpulan;
		$tugas->kelas = $id;
		$tugas->save();
	}

	public function show($kode)
	{
		$dateNow = Carbon::now();
		$data = array(
			'tugas' => Tugas::where('kelas', '=', $kode)->where('pengumpulan', '>=', $dateNow)->get()
		);

		return view('frontend.includes.tugas-content')->with($data);

	}

	public function showById($id)
	{
		$tugas = Tugas::find($id);
		return json_encode($tugas);
	}

	public function update($id)
	{
		$tgl = Request::input('tglKumpul');
		$waktu = Carbon::createFromFormat('g:i a', Request::input('waktuKumpul'))->toTimeString();

		$pengumpulan = $tgl.' '.$waktu;
		$tugas = Tugas::find($id);
		$tugas->judul = Request::input('judulTugas');
		$tugas->deskripsi = Request::input('deskripsi');
		$tugas->pengumpulan = $pengumpulan;
		$tugas->save();
	}

	public function deleteTugas($id)
	{
		$tugas = Tugas::find($id);
		$tugas->delete();
	}

}
