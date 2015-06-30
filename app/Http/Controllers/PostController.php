<?php namespace App\Http\Controllers;

use App\AnggotaGrup;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Mhskelas;
use App\Perkuliahan;
use App\Post;
use App\Komentar;
use App\Mahasiswa;
use App\Dosen;
use Illuminate\Http\Response;
use Request;
use Session;
use Auth;

class PostController extends Controller
{

    public function store()
    {
        $post = new Post;
        $post->isi = Request::input('post');
        $post->scope = Request::input('scope');
        $post->id_scope = Request::input('scope_id');
        $post->creator = Session::get('user');
        $post->creator_sts = Request::input('creator-sts');
        $post->status = 1;
        $post->save();
    }

    public function getPost($kode, $kodeGrup)
    {
        if($kodeGrup == 0)
        {
            $segmentKelas = "true";
            $segmentGrup = "false";
        }elseif($kodeGrup > 0){
            $segmentKelas = "false";
            $segmentGrup = "true";
        }else{
        $segmentKelas = "false";
        $segmentGrup = "false";
        }

        $id = Session::get('user');

        if(Auth::user()->role == "mahasiswa")
        {
            $foto = Mahasiswa::where('nim' , '=', $id)->first();

            //Mendapatkan Array Kelas
            $kelasTmp = Mhskelas::select('kodekelas')->where('nim', '=', $id)->get();
            for($i = 0; $i < count($kelasTmp); $i++)
            {
                $kelas[$i] = $kelasTmp[$i]['kodekelas'];
            }

            //Mendapatkan Array Grup
            $grupTmp = AnggotaGrup::select('id_grup')->where('nim', '=', $id)->get();
            for($i = 0; $i < count($grupTmp); $i++)
            {
                $grup[$i] = $grupTmp[$i]['id_grup'];
            }

            $scope = array_merge($kelas, $grup);
        }else
        {
            $foto = Dosen::where('nip' , '=', $id)->first();

            $kelasTmp = Perkuliahan::select('kodekelas')->where('nip', '=', $id)->get();
            for($i = 0; $i < count($kelasTmp); $i++)
            {
                $scope[$i] = $kelasTmp[$i]['kodekelas'];
            }

        }

        $data = array
        (
            'post' => Post::with(array('komentar','mhs','dosen','perkuliahan'))->whereIn('id_scope' , $scope)->orderBy('id','desc')->take(10)->get(),
            'postKelas' => Post::with(array('komentar', 'mhs', 'dosen', 'perkuliahan', 'grup'))->where('id_scope', '=', $kode)->where('scope', '=', 'kelas')->orderBy('id','desc')->get(),
            'postGrup' => Post::with(array('komentar', 'mhs', 'grup', 'perkuliahan'))->where('id_scope', '=', $kodeGrup)->where('scope', '=', 'grup')->orderBy('id','desc')->get(),
            'foto' => $foto,
            'segmentKelas' => $segmentKelas,
            'segmentGrup' => $segmentGrup
        );



        return view('frontend.includes.posts')->with($data);
    }

    public function getPostbyId($id)
    {
        $postById = Post::with(array('komentar','mhs','perkuliahan'))->where('id', '=' , $id)->first();
        return json_encode($postById);
    }

    public function updatePost($id)
    {
        $post = Post::find($id);
        $post->isi = Request::input('editPost');
        $post->save();
    }

    public function deletePost($id)
    {
        $komentar = Komentar::where('post_id', '=', $id)->delete();
        $post = Post::find($id);
        $post->delete();
    }
}
