<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	$data = array(
		'title' => 'Collaborative Learning'
	);
	return view('frontend.pages.homepages.home')->with($data);
});



Route::get('googleAuth', 'GoogleAuth@auth');
Route::get('redirect', 'GoogleAuth@redirect');

Route::get('home', function(){
	if(Auth::check()){
		if(Auth::user()->role == "mahasiswa"){
			Session::put('user', Auth::user()->username);
			Session::put('user_id', Auth::user()->id);
			Session::save();

			return Redirect::to('u/mahasiswa');
		}else if (Auth::user()->role == "admin"){
			return redirect('dashboard');
		}else if(Auth::user()->role == "dosen"){

			Session::put('user', Auth::user()->username);
			Session::put('user_id', Auth::user()->id);
			Session::save();

			return Redirect::to('u/dosen');
		}
	}else{
		return redirect('auth/login');
	}
});

//Backend Routes
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::post('testupload', 'GoogleAuth@uploadFile');
Route::get('getUploadForm', 'GoogleAuth@getUploadForm');
Route::get('notif', 'MahasiswaController@notifications');

Route::post('addPost', 'PostController@store');
Route::get('showPost/kelas/{kode}/grup/{kodeGrup}', 'PostController@getPost');
Route::get('showPostByID/{id}', 'PostController@getPostbyId');
Route::post('updatePost/{id}', 'PostController@updatePost');
Route::post('deletePost/{id}', 'PostController@deletePost');

Route::post('addKomentar/{id}', 'KomentarController@store');
Route::get('showKomentarByID/{id}', 'KomentarController@getKomentarbyId');
Route::post('updateKomentar/{id}', 'KomentarController@updateKomentar');
Route::post('deleteKomentar/{id}', 'KomentarController@deleteKomentar');

Route::post('addPhoto/{id}', 'MahasiswaController@addPhoto');

Route::post('addMemberGrup/{id}/{notif_id}', 'GrupController@addMember');
Route::post('inviteDecline/{id}', 'GrupController@declineMember');
Route::resource('add-grup', 'GrupController');

Route::pattern('folderId', '.+');
Route::get('storage/folders/{folderId}', 'GoogleAuth@getChildList');

Route::post('addtugas/{id}', 'TugasController@store');
Route::get('showTugas/{kode}', 'TugasController@show');
Route::get('showTugasById/{id}', 'TugasController@showById');
Route::post('updateTugas/{id}', 'TugasController@update');
Route::post('deleteTugas/{id}', 'TugasController@deleteTugas');
Route::post('kumpulTugas/{kelas}/{fileId}/{fileName}/{tugasId}', 'GoogleAuth@kumpulTugas');

Route::post('addPengumuman/{id}', 'PengumumanController@store');
Route::get('showPengumuman/{kode}', 'PengumumanController@show');
Route::get('showPengumumanById/{id}', 'PengumumanController@showById');
Route::post('updatePengumuman/{id}', 'PengumumanController@update');
Route::post('deletePengumuman/{id}', 'PengumumanController@deletePengumuman');


//Mahasiswa - Home - Profil
Route::get('u/mahasiswa', 'MahasiswaPageController@showHome');
Route::get('u/mahasiswa/{id}/profil', 'MahasiswaPageController@showProfile');
Route::get('u/mahasiswa/storage', 'GoogleAuth@index');
Route::get('getUser/{folder}/{kelas}/{grup}/{tugasId}', 'GoogleAuth@getUser');
Route::get('updateMahasiswa/{id}', 'MahasiswaController@updateProfil');

//Mahasiswa - Kelas
Route::get('u/mahasiswa/kelas/{kode}','MahasiswaPageController@kelasPage');
Route::get('u/mahasiswa/kelas/{kode}/member','MahasiswaPageController@kelasPage');
Route::get('u/mahasiswa/kelas/{kode}/materi','MahasiswaPageController@kelasPage');
Route::get('u/mahasiswa/kelas/{kode}/tugas','MahasiswaPageController@kelasPage');
Route::get('u/mahasiswa/kelas/{kode}/pengumuman','MahasiswaPageController@kelasPage');

//Mahasiswa - Grup
Route::get('u/mahasiswa/{kode}/grup/{kodeGrup}','MahasiswaPageController@grupPage');
Route::get('u/mahasiswa/{kode}/grup/{kodeGrup}/member','MahasiswaPageController@grupPage');
Route::get('u/mahasiswa/{kode}/grup/{kodeGrup}/dokumen','MahasiswaPageController@grupPage');
Route::get('getKelasMember/{kodeKelas}/{kodeGrup}', 'MahasiswaPageController@getKelasMember');
Route::post('inviteMember', 'MahasiswaPageController@inviteMember');
Route::get('getInviteNotif', 'MahasiswaPageController@getInviteNotif');
Route::get('grupList', 'MahasiswaPageController@showGrup');
Route::post('makeFile', 'GoogleAuth@makeFile');

//Dosen - Home - Profil
Route::get('u/dosen', 'DosenPageController@showHome');
Route::get('u/dosen/storage', 'GoogleAuth@index');
Route::get('u/dosen/{id}/profil', 'DosenPageController@showProfile');

//Dosen - Kelas
Route::get('u/dosen/kelas/{kode}','DosenPageController@kelasPage');
Route::get('u/dosen/kelas/{kode}/materi','DosenPageController@kelasPage');
Route::get('u/dosen/kelas/{kode}/tugas','DosenPageController@kelasPage');
Route::get('u/dosen/kelas/{kode}/member','DosenPageController@kelasPage');
Route::get('u/dosen/kelas/{kode}/pengumuman','DosenPageController@kelasPage');


Route::group(['middleware' => ['auth', 'acl'],
		'is' => 'mahasiswa'],
	function (){
		Route::get('u/mahasiswa', 'MahasiswaPageController@showHome');
	});

Route::group(['middleware' => ['auth', 'acl'],
		'is' => 'dosen'],
	function (){

	});

Route::group([ 'middleware' => ['auth', 'acl'],
              'is' => 'admin'],
function () {
	Route::get('dashboard', 'DashboardController@index');
    Route::resource('dashboard/admin' , 'AdminController');
    //Route::post('dashboard/mahasiswa/photo', 'MahasiswaController@addPhoto');
	Route::resource('dashboard/mahasiswa' , 'MahasiswaController');
	Route::get('delMhs/{id}' , 'MahasiswaController@changeStatus');
	Route::get('mhs/{id}', 'PerkuliahanController@getMahasiswa');
	Route::get('mhskelas/{id}', 'PerkuliahanController@getMhsKelas');
	Route::resource('dashboard/kelas' , 'PerkuliahanController');
	Route::resource('dashboard/dosen' , 'DosenController');
	Route::get('delDosen/{id}' , 'DosenController@changeStatus');
	Route::resource('dashboard/matakuliah' , 'MatakuliahController');
	Route::get('delMatakuliah/{id}' , 'MatakuliahController@changeStatus');
	Route::resource('dashboard/perkuliahan' , 'PerkuliahanController');
	Route::resource('dashboard/mhskelas', 'MhsKelasController');
});

