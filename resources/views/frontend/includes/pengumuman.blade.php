<div class="panel panel-default">
    <div class="panel-heading add-post-heading">
        <h4 class="panel-title">PENGUMUMAN <a href="#" id="showPengumuman" onclick="showPengumuman()" class="pull-right"><span class="glyphicon glyphicon-refresh"></span></a></h4>
    </div>
    <div class="panel-body">
        @if(Auth::user()->role == "dosen")
            <a href="" class="custom-btn" data-toggle="modal" data-target="#tambahPengumumanModal"><span class="fa fa-plus-circle"></span> Pengumuman Baru</a>
            <hr/>
        @endif
        <div class="loader" id="pengumuman-loader"><i class="fa fa-circle-o-notch fa-spin"></i> Loading...</div>
        <div id="pengumumanList"></div>
    </div>
</div>

<!--modal Tambah Pengumuman-->
<!-- Modal -->
<div class="modal fade" id="tambahPengumumanModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Tambah pengumuman baru</h4>
            </div>
            <div class="modal-body">
                {{ Form::open(array(
                    'id' => 'form-add-pengumuman'
                    ))}}
                {{ Form::hidden('kodekelas', Request::segment(4), array('id' => 'kelasPengumuman'))}}

                <div class="row">
                    <div class="form-group col-md-6">
                        {{ Form::label('judulPengumuman', 'Judul Pengumuman')}}
                        {{ Form::text('judulPengumuman', null, array(
                            'class' => 'form-control',
                            'placeholder' => 'Judul pengumuman'
                        )) }}
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">Aktif sampai</label>
                        <div class="row">
                            <div class="form-group">
                                <div class="input-group date">
                                    {{ Form::text('waktuaktif', null, array(
                                        'class' => 'form-control',
                                        'placeholder' => 'Aktif sampai',
                                        'readonly'
                                    )) }}
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('isiPengumuman', 'Deskripsi pengumuman')}}
                    {{ Form::textarea('isiPengumuman', null, array(
                            'cols' => 30,
                            'rows' => 10,
                            'class' => 'form-control'
                    )) }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="javacript:void(0)" onclick="addPengumuman()" class="custom-btn">Submit</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>



