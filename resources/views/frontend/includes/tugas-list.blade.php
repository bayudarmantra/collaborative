
<!--TUGAS LIST-->
<div class="panel panel-default">
	<div class="panel-heading add-post-heading">
		<h4 class="panel-title">Tugas Kuliah <a href="#" id="showTugas" class="pull-right"><span class="glyphicon glyphicon-refresh"></span></a></h4>
	</div>
	<div class="panel-body">
		@if(Auth::user()->role == "dosen")
			<a href="javascript:void(0);" class="custom-btn" data-toggle="modal" data-target="#tambahTugasModal"><span class="fa fa-plus-circle"></span> Tugas Baru</a>
			<hr/>
		@endif
		<div class="loader" id="tugas-loader"><i class="fa fa-circle-o-notch fa-spin"></i> Loading...</div>
		<div id="tugasList"></div>
	</div>
</div>

<!--modal Tambah tugas-->
<!-- Modal -->
<div class="modal fade" id="tambahTugasModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Tambah tugas baru</h4>
			</div>
			<div class="modal-body">
			{{ Form::open(array(
				'id' => 'form-add-tugas'
				))}}
				{{ Form::hidden('kelas', Request::segment(4), array('id' => 'tugas-kelas'))}}
				<div class="form-group">
					{{ Form::label('judulTugas', 'Judul Tugas')}}
					{{ Form::text('judulTugas', null, array(
						'class' => 'form-control',
						'placeholder' => 'Judul tugas'
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
                                    'readonly'
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
							'class' => 'form-control'
					)) }}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>



