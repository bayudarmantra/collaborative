<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\PerkuliahanRequest;
use App\Http\Requests\UpdatePerkuliahanRequest;
use App\Http\Controllers\Controller;
use App\Matakuliah;
use App\Perkuliahan;
use App\Dosen;
use App\Mahasiswa;
use App\Mhskelas;
use Request;
use Session;
use Redirect;
use DB;

class PerkuliahanController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = array(
            'perkuliahan' => Perkuliahan::with(array('mk', 'dosen'))->where('status', '=', 1)->get(),
            'title' => 'perkuliahan'
        );

        return view('backend.pages.backend-show-perkuliahan')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = array(
            'title' => 'tambah data perkuliahan',
            'dosen' => ['' => '-- Pilih dosen --'] + Dosen::whereIn('status', array(1))->get()->lists('nama', 'nip'),
            'matakuliah' => ['' => '-- Pilih matakuliah --'] + Matakuliah::whereIn('status', array(1))->get()->lists('namamk', 'kodemk')
        );

        return view('backend.pages.backend-add-perkuliahan')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PerkuliahanRequest $request)
    {
        // store
        $perkuliahan = new Perkuliahan;
        $perkuliahan->kodekelas = Request::input('kodekelas');
        $perkuliahan->kodemk = Request::input('kodemk');
        $perkuliahan->hari = Request::input('hari');
        $perkuliahan->jam = Request::input('jam');
        $perkuliahan->nip = Request::input('nip');
        $perkuliahan->status = 1;
        $perkuliahan->save();

        // redirect
        Session::flash('message', 'Kelas perkuliahan berhasil ditambah');
        return Redirect::to('dashboard/perkuliahan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $data = array(
            'title' => 'Perkuliahan',
            'perkuliahan' => Perkuliahan::with(array('mk', 'dosen'))->where('kodekelas', '=', $id)->get(),
            'mhskelas' => Mhskelas::with('mhs')->where('kodekelas', '=', $id)->get(),
            'mahasiswa' => DB::table('mahasiswa')
                ->whereNotExists(function ($query) use ($id) {
                    $query->select(DB::raw('nama', 'nim'))
                        ->from('mhskelas')
                        ->whereRaw('mahasiswa.nim = mhskelas.nim')
                        ->where('mhskelas.kodekelas', '=', $id);
                })
                ->get()
        );
        return view('backend.pages.backend-show-kelas')->with($data);
    }

    public function getMahasiswa($id)
    {
        $mahasiswa = DB::table('mahasiswa')
            ->whereNotExists(function ($query) use ($id) {
                $query->select(DB::raw('nama', 'nim'))
                    ->from('mhskelas')
                    ->whereRaw('mahasiswa.nim = mhskelas.nim')
                    ->where('mhskelas.kodekelas', '=', $id);
            })
            ->get();
        return json_encode($mahasiswa);
    }

    public function getMhsKelas($id)
    {
        $mhskelas = Mhskelas::with('mhs')->where('kodekelas', '=', $id)->get();
        return json_encode($mhskelas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $data = array(
            'title' => 'Edit Perkuliahan',
            'perkuliahan' => Perkuliahan::find($id),
            'dosen' => ['' => '-- Pilih dosen --'] + Dosen::lists('nama', 'nip'),
            'matakuliah' => ['' => '-- Pilih matakuliah --'] + Matakuliah::whereIn('status', array(1))->get()->lists('namamk', 'kodemk')
        );

        return view('backend.pages.backend-edit-perkuliahan')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(UpdatePerkuliahanRequest $request, $id)
    {
        // store
        $perkuliahan = Perkuliahan::find($id);
        $perkuliahan->kodekelas = Request::input('kodekelas');
        $perkuliahan->kodemk = Request::input('kodemk');
        $perkuliahan->hari = Request::input('hari');
        $perkuliahan->jam = Request::input('jam');
        $perkuliahan->nip = Request::input('nip');
        $perkuliahan->save();

        // redirect
        Session::flash('message', 'Kelas perkuliahan berhasil di-update');
        return Redirect::to('dashboard/perkuliahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus($id)
    {
        $perkuliahan = Perkuliahan::find($id);
        $perkuliahan->status = 0;
        $perkuliahan->save();

        // redirect
        Session::flash('message', 'Data perkuliahan berhasil di hapus');
        return Redirect::to('dashboard/perkuliahan');
    }

}
