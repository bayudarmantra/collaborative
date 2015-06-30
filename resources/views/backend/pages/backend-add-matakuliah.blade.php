@extends('backend.layouts.backend-master')
@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default bck-panel">
			  <div class="panel-heading">
			    <h3 class="panel-title">{{ucwords($title)}}</h3>
			  </div>
			  <div class="panel-body">
			  {{ HTML::ul($errors->all(), array(
			    	'class' => 'list-unstyled alert alert-danger'
			    )) }}

				  {{ Form::open(array(
					'url' => 'dashboard/matakuliah',
					'id' => 'form-mk-add',
					'data-fv-framework' => 'bootstrap',
					'data-fv-message' => 'This value is not valid',
					'data-fv-feedbackicons-valid' => 'glyphicon glyphicon-ok',
					'data-fv-feedbackicons-invalid' => 'glyphicon glyphicon-remove',
					'data-fv-feedbackicons-validating' => 'glyphicon glyphicon-refresh',
					)) }}

		    		<div class="form-group col-md-6" style="padding-left:0">
	    				{{ Form::label('kodemk', 'Kode MK*') }}
					    {{ Form::text('kodemk', Input::old('kodemk'), array(
						    'class' => 'form-control',
						    'placeholder' => 'Kode mata kuliah',
						    'data-fv-notempty' => 'true',
						    'data-fv-notempty-message' => 'Kode mata kuliah tidak boleh kosong'
					    )) }}
				    </div>

				    <div class="form-group col-md-6" style="padding-left:0">
			    		 {{ Form::label('sks', 'Jumlah SKS*') }}
			    		 {{ Form::text('sks', Input::old('sks'), array(
						    'class' => 'form-control',
						    'placeholder' => 'Jumlah SKS',
						    'data-fv-notempty' => 'true',
						    'data-fv-notempty-message' => 'Jumlah SKS tidak boleh kosong'
					    )) }}
			    	</div>

				    <div class="form-group col-md-6" style="padding-left:0">
					    {{ Form::label('namamk', 'Nama Mata Kuliah*') }}
					   {{ Form::text('namamk', Input::old('namamk'), array(
						    'class' => 'form-control',
						    'placeholder' => 'Nama mata kuliah',
						    'data-fv-notempty' => 'true',
						    'data-fv-notempty-message' => 'Nama mata kuliah tidak boleh kosong'
					    )) }}
				    </div>

				    <div class="form-group col-md-6" style="padding-left:0">
					    {{ Form::label('prodi', 'Program Studi*') }}
						{{ Form::select('prodi', array(
						    '' => '-- Program studi --', 'S1-Sistem Komputer' => 'S1-Sistem Komputer', 'S1-Sistem Informasi' => 'S1-Sistem Informasi', 'D3-Manajemen Informatika' => 'D3-Manajemen Informatika', 'Internasional' => 'Internasional'), Input::old('prodi'), array(
						    'class' => 'form-control',
						    'data-fv-notempty' => 'true',
						    'data-fv-notempty-message' => 'Program studi tidak boleh kosong'
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