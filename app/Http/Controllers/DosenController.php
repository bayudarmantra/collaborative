<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateDosenRequest;
use App\Http\Controllers\Controller;
use App\Dosen;
use App\Http\Requests\UpdateDosenRequest;
use App\User;
use Storage;
use Session;
use Hash;
use Redirect;
use Request;
use Carbon\Carbon;

class DosenController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = array(
            'dosen' => Dosen::where('status', '=', 1)->get(),
            'title' => 'dosen'
        );

        return view('backend.pages.backend-show-dosen')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = array(
            'title' => 'tambah data dosen'
        );

        return view('backend.pages.backend-add-dosen')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateDosenRequest $request)
    {
        // store
        $dosen = new Dosen;
        $dosen->nip = Request::input('nip');
        $dosen->nama = Request::input('nama');
        $dosen->kelamin = Request::input('kelamin');
        $dosen->alamat = Request::input('alamat');
        $dosen->tmplahir = Request::input('tmplahir');
        $dosen->tgllahir = Request::input('tgllahir');
        $dosen->nohp = Request::input('nohp');
        $dosen->notlp = Request::input('notlp');
        $dosen->email = Request::input('email');
        $dosen->agama = Request::input('agama');
        $dosen->status = 1;
        $dosen->statuspeg = Request::input('statuspeg');
        $dosen->save();


        $user = new User;
        $user->username = Request::input('nip');
        $user->password = Hash::make(Request::input('pass'));
        $user->role = 'dosen';
        $user->save();

        $user->assignRole('dosen');

        //Write to Text
        $nip = Request::input('nip');
        $pass = Request::input('pass');
        $content = "NIP: " . $nip . " | " . "Password: " . $pass . "\r\n";

        if(!Storage::exists('dosen.txt'))
        {
            Storage::put('dosen.txt', 'Data Dosen');
        }

        $bytesWritten = Storage::append("dosen.txt", $content);
        if ($bytesWritten === false) {
            die("Couldn't write to the file.");
        }

        // redirect
        Session::flash('message', 'Dosen berhasil ditambahkan');
        return Redirect::to('dashboard/dosen');
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
            'title' => 'edit dosen',
            'dosen' => Dosen::find($id)
        );

        return view('backend.pages.backend-edit-dosen')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(UpdateDosenRequest $request, $id)
    {
        $dosen = Dosen::find($id);
        $dosen->nama = Request::input('nama');
        $dosen->kelamin = Request::input('kelamin');
        $dosen->alamat = Request::input('alamat');
        $dosen->tmplahir = Request::input('tmplahir');
        $dosen->tgllahir = Request::input('tgllahir');
        $dosen->nohp = Request::input('nohp');
        $dosen->notlp = Request::input('notlp');
        $dosen->email = Request::input('email');
        $dosen->agama = Request::input('agama');
        $dosen->statuspeg = Request::input('statuspeg');
        $dosen->save();

        // redirect
        Session::flash('message', 'Dosen berhasil di-update');
        return Redirect::to('dashboard/dosen');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

    }

    public function changeStatus($id)
    {
        $dosen = Dosen::find($id);
        $dosen->status = 0;
        $dosen->save();

        // redirect
        Session::flash('message', 'Data dosen berhasil di hapus');
        return Redirect::to('dashboard/dosen');
    }

}
