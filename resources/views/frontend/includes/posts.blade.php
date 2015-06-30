
@if($segmentGrup == "false" && $segmentKelas == "false")
    <?php $row = $post ?>
@elseif($segmentGrup == "true" && $segmentKelas == "false")
    <?php $row = $postGrup ?>
@elseif($segmentGrup == "false" && $segmentKelas == "true")
    <?php $row = $postKelas ?>
@endif


@if($row->isEmpty())
    <div class="alert alert-danger"><span class="glyphicon glyphicon-exclamation-sign"></span> <strong>TIDAK ADA POST</strong></div>
@else
    @foreach($row as $posts)
        <?php
            if($posts->mhs == null)
            {
                $post = $posts->dosen;
                $userPost = $posts->dosen->nip;
            }else{
                $post = $posts->mhs;
                $userPost = $posts->mhs->nim;
            }
        ?>

        <div class="post-wrapper" style="background-color: #FFF">
            <div class="media post">
                <a class="pull-left" href="#">
                    @if($post->foto != '')
                        {{HTML::image('assets/upload/'.$post->foto,'photo', array('class' => 'media-object', 'height' => '60', 'width' => '60'))}}
                    @else
                        {{HTML::image('assets/images/user.png','photo', array('class' => 'media-object', 'height' => '60', 'width' => '60'))}}
                    @endif
                </a>
                @if(Session::get('user') == $userPost)
                    <div class="dropdown pull-right">
                        <a data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-chevron-down pull-right"></span></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <li><a href="#" data-toggle="modal" data-target="#editPostModal" id="showPostbyId" onclick="showPostById({{ $posts->id }})">Edit...</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#confirmDeletePostModal" onclick="getPostId({{ $posts->id }})">Delete...</a></li>
                        </ul>
                    </div>
                @endif

                <div class="media-body content-media">
                    <h4 class="media-heading"><a href="#">{{$post->nama}}</a>
                        @if(Request::segment(5) > 0)
                            <span class="fa fa-angle-right" style="font-size: 12px; font-weight: bold;"></span> Grup <a href="#">{{$posts->grup->nama}}</a>
                        @elseif(Request::segment(5) == 0)
                            <span class="fa fa-angle-right" style="font-size: 12px; font-weight: bold;"></span> Kelas <a href="#">{{$posts->perkuliahan->kodekelas}}</a>
                        @elseif(Request::segment(5) < 0)
                            @if($posts->scope == 'grup')
                                <span class="fa fa-angle-right" style="font-size: 12px; font-weight: bold;"></span> Grup <a href="#">{{$posts->grup->nama}}</a>
                            @else
                                <span class="fa fa-angle-right" style="font-size: 12px; font-weight: bold;"></span> Kelas <a href="#">{{$posts->perkuliahan->kodekelas}}</a>
                            @endif
                        @endif
                    </h4>
                    <div class="post-time"><a href="#">{{ $posts->created_at->diffForHumans()  }}</a></div>
                    <p>{{preg_replace('%\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))%s','<a href="$1">$1</a>',$posts->isi);}}</p>
                </div>
            </div><!-- media -->

            @foreach($posts->komentar as $komentar)
                @if($komentar->dosen == null)
                    <?php
                        $user = $komentar->mhs;
                        $userKomentar = $komentar->mhs->nim;
                    ?>
                @else
                    <?php
                        $user = $komentar->dosen;
                        $userKomentar = $komentar->dosen->nip;
                    ?>
                @endif
                <div class="media post-comment">
                    <a class="pull-left" href="#">
                        @if($user->foto != '')
                            {{HTML::image('assets/upload/'.$user->foto,'photo', array('class' => 'media-object', 'height' => '40', 'width' => '40'))}}
                        @else
                            {{HTML::image('assets/images/user.png','photo', array('class' => 'media-object', 'height' => '40', 'width' => '40'))}}
                        @endif
                    </a>

                    @if(Session::get('user') == $userKomentar)
                        <div class="dropdown pull-right">
                            <a data-toggle="dropdown" href="#"><small><span class="glyphicon glyphicon-chevron-down pull-right"></span></small></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                <li><a href="#" data-toggle="modal" data-target="#editKomentarModal" id="showKomentarbyId" onclick="showKomentarById({{ $komentar->id }})">Edit...</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#confirmDeleteKomentarModal" onclick="getKomentarId({{ $komentar->id }})">Delete...</a></li>
                            </ul>
                        </div>
                    @endif

                    <div class="media-body">
                        <h4 class="media-heading"><small><a href="#">{{$user->nama}}</a></small></h4>
                        <div class="post-time"><a href="#">{{ $komentar->created_at->diffForHumans() }}</a></div>
                        <small><p>{{$komentar->isi}}</p></small>
                    </div>
                </div>
            @endforeach

            <div class="add-post-comment">
                {{ Form::open(array(
                    'id' => 'form-add-komentar',
                    'class' => 'form-inline form-add-komen',
                    'data-id' => $posts->id
                )) }}

                {{Form::hidden('postId',$posts->id)}}
                {{Form::hidden('creatorSts', Auth::user()->role )}}
                {{Form::hidden('creator', Session::get('user')) }}

                <div class="row">
                    <div class="col-md-1">
                        @if($foto->foto != '')
                            {{HTML::image('assets/upload/'.$foto->foto,'photo', array('height' => '40', 'width' => '40'))}}
                        @else
                            {{HTML::image('assets/images/user.png','photo', array('height' => '40', 'width' => '40'))}}
                        @endif
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <textarea class="form-control textarea animate-autosize" name="komentar" style="resize: vertical;" placeholder="Buat komentar anda disini..."></textarea>
                        </div>
                    </div>
                    <div class="col-md-1"><input type="button" onclick="addKomentar({{$posts->id}})" class="custom-btn" id="btnPostKomentar" value="Post" style="position:relative;top:1px;padding:9px 15px; left:-25px"></div>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    @endforeach
@endif

<!-- Modal Edit Post -->
<div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit post</h4>
            </div>
            <div class="modal-body">
                {{Form::open(array('id' => 'form-edit-post'))}}
                    {{ Form::textarea('editPost',null, array('class' => 'form-control', 'id' => 'editPost')) }}
                    {{ Form::hidden('postId', null, array('id' => 'postId')) }}
                {{Form::close()}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updatePost()">Update</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Confirm Delete Post -->
<div class="modal fade" id="confirmDeletePostModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Konfirmasi delete</h4>
            </div>
            <div class="modal-body">
                Apakah anda yakin untuk menghapus post ini?
            </div>
            <div class="modal-footer">
                {{ Form::hidden('postIdDel', null, array('id' => 'postIdDel')) }}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="deletePost()">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Komentar -->
<div class="modal fade" id="editKomentarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit komentar</h4>
            </div>
            <div class="modal-body">
                {{Form::open(array('id' => 'form-edit-komentar'))}}
                {{ Form::textarea('editKomentar',null, array('class' => 'form-control', 'id' => 'editKomentar')) }}
                {{ Form::hidden('komentarId', null, array('id' => 'komentarId')) }}
                {{Form::close()}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateKomentar()">Update</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Confirm Delete Komentar -->
<div class="modal fade" id="confirmDeleteKomentarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Konfirmasi delete</h4>
            </div>
            <div class="modal-body">
                Apakah anda yakin untuk menghapus komentar ini?
            </div>
            <div class="modal-footer">
                {{ Form::hidden('komentarIdDel', null, array('id' => 'komentarIdDel')) }}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="deleteKomentar()">Delete</button>
            </div>
        </div>
    </div>
</div>