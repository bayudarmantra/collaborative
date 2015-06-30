@extends('backend.layouts.backend-master')
@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default bck-panel">
			  <div class="panel-heading">
			    <h3 class="panel-title"><span class="fa fa-plus-circle"></span> {{ ucwords($title) }}</h3>
			  </div>
			  <div class="panel-body">
			  	@foreach ($errors->all() as $error)
			        <p class="error">{{ $error }}</p>
			    @endforeach

			  	{{ Form::open(array(
			  		'url' => 'dashboard/mahasiswa',
			  		'class' => 'form-validator',
			  		'id' => 'form-mahasiswa',
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
									    'placeholder' => 'Nama lengkap mahasiswa',
									    'data-fv-notempty' => 'true',
									    'data-fv-notempty-message' => 'Nama mahasiswa tidak boleh kosong'
								    )) }}
							    </div>

							    <div class="form-group col-md-6" style="padding-left:0">
								    {{ Form::label('kelamin', 'Jenis Kelamin*') }}
								    {{ Form::select('kelamin', array(
								    '' => '-- Jenis kelamin --', '1' => 'Laki-laki', '0' => 'Perempuan'), Input::old('kelamin'), array(
								    'class' => 'form-control',
								    'data-fv-notempty' => 'true',
								    'data-fv-notempty-message' => 'Jenis kelamin tidak boleh bosong'
								    )) }}
							    </div>
						    </div>

						    <div class="form-group col-md-12" style="padding-left:0">
							    {{ Form::label('alamat', 'Alamat*') }}
							    {{ Form::text('alamat', Input::old('alamat'), array(
								    'class' => 'form-control',
								    'placeholder' => 'Alamat mahasiswa',
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
									    'placeholder' => 'Email mahasiswa',
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
			    		<legend>Kemahasiswaan</legend>
			    		<div class="row">
				    		<div class="form-group col-md-6" style="padding-left:0">
							    {{ Form::label('nim', 'NIM*') }}
							    {{ Form::text('nim', Input::old('nim'), array(
									    'class' => 'form-control',
									    'placeholder' => 'Nomor Induk Mahasiswa',
									    'data-fv-notempty' => 'true',
									    'data-fv-notempty-message' => 'NIM tidak boleh kosong',
									    'data-fv-regexp' => 'true',
					    				'data-fv-regexp-regexp' => '^[0-9]{9,10}$',
					    				'data-fv-regexp-message' => 'NIM hanya boleh berupa angka'
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
						</div>

						<div class="row">
							 <div class="form-group col-md-6" style="padding-left:0">
							    {{ Form::label('angkatan', 'Angkatan*') }}
							    {{ Form::text('angkatan', Input::old('angkatan'), array(
									    'class' => 'form-control',
									    'placeholder' => 'Tahun angkatan',
									    'data-fv-notempty' => 'true',
									    'data-fv-notempty-message' => 'Tahun angkatan tidak boleh kosong'
							    	)) }}
							 </div>

							 <div class="form-group col-md-6" style="padding-left:0">
							    {{ Form::label('stskelas', 'Status kelas*') }}
								{{ Form::select('stskelas', array(
								    '' => '-- Status kelas --', 'Regular' => 'Regular', 'Eksekutif' => 'Eksekutif', 'Karyawan' => 'Karyawan', 'Internasional' => 'Internasional'), Input::old('stskelas'), array(
								    'class' => 'form-control',
								    'data-fv-notempty' => 'true',
								    'data-fv-notempty-message' => 'Status kelas tidak boleh kosong'
								 )) }}
							 </div>	
						 </div>

						 <div class="row">
							 <div class="form-group col-md-6" style="padding-left:0">
							    {{ Form::label('ststransfer', 'Status kelas*') }}
								{{ Form::select('ststransfer', array(
								    '' => '-- Status transfer --', 'Transfer' => 'Transfer', 'Bukan Transfer' => 'Bukan Transfer'), Input::old('ststransfer'), array(
								    'class' => 'form-control',
								    'data-fv-notempty' => 'true',
								    'data-fv-notempty-message' => 'Status transfer tidak boleh kosong'
								 )) }}
							 </div>

							 <div class="form-group col-md-6" style="padding-left:0">
							    {{ Form::label('stsinvestasi', 'Status investasi*') }}
								{{ Form::select('stsinvestasi', array(
								    '' => '-- Status investasi --', 'Investasi' => 'Investasi', 'Bukan Investasi' => 'Bukan Investasi'), Input::old('stsinvestasi'), array(
								    'class' => 'form-control',
								    'data-fv-notempty' => 'true',
								    'data-fv-notempty-message' => 'Status investasi tidak boleh kosong'
								 )) }}
							 </div>	
						 </div>

						 <div class="row">
							 <div class="form-group col-md-5" style="padding-left:0">
							    {{ Form::label('stskuliah', 'Status kuliah*') }}
								{{ Form::select('stskuliah', array(
								    '' => '-- Status kuliah --', 'Pagi-siang' => 'Pagi-siang', 'Siang-sore' => 'Siang-sore', 'Sore-malam' => 'Sore-malam'), Input::old('stskuliah'), array(
								    'class' => 'form-control',
								    'data-fv-notempty' => 'true',
								    'data-fv-notempty-message' => 'Status kuliah tidak boleh kosong'
								 )) }}
							 </div>

							 <div class="form-group col-md-7" style="padding-left:0">
							    {{ Form::label('dosenwali', 'Dosen wali*') }}
							    {{ Form::select('dosenwali', $dosen, Input::old('dosenwali'), array(
								    'class' => 'form-control',
								    'data-fv-notempty' => 'true',
								    'data-fv-notempty-message' => 'Required'
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
									    'data-fv-notempty' => 'true',
									    'data-fv-notempty-message' => 'Required',
									    'id' => 'txt-pass',
									    'readonly'
							    )) }}
							    <span class="input-group-btn">
							        <button class="btn btn-danger" type="button" id="btn-pass">Buat password</button>
							    </span>
						    </div>
						</div>
			    	</fieldset>
			    	<small class="text-danger">* : Harus diisi</small>
			  <div class="panel-footer">
				  <button type="submit" name="submitButton" class="btn btn-primary">Submit</button>
			  </div>
			  {{ Form::close() }}
			</div>
			</div>
		</div>
	</div>
@stop