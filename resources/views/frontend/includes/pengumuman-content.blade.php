<?php
setlocale(LC_ALL, 'IND');
?>

@if($pengumuman->isEmpty())
    <a href="javascript:void(0)" class="list-group-item list-group-item-warning"><span class="glyphicon glyphicon-exclamation-sign"></span> <strong>Tidak ada pengumuman baru</strong></a>
@else
     @foreach($pengumuman as $list)
        <?php
        $pengumpulan = new Carbon\Carbon($list->waktuaktif);
        ?>
        <div class="pengumuman-list">
            @if(Auth::user()->role == "dosen")
                <div class="dropdown pull-right">
                    <a data-toggle="dropdown" href="#"><small><span class="glyphicon glyphicon-chevron-down pull-right"></span></small></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li><a href="#" data-toggle="modal" data-target="#editPengumumanModal" id="showKomentarbyId" onclick="showPengumumanById({{ $list->id }})">Edit...</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#confirmDeletePengumumanModal" onclick="getPengumumanId({{ $list->id }})">Delete...</a></li>
                    </ul>
                </div>
            @endif

            <h3><strong>{{ucwords($list->judul)}}</strong> <small>{{ $list->created_at->formatLocalized('%d %B %Y - %H:%M') }}</small></h3>
            <article class="pengumuman">
                <div class="well">
                    {{$list->isi}}
                </div>
            </article>
        </div>
        <hr/>
        @endforeach

@endif

    <!--modal Edit Pengumuman-->
    <!-- Modal -->
    <div class="modal fade" id="editPengumumanModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Edit pengumuman</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(array(
                        'id' => 'form-edit-pengumuman'
                        ))}}
                    {{ Form::hidden('kodekelas', Request::segment(4), array('id' => 'kelas'))}}
                    {{ Form::hidden('pengumumanId', null, array('id' => 'pengumumanId')) }}
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
                                            'id' => 'waktuaktif',
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
                    <a href="javacript:void(0)" onclick="updatePengumuman()" class="custom-btn">Update</a>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <!-- Modal Confirm Delete Tugas -->
    <div class="modal fade" id="confirmDeletePengumumanModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Konfirmasi delete</h4>
                </div>
                <div class="modal-body">
                    Apakah anda yakin untuk menghapus pengumuman ini?
                </div>
                <div class="modal-footer">
                    {{ Form::hidden('pengumumanIdDel', null, array('id' => 'pengumumanIdDel')) }}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="custom-btn" onclick="deletePengumuman()">Delete</button>
                </div>
            </div>
        </div>
    </div>
