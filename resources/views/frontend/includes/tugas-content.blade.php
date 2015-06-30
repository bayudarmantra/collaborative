<?php
    setlocale(LC_ALL, 'IND');
?>

<div class="tugas-list">
@if($tugas->isEmpty())
        <div class="alert alert-warning"><span class="glyphicon glyphicon-exclamation-sign"></span> <strong>Tidak ada tugas baru</strong></div>
@else
    @foreach($tugas as $list)
    <div id="{{$list->id}}">
        <?php
        $pengumpulan = new Carbon\Carbon($list->pengumpulan);
        ?>
        @if(Auth::user()->role == "dosen")
            <div class="dropdown pull-right">
                <a data-toggle="dropdown" href="#"><small><span class="glyphicon glyphicon-chevron-down pull-right"></span></small></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                    <li><a href="#" data-toggle="modal" data-target="#editTugasModal" id="showKomentarbyId" onclick="showTugasById({{ $list->id }})">Edit...</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#confirmDeleteTugasModal" onclick="getTugasId({{ $list->id }})">Delete...</a></li>
                </ul>
            </div>
        @endif

        <h3><strong>{{ucwords($list->judul)}}</strong> <small>{{ $list->created_at->formatLocalized('%d %B %Y - %H:%M') }}</small></h3>
        <div class="well" style="margin-bottom: 5px"><strong>Batas pengumpulan : {{ $pengumpulan->formatLocalized('%d %B %Y - %H:%M') }}</strong></div>
        <article class="tugas">
            {{$list->deskripsi}}
        </article>
        @if(Auth::user()->role == "mahasiswa")
            <a href="" class="btn btn-default" style="margin-top: 10px;" data-toggle="modal" data-target="#kumpulTugasModal" onclick="loadKumpulTugas({{ $list->id }})">Kumpul</a>
        @else
            <a href="" class="btn btn-default" style="margin-top: 10px;" data-toggle="modal" data-target="#pengumpulanModal" onclick="loadPengumpulan({{ $list->id }})">Lihat Pengumumpulan</a>
        @endif
    </div>
    </div>
    <hr/>
    @endforeach
@endif
        <!--modal Edit tugas-->
    <!-- Modal -->
    <div class="modal fade" id="editTugasModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Tambah tugas baru</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(array(
                        'id' => 'form-edit-tugas'
                        ))}}
                    {{ Form::hidden('tugasId', null, array('id' => 'tugasId')) }}
                    <div class="form-group">
                        {{ Form::label('judulTugas', 'Judul Tugas')}}
                        {{ Form::text('judulTugas', null, array(
                            'class' => 'form-control',
                            'placeholder' => 'Judul tugas',
                            'id' => 'judulTugas'
                        )) }}
                    </div>

                    <div class="form-group">
                        <label for="">Batas pengumpulan</label>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="input-group date">
                                    {{ Form::text('tglKumpul', null, array(
                                        'class' => 'form-control',
                                        'placeholder' => 'Tanggal pengumpulan',
                                        'readonly',
                                        'id' => 'tglKumpul'
                                    )) }}
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group bootstrap-timepicker">
                                    {{ Form::text('waktuKumpul', null, array(
                                        'class' => 'input-small form-control',
                                        'id' => 'timepicker1',
                                    )) }}
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('deskripsi', 'Deskripsi tugas')}}
                        {{ Form::textarea('deskripsi', null, array(
                                'cols' => 30,
                                'rows' => 10,
                                'class' => 'form-control',
                                'id' => 'deskripsi'
                        )) }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="updateTugas()">Update</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>


<!-- Modal Confirm Delete Tugas -->
<div class="modal fade" id="confirmDeleteTugasModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Konfirmasi delete</h4>
            </div>
            <div class="modal-body">
                Apakah anda yakin untuk menghapus tugas ini?
            </div>
            <div class="modal-footer">
                {{ Form::hidden('tugasIdDel', null, array('id' => 'tugasIdDel')) }}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="deleteTugas()">Delete</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Kumpul Tugas -->
<div class="modal fade" id="kumpulTugasModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Kumpul tugas</h4>
            </div>
            <div class="modal-body">
                <div class="loader" id="kumpul-tugas-loader"><i class="fa fa-circle-o-notch fa-spin"></i> Loading...</div>
               <div id="tugasGDrive"></div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="kelas">
                <input type="hidden" id="kumpulTugasId">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="kumpulTugas()">Kumpul</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Pengumpulan -->
<div class="modal fade" id="pengumpulanModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Kumpul tugas</h4>
            </div>
            <div class="modal-body">
                <div class="loader" id="pengumpulan-tugas-loader"><i class="fa fa-circle-o-notch fa-spin"></i> Loading...</div>
                <div id="pengumpulan-tugas"></div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="pengumpulanTugasId">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>