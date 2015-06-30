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

			  	{{ Form::model($admin,array(
			  		'route' => array('dashboard.admin.update',$admin->id),
			  		'method' => 'PUT',
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
					    {{ Form::text('nama', null, array(
						    'class' => 'form-control',
						    'placeholder' => 'Nama administrator',
						    'data-fv-notempty' => 'true',
						    'data-fv-notempty-message' => 'Required'
					    )) }}
				    </div>

				    <div class="form-group col-md-6" style="padding-left:0">
			    		 {{ Form::label('username', 'Username*') }}
			    		 {{ Form::text('username', null, array(
						    'class' => 'form-control',
						    'placeholder' => 'Username',
						    'data-fv-notempty' => 'true',
						    'data-fv-notempty-message' => 'Required'
					    )) }}
			    	</div>

			    	    <div class="form-group" style="padding-left:0">
					    {{ Form::label('alamat', 'Alamat administrator*') }}
					   {{ Form::text('alamat', null, array(
						    'class' => 'form-control',
						    'placeholder' => 'Alamat administrator',
						    'data-fv-notempty' => 'true',
						    'data-fv-notempty-message' => 'Required'
					    )) }}
				    </div>

				    <div class="form-group col-md-6" style="padding-left:0">
					    {{ Form::label('password', 'Password administrator*') }}
					   {{ Form::text('password', null, array(
						    'class' => 'form-control',
						    'placeholder' => 'Password administrator',
						    'data-fv-notempty' => 'true',
						    'data-fv-notempty-message' => 'Required',
					    )) }}
				    </div>

				    <div class="form-group col-md-6" style="padding-left:0">
					    {{ Form::label('konfirmasi', 'Konfirmasi password*') }}
						{{ Form::text('konfirmasi', null, array(
						    'class' => 'form-control',
						    'placeholder' => 'konfirmasi',
						    'data-fv-notempty' => 'true',
						    'data-fv-notempty-message' => 'Required'
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