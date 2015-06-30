<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Komentar;
use App\Perkuliahan;
use App\Mhskelas;
use App\Mahasiswa;
use App\Grup;
use App\Dosen;
use App\Tugas;
use App\AnggotaGrup;
use App\Pengumuman;
use App\Post;
use Auth;
use DB;
use Session;
use Carbon\Carbon;
use Request;

class DosenPageController extends Controller {

    public function getData($id, $title, $kode)
    {
        $dateNow = Carbon::now();
        $kelasDosen = Perkuliahan::select('kodekelas')->where('nip', '=', $id)->get()->toArray();
        $data = array(
            'dosen' => DB::table('dosen')->where('nip', $id)->first(),
            'dosenProfile' => Dosen::where('nip', '=', Request::segment(3))->first(),
            'kelas' => Mhskelas::with(array('mhs', 'perkuliahan', 'mk'))->where('nim', '=', $id)->get(),
            'kelasDosen' => Perkuliahan::with(array('mk', 'dosen'))->where('nip', '=', $id)->get(),
            'title' => $title,
            'listPerkuliahan' => ['' => '-- Pilih kelas --'] + Mhskelas::select('matakuliah.namamk', 'mhskelas.kodekelas')
                    ->join('matakuliah', 'mhskelas.kodemk', '=', 'matakuliah.kodemk')
                    ->join('mahasiswa', 'mhskelas.nim', '=', 'mahasiswa.nim')
                    ->where('mahasiswa.nim', '=', $id)->lists('matakuliah.namamk', 'mhskelas.kodekelas'),
            'perkuliahanDosen' => ['' => '-- Pilih kelas --'] + Perkuliahan::select('perkuliahan.kodekelas', 'matakuliah.namamk')
                    ->join('matakuliah', 'matakuliah.kodemk', '=', 'perkuliahan.kodemk')
                    ->where('perkuliahan.nip', '=', $id)->lists('matakuliah.namamk', 'perkuliahan.kodekelas'),
            'grup' => AnggotaGrup::select('grup.nama', 'grup.kodekelas')
                ->join('grup', 'grup.id', '=', 'anggota_grup.id_grup')
                ->where('anggota_grup.nim', '=', $id)->get(),
            'post' => Post::with(array('komentar','mhs','perkuliahan'))->where('creator', '=' , $id)->get(),
            'postKelas' => Post::with(array('komentar', 'mhs', 'perkuliahan'))->where('id_scope', '=', $kode)->get(),
            'kelasMember' => Mhskelas::with('mhs')->where('kodekelas', '=', $kode)->get(),
            'infokelas' => Perkuliahan::with('mk','dosen')->where('kodekelas', '=', $kode)->first(),
            'tugasDosen' => Tugas::where('pengumpulan', '>=', $dateNow)->whereIn('kelas', $kelasDosen)->get(),
            'pengumumanDosen' => Pengumuman::where('waktuaktif', '>=', $dateNow)->whereIn('kodekelas', $kelasDosen)->get(),
        );
        return $data;
    }

    public function showHome()
    {
        $id = Session::get('user');
        return view('frontend.pages.userpages.user-home')->with($this->getData($id, 'Collaborative Learning',NULL));
    }

    public function showProfile($id)
    {
        return view('frontend.pages.userpages.user-profile')->with($this->getData($id, 'Collaborative Learning',NULL));
    }

    public function clickableUrls($html){
        return $result = preg_replace(
            '%\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))%s',
            '<a href="$1">$1</a>',
            $html
        );
    }

    public function kelasPage($kode)
    {
        $id = Session::get('user');
        return view('frontend.pages.userpages.user-home')->with($this->getData($id, 'Collaborative Learning', $kode));
    }

}
