@foreach($notifikasi as $value)
<div class="row" style="margin-bottom: 10px">
    <div class="pull-left col-md-8">
        @if($value->mhs->foto != '')
            {{HTML::image('assets/upload/'.$value->mhs->foto,'photo', array('height' => '50', 'width' => '50'))}}
        @else
            {{HTML::image('assets/images/user.png','photo', array('height' => '50', 'width' => '50'))}}
        @endif
        <?php
            $str = wordwrap($value->mhs->nama, 15);
            $str = explode("\n", $str);
            $str = $str[0] . '...';
         ?>
        <small>{{ $str }}</small>
    </div>

    <div class="col-md-4">
        <div class="btn-group btn-group-sm" style="margin-top: 10px;">
            {{Form::open(array('id' => 'form-add-grup-member'))}}
                {{Form::hidden('id_grup',$value->id_grup)}}
                {{Form::hidden('kodekelas',$value->kodekelas)}}
            {{Form::close()}}
            <button type="button" class="btn btn-default" title="Accept invite" onclick="inviteAccept('{{$value->recepient}}', '{{$value->id}}')"><span class="glyphicon glyphicon-ok"></span></button>
            <button type="button" class="btn btn-default" title="Decline invite" onclick="inviteDecline({{$value->id}})"><span class="glyphicon glyphicon-remove"></span></button>
        </div>
    </div>
</div>
@endforeach