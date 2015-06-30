<?php
if(Auth::user()->role == "mahasiswa")
{
    $url = 'u/mahasiswa';
}else{
    $url = 'u/dosen';
}
?>

@if(Request::segment(3) == 'kelas')
    <div class="container-fluid" style="margin-bottom: 30px;">
        <div class="btn-group btn-group-justified top-menu">
            <a href="{{URL::to($url.'/'.'kelas'.'/'.$infokelas->kodekelas)}}" class="btn btn-default">POST</a>
            <a href="{{URL::to($url.'/'.'kelas'.'/'.$infokelas->kodekelas.'/'.'member')}}" class="btn btn-default">MEMBER</a>
            <a href="{{URL::to($url.'/'.'kelas'.'/'.$infokelas->kodekelas.'/'.'materi')}}" class="btn btn-default">MATERI</a>
            <a href="{{URL::to($url.'/'.'kelas'.'/'.$infokelas->kodekelas.'/'.'tugas')}}" class="btn btn-default">TUGAS</a>
            <a href="{{URL::to($url.'/'.'kelas'.'/'.$infokelas->kodekelas.'/'.'pengumuman')}}" class="btn btn-default">PENGUMUMAN</a>
        </div>
    </div>
@elseif(Request::segment(4) == 'grup')
    <div class="container-fluid" style="margin-bottom: 30px;">
        <div class="btn-group btn-group-justified top-menu">
            <a href="{{URL::to($url.'/'.$infokelas->kodekelas.'/'.'grup'.'/'.$infoGrup->id)}}" class="btn btn-default">POST</a>
            <a href="{{URL::to($url.'/'.$infokelas->kodekelas.'/'.'grup'.'/'.$infoGrup->id.'/'.'member')}}" class="btn btn-default">MEMBER</a>
            <a href="{{URL::to($url.'/'.$infokelas->kodekelas.'/'.'grup'.'/'.$infoGrup->id.'/'.'dokumen')}}" class="btn btn-default">DOKUMEN</a>
        </div>
    </div>
@endif