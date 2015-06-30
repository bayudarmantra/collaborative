@extends('backend.layouts.backend-master')
@section('content')
		<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default bck-panel">
			  <div class="panel-heading">
			    <h3 class="panel-title">Tambah {{ucwords($title)}}</h3>
			  </div>
			  <div class="panel-body">
			  {{ HTML::ul($errors->all(), array(
			    	'class' => 'list-unstyled alert alert-danger'
			    )) }}

			  	{{ Form::open(array(
			  		'url' => 'dashboard/admin',
			  		'class' => 'form-validator',
			  		'id' => 'form-mk',
			  		'data-fv-framework' => 'bootstrap',
			  		'data-fv-message' => 'This value is not valid',
			  		'data-fv-feedbackicons-valid' => 'glyphicon glyphicon-ok',
			  		'data-fv-feedbackicons-invalid' => 'glyphicon glyphicon-remove',
			  		'data-fv-feedbackicons-validating' => 'glyphicon glyphicon-refresh'
			  		)) }}
		    		<div class="form-group col-md-6" style="padding-left:0">
	    				{{ Form::label('nama', 'Nama Administrator*') }}
					    {{ Form::text('nama', Input::old('nama'), array(
						    'class' => 'form-control',
						    'placeholder' => 'Nama administrator',
						    'data-fv-notempty' => 'true',
						    'data-fv-notempty-message' => 'Nama administrator tidak boleh kosong'
					    )) }}
				    </div>

				    <div class="form-group col-md-6" style="padding-left:0">
			    		 {{ Form::label('username', 'Username*') }}
			    		 {{ Form::text('username', Input::old('username'), array(
						    'class' => 'form-control',
						    'placeholder' => 'Username',
						    'data-fv-notempty' => 'true',
						    'data-fv-notempty-message' => 'Username tidak boleh kosong'
					    )) }}
			    	</div>

			    	    <div class="form-group" style="padding-left:0">
					    {{ Form::label('alamat', 'Alamat administrator*') }}
					   {{ Form::text('alamat', Input::old('alamat'), array(
						    'class' => 'form-control',
						    'placeholder' => 'Alamat administrator',
						    'data-fv-notempty' => 'true',
						    'data-fv-notempty-message' => 'Alamat tidak boleh kosong'
					    )) }}
				    </div>

				    <div class="form-group col-md-6" style="padding-left:0">
					    {{ Form::label('password', 'Password administrator*') }}
					   {{ Form::password('password', array(
						    'class' => 'form-control',
						    'placeholder' => 'Password administrator',
						    'data-fv-notempty' => 'true',
						    'data-fv-notempty-message' => 'Password tidak boleh kosong',
					    )) }}
				    </div>

				    <div class="form-group col-md-6" style="padding-left:0">
					    {{ Form::label('konfirmasi', 'Konfirmasi password*') }}
						{{ Form::password('konfirmasi', array(
						    'class' => 'form-control',
						    'placeholder' => 'Konfirmasi password',
						    'data-fv-notempty' => 'true',
						    'data-fv-notempty-message' => 'Password tidak sesuai'
						 )) }}
					</div>
			  </div>
			  <div class="panel-footer">
			  		<input type="submit" class="cs-btn blue animate" value="Submit">
			  </div>
			   {{ Form::close() }}
			</div>
		</div>
	</div>
@stop