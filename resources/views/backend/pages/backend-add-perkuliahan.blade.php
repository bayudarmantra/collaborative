@extends('backend.layouts.backend-master')
@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default bck-panel">
			  <div class="panel-heading">
			    <h3 class="panel-title"><span class="fa fa-plus-circle"></span> {{ ucwords($title) }}</h3>
			  </div>
			  <div class="panel-body">
			    {{ HTML::ul($errors->all(), array(
			    	'class' => 'list-unstyled alert alert-danger'
			    )) }}

			  	{{ Form::open(array(
			  		'url' => 'dashboard/perkuliahan',
			  		'class' => 'form-validator',
			  		'id' => 'form-perkuliahan',
			  		'data-fv-framework' => 'bootstrap',
			  		'data-fv-message' => 'This value is not valid',
			  		'data-fv-feedbackicons-valid' => 'glyphicon glyphicon-ok',
			  		'data-fv-feedbackicons-invalid' => 'glyphicon glyphicon-remove',
			  		'data-fv-feedbackicons-validating' => 'glyphicon glyphicon-refresh'
			  		)) }}
	    			<div class="row">
			    		<div class="form-group col-md-6" style="padding-left:0">
						    {{ Form::label('kodekelas', 'Kode kelas*') }}
						    {{ Form::text('kodekelas', Input::old('kodekelas'), array(
							    'class' => 'form-control',
							    'placeholder' => 'Kode kelas',
							    'data-fv-notempty' => 'true',
							    'data-fv-notempty-message' => 'Kode kelas tidak boleh kosong'
						    )) }}
					    </div>

					    <div class="form-group col-md-6" style="padding-left:0">
						    {{ Form::label('Mata kuliah', 'Mata kuliah*') }}
						    {{ Form::select('kodemk', $matakuliah, Input::old('kodemk'), array(
							    'class' => 'form-control',
							    'data-fv-notempty' => 'true',
							    'data-fv-notempty-message' => 'Mata kuliah tidak boleh kosong'
							)) }}
					    </div>
				    </div>

				    <div class="form-group col-md-6" style="padding-left:0">
					    {{ Form::label('hari', 'Hari Perkuliahan*') }}
					    {{ Form::select('hari', array(
					    '' => '-- Hari --',
					    'senin' => 'Senin', 
					    'selasa' => 'Selasa',
					    'rabu' => 'Rabu',
					    'kamis' => 'Kamis',
					    'jumat' => 'Jumat',
					    'sabtu' => 'Sabtu',
					    'minggu' => 'Minggu'), Input::old('hari'), array(
					    'class' => 'form-control',
					    'data-fv-notempty' => 'true',
					    'data-fv-notempty-message' => 'Hari perkuliahan tidak boleh kosong'
					    )) }}
				    </div>

				    <div class="form-group col-md-6" style="padding-left:0">
					    {{ Form::label('jam', 'Jam Perkuliahan*') }}
					    {{ Form::text('jam', Input::old('jam'), array(
						    'class' => 'form-control',
						    'placeholder' => 'Jam perkuliahan',
						    'data-fv-notempty' => 'true',
						    'data-fv-notempty-message' => 'Jam perkuliahan tidak boleh kosong',
						    'data-mask' => '99.99 - 99.99'
					    )) }}
					</div>

					<div class="form-group col-md-12" style="padding-left:0">
					    {{ Form::label('nip', 'Dosen Pengajar*') }}
					    {{ Form::select('nip', $dosen, Input::old('nip'), array(
					    'class' => 'form-control',
					    'data-fv-notempty' => 'true',
					    'data-fv-notempty-message' => 'Dosen pengajar tidak boleh kosong'
					    )) }}
				    </div>
			    	<small class="text-danger">* : Harus diisi</small>
			  <div class="panel-footer">
			  		<input type="submit" class="cs-btn blue animate" value="Submit">
			  </div>
			   {{ Form::close() }}
			  </div>
			</div>
		</div>
	</div>
@stop