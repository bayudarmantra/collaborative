<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Komentar;
use Request;

class KomentarController extends Controller
{

    public function store($id)
    {
        $komentar = new Komentar();
        $komentar->post_id = $id;
        $komentar->isi = Request::input('komentar');
        $komentar->creator = Request::input('creator');
        $komentar->creator_sts = Request::input('creatorSts');
        $komentar->status = 1;
        $komentar->save();
    }


    public function getKomentarbyId($id)
    {
        $komentarById = Komentar::where('id', '=' , $id)->first();
        return json_encode($komentarById);
    }

    public function updateKomentar($id)
    {
        $komentar = Komentar::find($id);
        $komentar->isi = Request::input('editKomentar');
        $komentar->save();
    }

    public function deleteKomentar($id)
    {
        $komentar = Komentar::where('id', '=', $id)->delete();
    }
}
