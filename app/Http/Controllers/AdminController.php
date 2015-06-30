<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Admin;
use App\User;
use Request;
use Session;
use Redirect;
use Crypt;
use Auth;
use DB;
use Hash;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Admin',
            'admin' => Admin::all()
        );

        return view('backend.pages.backend-show-admin')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Admin'
        );

        return view('backend.pages.backend-add-admin')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(AdminRequest $request)
    {
        //store
        $admin = new Admin;
        $admin->nama = Request::input('nama');
        $admin->alamat = Request::input('alamat');
        $admin->status = Request::input('status');
        $admin->save();


        $user = new User;
        $user->username = Request::input('username');
        $user->password = Hash::make(Request::input('password'));
        $user->save();

        $user->assignRole('admin');
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
            'title' => 'edit admin',
            'admin' => Admin::find($id)
        );

        return view('backend.pages.backend-edit-admin')->with($data);
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
