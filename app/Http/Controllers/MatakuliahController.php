<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMatakuliahRequest;
use App\Http\Requests\UpdateMatakuliahRequest;
use App\Matakuliah;
use Session;
use Redirect;
use Request;

class MatakuliahController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = array(
            'matakuliah' => Matakuliah::where('status', '=', 1)->get(),
            'title' => 'mata kuliah'
        );

        return view('backend.pages.backend-show-matakuliah')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = array(
            'title' => 'add mata kuliah'
        );

        return view('backend.pages.backend-add-matakuliah')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateMatakuliahRequest $request)
    {

        // store
        $matakuliah = new Matakuliah;
        $matakuliah->kodemk = Request::input('kodemk');
        $matakuliah->namamk = Request::input('namamk');
        $matakuliah->sks = Request::input('sks');
        $matakuliah->prodi = Request::input('prodi');
        $matakuliah->status = 1;
        $matakuliah->save();

        // redirect
        Session::flash('message', 'Mata kuliah berhasil ditambahkan');
        return Redirect::to('dashboard/matakuliah');
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
        $data =  array(
            'title' => 'edit mata kuliah',
            'matakuliah' => Matakuliah::find($id)
        );

        return view('backend.pages.backend-edit-matakuliah')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(UpdateMatakuliahRequest $request, $id)
    {
        // store
        $matakuliah = Matakuliah::find($id);
        $matakuliah->kodemk = Request::input('kodemk');
        $matakuliah->namamk = Request::input('namamk');
        $matakuliah->sks = Request::input('sks');
        $matakuliah->prodi = Request::input('prodi');
        $matakuliah->save();

        // redirect
        Session::flash('message', 'Mata kuliah berhasil di-update');
        return Redirect::to('dashboard/matakuliah');
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
        $dosen = Matakuliah::find($id);
        $dosen->status = 0;
        $dosen->save();

        // redirect
        Session::flash('message', 'Data mata kuliah berhasil di hapus');
        return Redirect::to('dashboard/matakuliah');
    }

}
