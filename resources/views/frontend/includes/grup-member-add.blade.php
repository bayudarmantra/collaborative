@foreach($mahasiswa as $value)
<div class="media">
    <a class="pull-left" href="#">
        @if($value->mhs->foto != '')
            {{Form::image('assets/upload/'.$value->mhs->foto,'photo', array('class' => 'media-object', 'height' => '50', 'width' => '50'))}}
        @else
            {{Form::image('assets/images/user.png','photo', array('class' => 'media-object', 'height' => '50', 'width' => '50'))}}
        @endif
    </a>
    <div class="media-body center-block">
        <h4 class="media-heading"><small>{{$value->mhs->nama}}</small></h4>
        <div class="btn-group">
            {{Form::open(array('id' => 'form-invite-member'))}}
                {{Form::hidden('member',$value->mhs->nim)}}
                {{Form::hidden('id_grup',$kodeGrup)}}
                {{Form::hidden('kode_kelas',$kodeKelas)}}
            {{Form::close()}}
            <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-nim="{{$value->mhs->nim}}" onclick="inviteToGrup(this)"><span class="glyphicon glyphicon-envelope"></span> Undang</a>
            <span id="undang" class="btn btn-sm btn-success hide"><span class="glyphicon glyphicon-ok"></span> Diundang</span>
        </div>
    </div>
</div>
@endforeach