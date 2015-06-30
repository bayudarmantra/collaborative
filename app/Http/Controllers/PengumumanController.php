<?php namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Pengumuman;

class PengumumanController extends Controller {

    public function store($id)
    {
        $tgl = Request::input('waktuaktif');

        $pengumuman = new Pengumuman;
        $pengumuman->judul = Request::input('judulPengumuman');
        $pengumuman->isi = Request::input('isiPengumuman');
        $pengumuman->waktuaktif = $tgl;
        $pengumuman->kodekelas = $id;
        $pengumuman->save();
    }

    public function show($kode)
    {
        $dateNow = Carbon::now();
        $data = array(
            'pengumuman' => Pengumuman::where('kodekelas', '=', $kode)->where('waktuaktif', '>=', $dateNow)->orderBy('id','desc')->get()
        );

        return view('frontend.includes.pengumuman-content')->with($data);

    }

    public function showById($id)
    {
        $pengumuman = Pengumuman::find($id);
        return json_encode($pengumuman);
    }

    public function update($id)
    {
        $tgl = Request::input('waktuaktif');

        $pengumuman = Pengumuman::find($id);
        $pengumuman->judul = Request::input('judulPengumuman');
        $pengumuman->isi = Request::input('isiPengumuman');
        $pengumuman->waktuaktif = $tgl;
        $pengumuman->kodekelas = $id;
        $pengumuman->save();
    }

    public function deletePengumuman($id)
    {
        $pengumuman = Pengumuman::find($id);
        $pengumuman->delete();
    }

}
