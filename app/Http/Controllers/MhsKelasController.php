<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mhskelas;
use Illuminate\Http\Request;

class MhsKelasController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $nim = $request->input('nim');
        $kodekelas = $request->input('kodekelas');
        $kodemk = $request->input('kodemk');
        if (is_array($nim)) {
            foreach ($nim as $value) {
                $Mhskelas = new Mhskelas;
                $Mhskelas->kodekelas = $kodekelas;
                $Mhskelas->nim = $value;
                //$Mhskelas->id_mhs =
                $Mhskelas->kodemk = $kodemk;
                $Mhskelas->save();
            }
        }
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
