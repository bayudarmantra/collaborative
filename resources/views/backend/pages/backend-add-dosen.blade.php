@extends('backend.layouts.backend-master')
@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default bck-panel">
			  <div class="panel-heading">
			    <h3 class="panel-title"><span class="fa fa-plus-circle"></span> {{ ucwords($title) }}</h3>
			  </div>
			  <div class="panel-body">
			    {{ HTML::ul($errors->all(), array(
			    	'class' => 'list-unstyled alert alert-danger'
			    )) }}

			  	{{ Form::open(array(
			  		'url' => 'dashboard/dosen',
			  		'class' => 'form-validato',
			  		'id' => 'form-dosen',
			  		'data-fv-framework' => 'bootstrap',
			  		'data-fv-message' => 'This value is not valid',
			  		'data-fv-feedbackicons-valid' => 'glyphicon glyphicon-ok',
			  		'data-fv-feedbackicons-invalid' => 'glyphicon glyphicon-remove',
			  		'data-fv-feedbackicons-validating' => 'glyphicon glyphicon-refresh'
			  		)) }}
			    	<fieldset>
			    		<legend>Data Personal</legend>
			    			<div class="row">
					    		<div class="form-group col-md-6" style="padding-left:0">
								    {{ Form::label('nama', 'Nama Lengkap*') }}
								    {{ Form::text('nama', Input::old('nama'), array(
									    'class' => 'form-control',
									    'placeholder' => 'Nama lengkap dosen',
									    'data-fv-notempty' => 'true',
									    'data-fv-notempty-message' => 'Nama dosen tidak boleh kosong'
								    )) }}
							    </div>

							    <div class="form-group col-md-6" style="padding-left:0">
								    {{ Form::label('kelamin', 'Jenis Kelamin*') }}
								    {{ Form::select('kelamin', array(
								    '' => '-- Jenis kelamin --', '1' => 'Laki-laki', '0' => 'Perempuan'), Input::old('kelamin'), array(
								    'class' => 'form-control',
								    'data-fv-notempty' => 'true',
								    'data-fv-notempty-message' => 'Jenis kelamin tidak boleh kosong'
								    )) }}
							    </div>
						    </div>

						    <div class="form-group col-md-12" style="padding-left:0">
							    {{ Form::label('alamat', 'Alamat*') }}
							    {{ Form::text('alamat', Input::old('alamat'), array(
								    'class' => 'form-control',
								    'placeholder' => 'Alamat dosen',
								    'data-fv-notempty' => 'true',
								    'data-fv-notempty-message' => 'Alamat tidak boleh kosong'
							    )) }}
						    </div>

						    <div class="row">
						    	<div class="form-group col-md-6" style="padding-left:0">
						    		{{ Form::label('tmplahir', 'Tempat Lahir*') }}
								    {{ Form::text('tmplahir', Input::old('tmplahir'), array(
									    'class' => 'form-control',
									    'placeholder' => 'Tempat lahir',
									    'data-fv-notempty' => 'true',
									    'data-fv-notempty-message' => 'Tempat lahir tidak boleh kosong'
								    )) }}
						    	</div>

						    	<div class="form-group col-md-6" style="padding-left:0">
							    	{{ Form::label('tgllahir', 'Tanggal Lahir*') }}
							    	<div class="input-group date">
							  		{{ Form::text('tgllahir', Input::old('tgllahir'), array(
									    'class' => 'form-control',
									    'placeholder' => 'Tanggal lahir',
									    'data-fv-notempty' => 'false',
									    'data-fv-notempty-message' => 'Tanggal lahir tidak boleh kosong',
							    	)) }}
								  		<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
									</div>
						    	</div>	
					    	</div>

					    	<div class="row">
						    	<div class="form-group col-md-6" style="padding-left:0">
						    		{{ Form::label('nohp', 'No HP*') }} <span class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="top" 
						    		title="Prefix valid: +62 / 08x"></span>
						    		{{ Form::text('nohp', Input::old('nohp'), array(
									    'class' => 'form-control',
									    'placeholder' => 'Nomor handphone',
									    'data-fv-notempty' => 'true',
									    'data-fv-notempty-message' => 'No HP tidak boleh kosong',
									    'data-fv-regexp' => 'true',
									    'data-fv-regexp-regexp'=> '^((?:\+62|62)|0)[2-9]{1}[0-9]+$',
									    'data-fv-regexp-message'=> 'No HP tidak valid'
							    	)) }}
						    	</div>

						    	<div class="form-group col-md-6" style="padding-left:0">
						    		{{ Form::label('notlp', 'No Tlp*') }} <span class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="top" 
						    		title="Max 10 digit"></span>
						    		{{ Form::text('notlp', Input::old('notlp'), array(
									    'class' => 'form-control',
									    'placeholder' => 'Nomor telepon',
									    'data-fv-regexp' => 'true',
									    'data-fv-regexp-regexp'=> '^\b\d{3}[-.]?\d{3}[-.]?\d{4}\b$',
									    'data-fv-regexp-message'=> 'No Tlp tidak valid'
							    	)) }}
						    	</div>	
					    	</div>

					    	<div class="row">
						    	<div class="form-group col-md-6" style="padding-left:0">
								    {{ Form::label('email', 'Email*') }}
								    {{ Form::email('email', Input::old('email'), array(
									    'class' => 'form-control',
									    'placeholder' => 'Email dosen',
									    'data-fv-emailaddress' => 'true',
							    		'data-fv-emailaddress-message' => 'Email tidak valid',
							    		'data-fv-notempty' => 'true',
	                					'data-fv-notempty-message' => 'Email tidak boleh kosong'
							    	)) }}
							    </div>	

							    <div class="form-group col-md-6" style="padding-left:0">
								    {{ Form::label('agama', 'Agama*') }}
								    {{ Form::text('agama', Input::old('agama'), array(
									    'class' => 'form-control',
									    'placeholder' => 'Agama',
									    'data-fv-notempty' => 'true',
									    'data-fv-notempty-message' => 'Agama tidak boleh kosong'
							    	)) }}
							    </div>	
						    </div>	    
			    	</fieldset>

			    	<fieldset>
			    		<legend>Data Kepegawaian</legend>
			    		<div class="row">
				    		<div class="form-group col-md-6" style="padding-left:0">
							    {{ Form::label('nip', 'NIP*') }}
							    {{ Form::text('nip', Input::old('nip'), array(
									    'class' => 'form-control',
									    'placeholder' => 'Nomor Induk Pegawai',
									    'data-fv-notempty' => 'true',
									    'data-fv-notempty-message' => 'NIP tidak boleh kosong',
							    	)) }}
							 </div>

							 <div class="form-group col-md-6" style="padding-left:0">						   
							    {{ Form::label('statuspeg', 'Status Kepegawaian*') }}
							     {{ Form::select('statuspeg', array(
								    '' => '-- Pilih status --', 'Tetap' => 'Tetap', 'Tidak tetap' => 'Tidak tetap'), Input::old('statuspeg'), array(
								    'class' => 'form-control',
								    'data-fv-notempty' => 'true',
								    'data-fv-notempty-message' => 'Status kepegawaian tidak boleh kosong'
								  )) }}
							 </div>
						 </div>
						 <div class="form-group" style="padding-left:0">						   
						    {{ Form::label('pass', 'Password*') }}
						    <div class="input-group">
						    	<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
							     {{ Form::text('pass', Input::old('pass'), array(
									    'class' => 'form-control',
									    'placeholder' => 'Password',
									    'data-fv-notempty' => 'false',
									    'data-fv-notempty-message' => 'Password tidak boleh kosong',
									    'id' => 'txt-pass',
							    )) }}
							    <span class="input-group-btn">
							        <button class="btn btn-danger" type="button" id="btn-pass">Buat password</button>
							    </span>
						    </div>
						</div>
			    	</fieldset>	
			    	<small class="text-danger">* : Harus diisi</small>
			  <div class="panel-footer">
			  		<input type="submit" class="cs-btn blue animate" name="submitButton" value="Submit">
			  </div>
			   {{ Form::close() }}
			  </div>
			</div>
		</div>

	</div>
@stop