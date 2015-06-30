<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use App\Grup;
use App\AnggotaGrup;
use App\Notifikasi;
use Session;

class GrupController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    public function addMember($id, $notif_id)
    {
        $member = new AnggotaGrup;
        $member->id_grup = Request::input('id_grup');
        $member->nim = $id;
        $member->kodekelas = Request::input('kodekelas');
        $member->save();

        $notifikasi = Notifikasi::find($notif_id);
        $notifikasi->accept = 1;
        $notifikasi->isRead = 1;
        $notifikasi->save();
    }

    public function declineMember($id)
    {
        $notifikasi = Notifikasi::find($id);
        $notifikasi->delete();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $grup = new Grup;
        $grup->nama = Request::input('nama');
        $grup->kodekelas = Request::input('kelas');
        $grup->nim = Session::get('user');
        $grup->save();

        $last = Grup::orderBy('created_at', 'desc')->first();

        $member = new AnggotaGrup;
        $member->id_grup = $last->id;
        $member->nim = Request::input('nim');
        $member->kodekelas = Request::input('kelas');
        $member->save();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
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

}
