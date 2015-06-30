@extends('backend.layouts.backend-master')
@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default bck-panel">
			  <div class="panel-heading">
			    <h3 class="panel-title">{{ ucwords($title) }}</h3>
			  </div>
			  <div class="panel-body">
			  	@foreach ($errors->all() as $error)
			        <p class="error">{{ $error }}</p>
			    @endforeach

			  	{{ Form::model($mahasiswa,array(
			  		'route' => array('dashboard.mahasiswa.update',$mahasiswa->id),
			  		'method' => 'PUT',
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
								    {{ Form::text('nama', null, array(
									    'class' => 'form-control',
									    'placeholder' => 'Nama lengkap mahasiswa',
									    'data-fv-notempty' => 'true',
									    'data-fv-notempty-message' => 'Required'
								    )) }}
							    </div>

							    <div class="form-group col-md-6" style="padding-left:0">
								    {{ Form::label('kelamin', 'Jenis Kelamin*') }}
								    {{ Form::select('kelamin', array(
								    '' => '-- Jenis kelamin --', '1' => 'Laki-laki', '2' => 'Perempuan'), null, array(
								    'class' => 'form-control',
								    'data-fv-notempty' => 'true',
								    'data-fv-notempty-message' => 'Required'
								    )) }}
							    </div>
						    </div>

						    <div class="form-group col-md-12" style="padding-left:0">
							    {{ Form::label('alamat', 'Alamat*') }}
							    {{ Form::text('alamat', null, array(
								    'class' => 'form-control',
								    'placeholder' => 'Alamat mahasiswa',
								    'data-fv-notempty' => 'true',
								    'data-fv-notempty-message' => 'Required'
							    )) }}
						    </div>

						    <div class="row">
						    	<div class="form-group col-md-6" style="padding-left:0">
						    		{{ Form::label('tmplahir', 'Tempat Lahir*') }}
								    {{ Form::text('tmplahir', null, array(
									    'class' => 'form-control',
									    'placeholder' => 'Tempat lahir',
									    'data-fv-notempty' => 'true',
									    'data-fv-notempty-message' => 'Required'
								    )) }}
						    	</div>

						    	<div class="form-group col-md-6" style="padding-left:0">
							    	{{ Form::label('tgllahir', 'Tanggal Lahir*') }}
							    	<div class="input-group date">
							  		{{ Form::text('tgllahir', null, array(
									    'class' => 'form-control',
									    'placeholder' => 'Tanggal lahir',
									    'data-fv-notempty' => 'true',
									    'data-fv-notempty-message' => 'Required',
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
									    'data-fv-notempty-message' => 'Required',
									    'data-fv-regexp' => 'true',
									    'data-fv-regexp-regexp'=> '^((?:\+62|62)|0)[2-9]{1}[0-9]+$',
									    'data-fv-regexp-message'=> 'No HP not valid'
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
									    'data-fv-regexp-message'=> 'No Tlp not valid'
							    	)) }}
						    	</div>	
					    	</div>

					    	<div class="row">
						    	<div class="form-group col-md-6" style="padding-left:0">
								    {{ Form::label('email', 'Email*') }}
								    {{ Form::email('email', null, array(
									    'class' => 'form-control',
									    'placeholder' => 'Email mahasiswa',
									    'data-fv-emailaddress' => 'true',
							    		'data-fv-emailaddress-message' => 'Email not valid',
							    		'data-fv-notempty' => 'true',
	                					'data-fv-notempty-message' => 'Required'
							    	)) }}
							    </div>	

							    <div class="form-group col-md-6" style="padding-left:0">
								    {{ Form::label('agama', 'Agama*') }}
								    {{ Form::text('agama', null, array(
									    'class' => 'form-control',
									    'placeholder' => 'Agama',
									    'data-fv-notempty' => 'true',
									    'data-fv-notempty-message' => 'Required'
							    	)) }}
							    </div>
						    </div>		    
			    	</fieldset>

			    	<fieldset>
			    		<legend>Kemahasiswaan</legend>
			    		<div class="row">
				    		<div class="form-group col-md-6" style="padding-left:0">
							    {{ Form::label('nim', 'NIM*') }}
							    {{ Form::text('nim', null, array(
									    'class' => 'form-control',
									    'placeholder' => 'Nomor Induk Pegawai',
									    'data-fv-notempty' => 'true',
									    'data-fv-notempty-message' => 'Required',
									    'data-fv-regexp' => 'true',
					    				'data-fv-regexp-regexp' => '^[0-9]{9,10}$',
					    				'data-fv-regexp-message' => 'NIM not valid',
					    				'readonly'
							    	)) }}
							 </div>

				    		<div class="form-group col-md-6" style="padding-left:0">
							    {{ Form::label('prodi', 'Program Studi*') }}
								{{ Form::select('prodi', array(
								    '' => '-- Program studi --', 'S1-Sistem Komputer' => 'S1-Sistem Komputer', 'S1-Sistem Informasi' => 'S1-Sistem Informasi', 'D3-Manajemen Informatika' => 'D3-Manajemen Informatika', 'Internasional' => 'Internasional'), null, array(
								    'class' => 'form-control',
								    'data-fv-notempty' => 'true',
								    'data-fv-notempty-message' => 'Required'
								 )) }}
							</div>
						</div>

						<div class="row">
							 <div class="form-group col-md-6" style="padding-left:0">
							    {{ Form::label('angkatan', 'Angkatan*') }}
							    {{ Form::text('angkatan', null, array(
									    'class' => 'form-control',
									    'placeholder' => 'Tahun angkatan',
									    'data-fv-notempty' => 'true',
									    'data-fv-notempty-message' => 'Required'
							    	)) }}
							 </div>

							 <div class="form-group col-md-6" style="padding-left:0">
							    {{ Form::label('stskelas', 'Status kelas*') }}
								{{ Form::select('stskelas', array(
								    '' => '-- Status kelas --', 'Regular' => 'Regular', 'Eksekutif' => 'Eksekutif', 'Karyawan' => 'Karyawan', 'Internasional' => 'Internasional'), null, array(
								    'class' => 'form-control',
								    'data-fv-notempty' => 'true',
								    'data-fv-notempty-message' => 'Required'
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
								    'data-fv-notempty-message' => 'Required'
								 )) }}
							 </div>

							 <div class="form-group col-md-6" style="padding-left:0">
							    {{ Form::label('stsinvestasi', 'Status investasi*') }}
								{{ Form::select('stsinvestasi', array(
								    '' => '-- Status investasi --', 'Investasi' => 'Investasi', 'Bukan Investasi' => 'Bukan Investasi'), null, array(
								    'class' => 'form-control',
								    'data-fv-notempty' => 'true',
								    'data-fv-notempty-message' => 'Required'
								 )) }}
							 </div>	
						 </div>

						 <div class="row">
							 <div class="form-group col-md-5" style="padding-left:0">
							    {{ Form::label('stskuliah', 'Status kuliah*') }}
								{{ Form::select('stskuliah', array(
								    '' => '-- Status kuliah --', 'Pagi-siang' => 'Pagi-siang', 'Siang-sore' => 'Siang-sore', 'Sore-malam' => 'Sore-malam'), null, array(
								    'class' => 'form-control',
								    'data-fv-notempty' => 'true',
								    'data-fv-notempty-message' => 'Required'
								 )) }}
							 </div>

							 <div class="form-group col-md-7" style="padding-left:0">
							    {{ Form::label('dosenwali', 'Dosen wali*') }}
							    {{ Form::select('dosenwali', $dosen, null, array(
								    'class' => 'form-control',
								    'data-fv-notempty' => 'true',
								    'data-fv-notempty-message' => 'Required'
								 )) }}
							 </div>	
						 </div>
			    	</fieldset>
			    	<small>* : required</small>
			  <div class="panel-footer">
			  		<input type="submit" class="cs-btn blue animate" value="Submit">
			  </div>
			  </div>
			  {{ Form::close() }}
			</div>
		</div>
	</div>
@stop