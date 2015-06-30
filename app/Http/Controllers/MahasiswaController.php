<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateMahasiswaRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Mahasiswa;
use App\Dosen;
use App\User;
use Storage;
use Session;
use Crypt;
use Redirect;
use Request;
use File;
use Response;
use Hash;
use DB;
use Auth;
use Carbon\Carbon;
use LaravelPusher;

class MahasiswaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = array(
            'mahasiswa' => Mahasiswa::where('status', '=', 1)->get(),
            'title' => 'mahasiswa'
        );

        return view('backend.pages.backend-show-mahasiswa')->with($data);
    }

    public function notifications()
    {
        $message = view('frontend.includes.top-menu');
        LaravelPusher::trigger('collab', 'notif', ['message' => $message]);
// We're done here - how easy was that, it just works!

        //Pusher::getSettings();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = array(
            'title' => 'tambah data mahasiswa',
            'dosen' => ['' => '-- Pilih dosen --'] + Dosen::lists('nama', 'nip')
        );

        return view('backend.pages.backend-add-mahasiswa')->with($data);
    }

    public function addPhoto($id)
    {
        $xhr = $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
        $file = Request::file('file');
        $extension = $file->getClientOriginalExtension();
        $photoName = $file->getFilename().'.'.$extension;
        //Storage::put($file->getFilename() . '.' . $extension, File::get($file));
        $uploadPath = 'assets/upload';
        $file->move($uploadPath,$photoName);

        if(Auth::user()->role == "mahasiswa"){
            $mahasiswa = Mahasiswa::where("nim","=",$id)->first();
            $mahasiswa->foto = $photoName;
            $mahasiswa->save();
        }else{
            $dosen = Dosen::where('nip', '=', $id)->first();
            $dosen->foto = $photoName;
            $dosen->save();
        }

        if($xhr){
           echo $photoName;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateMahasiswaRequest $request)
    {
        // store
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nama = Request::input('nama');
        $mahasiswa->nim = Request::input('nim');
        $mahasiswa->kelamin = Request::input('kelamin');
        $mahasiswa->alamat = Request::input('alamat');
        $mahasiswa->tmplahir = Request::input('tmplahir');
        $mahasiswa->tgllahir = Request::input('tgllahir');
        $mahasiswa->nohp = Request::input('nohp');
        $mahasiswa->notlp = Request::input('notlp');
        $mahasiswa->email = Request::input('email');
        $mahasiswa->agama = Request::input('agama');
        $mahasiswa->prodi = Request::input('prodi');
        $mahasiswa->angkatan = Request::input('angkatan');
        $mahasiswa->stskelas = Request::input('stskelas');
        $mahasiswa->ststransfer = Request::input('ststransfer');
        $mahasiswa->stsinvestasi = Request::input('stsinvestasi');
        $mahasiswa->stskuliah = Request::input('stskuliah');
        $mahasiswa->dosenwali = Request::input('dosenwali');
        $mahasiswa->status = 1;
        $mahasiswa->save();

        $user = new User;
        $user->username = Request::input('nim');
        $user->password = Hash::make(Request::input('pass'));
        $user->role = 'mahasiswa';
        $user->save();

        $user->assignRole('mahasiswa');

        //Write to Text
        $nim = Request::input('nip');
        $pass = Request::input('pass');
        $content = "NIM: " . $nim . " | " . "Password: " . $pass . "\r\n";

        if(!Storage::exists('mahasiswa.txt'))
        {
            Storage::put('mahasiswa.txt', 'Data Mahasiswa');
        }

        $bytesWritten = Storage::append("mahasiswa.txt", $content);
        if ($bytesWritten === false) {
            die("Couldn't write to the file.");
        }


        // redirect
        Session::flash('message', 'Mahasiswa berhasil ditambahkan');
        return Redirect::to('dashboard/mahasiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
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
            'title' => 'Edit Mahasiswa',
            'mahasiswa' => Mahasiswa::find($id),
            'dosen' => ['' => '-- Pilih dosen --'] + Dosen::lists('nama', 'nip')
        );

        return view('backend.pages.backend-edit-mahasiswa')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(UpdateMahasiswaRequest $request, $id)
    {
        // store
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nama = Request::input('nama');
        $mahasiswa->kelamin = Request::input('kelamin');
        $mahasiswa->alamat = Request::input('alamat');
        $mahasiswa->tmplahir = Request::input('tmplahir');
        $mahasiswa->tgllahir = Request::input('tgllahir');
        $mahasiswa->nohp = Request::input('nohp');
        $mahasiswa->notlp = Request::input('notlp');
        $mahasiswa->email = Request::input('email');
        $mahasiswa->agama = Request::input('agama');
        $mahasiswa->prodi = Request::input('prodi');
        $mahasiswa->angkatan = Request::input('angkatan');
        $mahasiswa->stskelas = Request::input('stskelas');
        $mahasiswa->ststransfer = Request::input('ststransfer');
        $mahasiswa->stsinvestasi = Request::input('stsinvestasi');
        $mahasiswa->stskuliah = Request::input('stskuliah');
        $mahasiswa->dosenwali = Request::input('dosenwali');
        $mahasiswa->save();

        // redirect
        Session::flash('message', 'Mahasiswa berhasil di-update');
        return Redirect::to('dashboard/mahasiswa');
    }

    public function updateProfil(UpdateMahasiswaRequest $request, $id)
    {
        // store
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nama = Request::input('nama');
        $mahasiswa->kelamin = Request::input('kelamin');
        $mahasiswa->alamat = Request::input('alamat');
        $mahasiswa->tmplahir = Request::input('tmplahir');
        $mahasiswa->tgllahir = Request::input('tgllahir');
        $mahasiswa->nohp = Request::input('nohp');
        $mahasiswa->notlp = Request::input('notlp');
        $mahasiswa->email = Request::input('email');
        $mahasiswa->agama = Request::input('agama');
        $mahasiswa->prodi = Request::input('prodi');
        $mahasiswa->angkatan = Request::input('angkatan');
        $mahasiswa->stskelas = Request::input('stskelas');
        $mahasiswa->ststransfer = Request::input('ststransfer');
        $mahasiswa->stsinvestasi = Request::input('stsinvestasi');
        $mahasiswa->stskuliah = Request::input('stskuliah');
        $mahasiswa->dosenwali = Request::input('dosenwali');
        $mahasiswa->save();
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
        $mhs = Mahasiswa::find($id);
        $mhs->status = 0;
        $mhs->save();

        // redirect
        Session::flash('message', 'Data mahasiswa berhasil di hapus');
        return Redirect::to('dashboard/mahasiswa');
    }

}
