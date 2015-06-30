@extends('backend.layouts.backend-master')
@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default bck-panel">
			  <div class="panel-heading">
			    <h3 class="panel-title">Ubah Data Dosen</h3>
			  </div>
			  <div class="panel-body">
			    {{ HTML::ul($errors->all()) }}
			  	{{ Form::model($dosen, array(
			  		'route' => array('dashboard.dosen.update',$dosen->id),
			  		'method' => 'PUT',
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
								    {{ Form::text('nama', null, array(
									    'class' => 'form-control',
									    'placeholder' => 'Nama lengkap dosen',
									    'data-fv-notempty' => 'true',
									    'data-fv-notempty-message' => 'Nama dosen tidak boleh kosong'
								    )) }}
							    </div>

							    <div class="form-group col-md-6" style="padding-left:0">
								    {{ Form::label('kelamin', 'Jenis Kelamin*') }}
								    {{ Form::select('kelamin', array(
								    '' => '-- Jenis kelamin --', '1' => 'Laki-laki', '0' => 'Perempuan'), null, array(
								    'class' => 'form-control',
								    'data-fv-notempty' => 'true',
								    'data-fv-notempty-message' => 'Jenis kelamin tidak boleh kosong'
								    )) }}
							    </div>
						    </div>

						    <div class="form-group col-md-12" style="padding-left:0">
							    {{ Form::label('alamat', 'Alamat*') }}
							    {{ Form::text('alamat', null, array(
								    'class' => 'form-control',
								    'placeholder' => 'Alamat dosen',
								    'data-fv-notempty' => 'true',
								    'data-fv-notempty-message' => 'Alamat tidak boleh kosong'
							    )) }}
						    </div>

						    <div class="row">
						    	<div class="form-group col-md-6" style="padding-left:0">
						    		{{ Form::label('tmplahir', 'Tempat Lahir*') }}
								    {{ Form::text('tmplahir', null, array(
									    'class' => 'form-control',
									    'placeholder' => 'Tempat lahir',
									    'data-fv-notempty' => 'true',
									    'data-fv-notempty-message' => 'Tempat lahir tidak boleh kosong'
								    )) }}
						    	</div>

						    	<div class="form-group col-md-6" style="padding-left:0">
							    	{{ Form::label('tgllahir', 'Tanggal Lahir*') }}
							    	<div class="input-group date">
							  		{{ Form::text('tgllahir', null, array(
									    'class' => 'form-control',
									    'placeholder' => 'Tanggal lahir',
									    'data-fv-notempty' => 'true',
									    'data-fv-notempty-message' => 'Tanggal lahir tidak boleh kosong',
									    'readonly'
							    	)) }}
								  		<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
									</div>
						    	</div>	
					    	</div>

					    	<div class="row">
						    	<div class="form-group col-md-6" style="padding-left:0">
						    		{{ Form::label('nohp', 'No HP*') }} <span class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="top" 
						    		title="Prefix valid: +62 / 08x"></span>
						    		{{ Form::text('nohp', null, array(
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
						    		{{ Form::text('notlp', null, array(
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
								    {{ Form::email('email', null, array(
									    'class' => 'form-control',
									    'placeholder' => 'Email',
									    'data-fv-emailaddress' => 'true',
							    		'data-fv-emailaddress-message' => 'Email tidak valid',
							    		'data-fv-notempty' => 'true',
	                					'data-fv-notempty-message' => 'Email tidak boleh kosong'
							    	)) }}
							    </div>	

							    <div class="form-group col-md-6" style="padding-left:0">
								    {{ Form::label('agama', 'Agama*') }}
								    {{ Form::text('agama', null, array(
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
							    {{ Form::text('nip', null, array(
									    'class' => 'form-control',
									    'placeholder' => 'Nomor Induk Pegawai',
									    'data-fv-notempty' => 'true',
									    'data-fv-notempty-message' => 'NIP tidak boleh kosong',
					    				'readonly'
							    	)) }}
							 </div>

							 <div class="form-group col-md-6" style="padding-left:0">						   
							    {{ Form::label('statuspeg', 'Status Kepegawaian*') }}
							     {{ Form::select('statuspeg', array(
								    '' => '-- Pilih status --', 'Tetap' => 'Tetap', 'Tidak tetap' => 'Tidak tetap'), null, array(
								    'class' => 'form-control',
								    'data-fv-notempty' => 'true',
								    'data-fv-notempty-message' => 'Status kepegawaian tidak boleh kosong'
								  )) }}
								   
							 </div>
						 </div>
			    	</fieldset>	
			    	<small class="text-danger">* : Required</small>
			  <div class="panel-footer">
			  		<input type="submit" class="cs-btn blue animate" value="Submit">
			  </div>
			   {{ Form::close() }}
			  </div>
			</div>
		</div>
	</div>
@stop