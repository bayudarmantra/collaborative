<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Dosen;
use App\Mahasiswa;
use App\Matakuliah;
use App\Perkuliahan;
use App\User;

class DashboardController extends Controller {

    public function index()
    {
        $data = array(
            'title' => "dashboard",
            'dosen' => count(Dosen::where('status','=',1)->get()),
            'mahasiswa' => count(Mahasiswa::where('status','=',1)->get()),
            'matakuliah' => count(Matakuliah::where('status','=',1)->get()),
            'perkuliahan' => count(Perkuliahan::where('status','=',1)->get()),
            'userMhs' => User::with('mhs')->where('role' ,'=', 'mahasiswa')->get(),
            'userDosen' => User::with('dosen')->where('role' ,'=', 'dosen')->get()
        );

        return view('backend.pages.backend-home')->with($data);
    }


}
