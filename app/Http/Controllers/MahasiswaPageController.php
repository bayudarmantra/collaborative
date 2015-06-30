<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Komentar;
use App\Perkuliahan;
use App\Mhskelas;
use App\Mahasiswa;
use App\Tugas;
use App\Grup;
use App\AnggotaGrup;
use App\Post;
use App\Pengumuman;
use App\Dosen;
use App\Notifikasi;
use Auth;
use DB;
use Session;
use Redirect;
use Request;
use Carbon\Carbon;

class MahasiswaPageController extends Controller
{

    public function getData($id, $title, $kodeKelas, $kodeGrup)
    {
        $dateNow = Carbon::now();
        $kelasDosen = Perkuliahan::select('kodekelas')->where('nip', '=', $id)->get()->toArray();
        $kelasMhs = Mhskelas::select('kodekelas')->where('nim', '=', $id)->get()->toArray();
        $data = array(
            'mahasiswaProfile' => Mahasiswa::with('dosenWali')->where('nim', '=', Request::segment(3))->first(),
            'mahasiswa' => Mahasiswa::where('nim', '=', $id)->first(),
            'dosenwali' => ['' => '-- Pilih dosen --'] + Dosen::lists('nama', 'nip'),
            'kelas' => Mhskelas::with(array('mhs', 'perkuliahan', 'mk'))->where('nim', '=', $id)->get(),
            'title' => $title,
            'listPerkuliahan' => ['' => '-- Pilih kelas --'] + Mhskelas::select('matakuliah.namamk', 'mhskelas.kodekelas')
                    ->join('matakuliah', 'mhskelas.kodemk', '=', 'matakuliah.kodemk')
                    ->join('mahasiswa', 'mhskelas.nim', '=', 'mahasiswa.nim')
                    ->where('mahasiswa.nim', '=', $id)->lists('matakuliah.namamk', 'mhskelas.kodekelas'),
            'grup' => AnggotaGrup::select('grup.nama', 'grup.kodekelas', 'grup.id')
                ->join('grup', 'grup.id', '=', 'anggota_grup.id_grup')
                ->where('anggota_grup.nim', '=', $id)->get(),
            'kelasMember' => Mhskelas::with('mhs')->where('kodekelas', '=', $kodeKelas)->get(),
            'infokelas' => Perkuliahan::with('mk','dosen')->where('kodekelas', '=', $kodeKelas)->first(),
            'infoGrup' => Grup::with('mk', 'mhs')->where('id', '=', $kodeGrup)->first(),
            'grupMember' => AnggotaGrup::with('mhs')->where('id_grup', '=', $kodeGrup)->get(),
            'inviteNotifCount' => Notifikasi::with('mhs')->where('recepient', '=', $id)->get(),
            'tugasDosen' => Tugas::where('pengumpulan', '>=', $dateNow)->whereIn('kelas', $kelasDosen)->get(),
            'tugasMhs' => Tugas::where('pengumpulan', '>=', $dateNow)->whereIn('kelas', $kelasMhs)->get(),
            'pengumumanDosen' => Pengumuman::where('waktuaktif', '>=', $dateNow)->whereIn('kodekelas', $kelasDosen)->get(),
            'pengumumanMhs' => Pengumuman::where('waktuaktif', '>=', $dateNow)->whereIn('kodekelas', $kelasMhs)->get()
        );
        return $data;
    }

    public function showHome()
    {
        $id = Session::get('user');
        return view('frontend.pages.userpages.user-home')->with($this->getData($id, 'Collaborative Learning',NULL, NULL));
    }

    public function showProfile($id)
    {
        $id = Session::get('user');
        return view('frontend.pages.userpages.user-profile')->with($this->getData($id, 'Collaborative Learning',NULL, NULL));
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
        return view('frontend.pages.userpages.user-home')->with($this->getData($id, 'Collaborative Learning', $kode, NULL));
    }

    public function grupPage($kode,$kodeGrup)
    {
        $id = Session::get('user');
        return view('frontend.pages.userpages.user-home')->with($this->getData($id, 'Collaborative Learning', $kode, $kodeGrup));
    }

    public function getKelasMember($kodeKelas, $kodeGrup)
    {
        $data = array(
            'mahasiswa' => Mhskelas::with('mhs')->where('kodekelas', '=', $kodeKelas)
                ->whereNotExists(function ($query) use ($kodeKelas, $kodeGrup) {
                    $query->select(DB::raw('nim'))
                        ->from('anggota_grup')
                        ->whereRaw('mhskelas.nim = anggota_grup.nim')
                        ->where('anggota_grup.kodekelas', '=', $kodeKelas)->where('anggota_grup.id_grup', '=', $kodeGrup);
                })
                ->get(),
            'kodeKelas' => $kodeKelas,
            'kodeGrup' => $kodeGrup

        );
        return view('frontend.includes.grup-member-add')->with($data);
    }

    public function inviteMember()
    {
        $notifikasi = new Notifikasi;
        $notifikasi->tipe = 'grup';
        $notifikasi->sender = Session::get('user');
        $notifikasi->recepient = Request::input('member');
        $notifikasi->messageData = 'Grup member invite';
        $notifikasi->id_grup = Request::input('id_grup');
        $notifikasi->kodekelas = Request::input('kode_kelas');
        $notifikasi->isRead = 0;
        $notifikasi->accept = 0;
        $notifikasi->save();
    }

    public function getInviteNotif()
    {
        $id = Session::get('user');
        $data = array(
            'notifikasi' => Notifikasi::with('mhs')->where('recepient', '=', $id)->where('accept', '=', 0)->orderBy('id','desc')->get()
        );
        return view('frontend.includes.grup-invite-notif')->with($data);
    }

    public function showGrup()
    {
        $id = Session::get('user');
        $data = array(
            'grup' => AnggotaGrup::select('grup.nama', 'grup.kodekelas', 'grup.id')
        ->join('grup', 'grup.id', '=', 'anggota_grup.id_grup')
        ->where('anggota_grup.nim', '=', $id)->get(),
        );

        return view('frontend.includes.grup-list')->with($data);
    }
}