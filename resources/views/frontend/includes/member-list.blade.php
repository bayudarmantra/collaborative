<!--MEMBER LIST-->
<div class="panel panel-default">
    <div class="panel-heading add-post-heading">
        @if(Request::segment(3) == 'kelas')
            <h4 class="panel-title">Mahasiswa Perkuliahan</h4>
        @else
            <h4 class="panel-title">Anggota Grup</h4>
        @endif
    </div>
    <div class="panel-body">
        @if(Request::segment(4) == 'grup')
            <div class="container-fluid" style="margin-bottom: 15px;">
                {{Form::hidden('kodekelas',Request::segment(3),array('id' => 'add-member-kode'))}}
                {{Form::hidden('id_grup',Request::segment(5),array('id' => 'grup-kode'))}}
                @if($infoGrup->nim == Session::get('user'))
                    <a href="#" class="custom-btn" data-toggle="modal" data-target="#addMemberModal" id="add-member"><span class="glyphicon glyphicon-envelope"></span> Undang teman</a>
                    <hr/>
                @endif
            </div>
        @endif

        <div class="member-list row">
            <?php
                if(Request::segment(3) == 'kelas')
                {
                    $row = $kelasMember;
                }else{
                    $row = $grupMember;
                }
            ?>
            @foreach($row as $value)
            <div class="col-md-6" style="margin-bottom: 15px;">
                <div class="media">
                    <a class="pull-left" href="{{URL::to('u/mahasiswa/'.$value->nim.'/profil')}}">
                        @if($value->mhs->foto != '')
                            {{Form::image('assets/upload/'.$value->mhs->foto,'photo', array('class' => 'media-object', 'height' => '100', 'width' => '100'))}}
                        @else
                            {{Form::image('assets/images/user.png','photo', array('class' => 'media-object', 'height' => '100', 'width' => '100'))}}
                        @endif
                    </a>
                    <div class="media-body">
                        <a href="{{URL::to('u/mahasiswa/'.$value->nim.'/profil')}}"><h4 class="media-heading">{{$value->mhs->nama}}</h4></a>
                        <small>{{$value->nim}}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Modal Add Member -->
<div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Invite member to your group</h4>
            </div>
            <div class="modal-body">

                <div id="grupMemberAdd"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
