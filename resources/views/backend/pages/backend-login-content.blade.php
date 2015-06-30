@extends('backend.layouts.backend-login')

@section('content')
	<div class="login-wrapper">
		<div class="login-title"><h3>Login</h3></div>
		<div class="login-form">
			<div class="panel panel-default">
			  <div class="panel-body">
			    {{ Form::open(array(
			    	'url' => 'dashboard/login',
			    	'class' => 'form-validator',
			  		'data-fv-framework' => 'bootstrap',
			  		'data-fv-message' => 'This value is not valid',
			  		'data-fv-feedbackicons-valid' => 'glyphicon glyphicon-ok',
			  		'data-fv-feedbackicons-invalid' => 'glyphicon glyphicon-remove',
			  		'data-fv-feedbackicons-validating' => 'glyphicon glyphicon-refresh'
			    )) }}

			    <div class="form-group">
			    	{{ Form::label('username', 'USERNAME') }}
			    	<div class="input-group">
					  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
					  {{ Form::text('username', Input::old('username'), array(
					    'class' => 'form-control',
					    'placeholder' => 'Enter username',
					    'data-fv-notempty' => 'true',
					    'data-fv-notempty-message' => 'Required'
				      )) }}
					</div>
			    </div>

			     <div class="form-group">
			    	{{ Form::label('password', 'Password') }}
			    	<div class="input-group">
					  <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
					  {{ Form::password('password', array(
					    'class' => 'form-control',
					    'placeholder' => 'Enter password',
					    'data-fv-notempty' => 'true',
					    'data-fv-notempty-message' => 'Required'
				      )) }}
					</div>
			    </div>

			    <button type="submit" class="cs-btn blue animate">LOGIN</button>
			    {{ Form::close() }}
			  </div>
			</div>
		</div>
	</div>
@stop