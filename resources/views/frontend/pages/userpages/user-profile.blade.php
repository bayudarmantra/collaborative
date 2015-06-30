@extends('frontend.layouts.user-profile-master')
@section('content')
<!-- CONTENT -->

@if(Request::segment(2) == 'mahasiswa')
	<?php
	$row = $mahasiswaProfile;
	$link = 'u/mahasiswa/';
	$primary = $row->nim;
	$modal = "#updateProfileModal1";
	?>
@else
	<?php
	$row = $dosenProfile;
	$link = 'u/dosen/';
	$primary = $row->nip;
	$modal = "#updateProfileModal2";
	?>
@endif

<div class="content user-profile-wrapper">
	<div class="user-profile-panel">
		<div class="user-thumb">
			@if(Session::get('user') == Request::segment(3))
				<div class="change-photo">
					<a href="#" data-toggle="modal" data-target="#photoModal"><span class="glyphicon glyphicon-camera"></span></a>
				</div>
			@endif

			@if($row->foto != '')
				{{HTML::image('assets/upload/'.$row->foto,'photo', array('class' => 'img img-circle', 'height' => '130', 'width' => '130'))}}
			@else
				{{HTML::image('assets/images/user.png','photo', array('class' => 'img img-circle', 'height' => '130', 'width' => '130'))}}
			@endif
		</div>
		<div class="user-desc">
			<span class="user-name">{{ $row->nama }}</span>
		</div>

		<div class="user-sum">
			<div class="summary">
				<div class="col-md-3">
					<span>1200</span>
					<span>Posts</span>
				</div>
				<div class="col-md-3">
					<span>1200</span>
					<span>Posts</span>
				</div>
				<div class="col-md-3">
					<span>1200</span>
					<span>Posts</span>
				</div>
				<div class="col-md-3">
					<span>1200</span>
					<span>Posts</span>
				</div>
			</div>
		</div>
	</div>

	<div class="user-profile-content">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
		  <li class="active"><a href="#timeline" data-toggle="tab">POST</a></li>
		  <li><a href="#profile" data-toggle="tab">PROFIL</a></li>
		  <li><a href="#class" data-toggle="tab">KELAS</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
		  <div class="tab-pane fade in active" id="timeline">
		  	<div class="tab-title">
		  		<span class="glyphicon glyphicon-th-large"></span> Timeline <a href="#" id="showPost" class="pull-right">Show Post</a>
		  	</div>
			<div id="post-wrapper" class="content-body"></div>
		  </div>
		  <div class="tab-pane fade" id="profile">
		  	<div class="tab-title">
		  		<span class="glyphicon glyphicon-th-large"></span> Profile
				@if(Session::get('user') == Request::segment(3))
					<a href="" class="pull-right" style="font-size: 15px" data-toggle="modal" data-target="{{$modal}}"><span class="fa fa-pencil"></span> Edit profil</a>
				@endif
		  	</div>
			@if(Request::segment(2) == "mahasiswa")
		  	<div class="row">
		  		<div class="col-md-3">
		  			<ul class="list-unstyled profil-list profil-title">
				  		<li>
				  		<span class="fa fa-chevron-circle-right"></span> NAMA LENGKAP<hr>
				  		</li>
				  		<li>
				  		<span class="fa fa-chevron-circle-right"></span> NIM<hr>
				  		</li>
				  		<li>
				  		<span class="fa fa-chevron-circle-right"></span> Alamat<hr>
				  		</li>
				  		<li>
				  		<span class="fa fa-chevron-circle-right"></span> Tempat, Tgl Lahir<hr>
				  		</li>
				  		<li>
				  		<span class="fa fa-chevron-circle-right"></span> Agama<hr>
				  		</li>
				  		<li>
				  		<span class="fa fa-chevron-circle-right"></span> Program Studi<hr>
				  		</li>
				  		<li>
				  		<span class="fa fa-chevron-circle-right"></span> No.HP/No.Telp<hr>
				  		</li>
				  		<li>
				  		<span class="fa fa-chevron-circle-right"></span> Status Kuliah<hr>
				  		</li>
				  		<li>
				  		<span class="fa fa-chevron-circle-right"></span> Status Kelas<hr>
				  		</li>
				  		<li>
				  		<span class="fa fa-chevron-circle-right"></span> Status Transfer<hr>
				  		</li>
				  		<li>
				  		<span class="fa fa-chevron-circle-right"></span> Dosen Wali<hr>
				  		</li>
				  	</ul>
		  		</div>
		  		<div class="col-md-9">
		  			<ul class="list-unstyled profil-list">
				  		<li>{{ $row->nama }}<hr></li>
				  		<li>{{ $primary }}<hr></li>
				  		<li>{{ $row->alamat }}<hr></li>
				  		<li>{{ $row->tmplahir }}, {{ $row->tgllahir }}<hr></li>
				  		<li>{{ $row->agama }}<hr></li>
						<li>{{ $row->prodi }}<hr></li>
						<li>{{ $row->nohp }} / {{ $row->notlp }}<hr></li>
						<li>{{ $row->stskuliah }}<hr></li>
						<li>{{ $row->stskelas }}<hr></li>
						<li>{{ $row->ststransfer }}<hr></li>
						<li>{{ $row->dosenWali->nama }}<hr></li>
				  	</ul>
		  		</div>
		  	</div>
			@else
				  <div class="row">
					  <div class="col-md-4">
						  <ul class="list-unstyled profil-list profil-title">
							  <li>
								  <span class="fa fa-chevron-circle-right"></span> Nama Lengkap<hr>
							  </li>
							  <li>
								  <span class="fa fa-chevron-circle-right"></span> NIP<hr>
							  </li>
							  <li>
								  <span class="fa fa-chevron-circle-right"></span> Alamat<hr>
							  </li>
							  <li>
								  <span class="fa fa-chevron-circle-right"></span> Tempat, Tgl Lahir<hr>
							  </li>
							  <li>
								  <span class="fa fa-chevron-circle-right"></span> Agama<hr>
							  </li>
							  <li>
								  <span class="fa fa-chevron-circle-right"></span> No.HP/No.Telp<hr>
							  </li>
							  <li>
								  <span class="fa fa-chevron-circle-right"></span> Status Kepegawaian<hr>
							  </li>
						  </ul>
					  </div>
					  <div class="col-md-8">
						  <ul class="list-unstyled profil-list">
							  <li>{{ $row->nama }}<hr></li>
							  <li>{{ $primary }}<hr></li>
							  <li>{{ $row->alamat }}<hr></li>
							  <li>{{ $row->tmplahir }}, {{ $row->tgllahir }}<hr></li>
							  <li>{{ $row->agama }}<hr></li>
							  <li>{{ $row->nohp }} / {{ $row->notlp }}<hr></li>
							  <li>{{ $row->statuspeg }}<hr></li>
						  </ul>
					  </div>
				  </div>
			@endif
		  </div>

		  <div class="tab-pane fade" id="class">
		  	<div class="tab-title">
		  		<span class="fa fa-chevron-circle-right"></span> Kelas
		  	</div>
		  </div>
		</div>
	</div>
</div><!-- content -->
<!-- END CONTENT -->

<!--Change Photo Modal-->
<div class="modal fade" id="photoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Pilih foto</h4>
			</div>
			<div class="modal-body">
				<div class="upload-wrapper">
					{{Form::hidden('storage',storage_path(),array('id' => 'storage'))}}
					{{HTML::image('assets/images/user.png','photo', array('class' => 'img img-circle', 'height' => '130', 'width' => '130', 'id' => 'photo'))}}
					{{Form::open(array('files' => 'true', 'id' => 'form-upload', 'url' => URL::to('addPhoto/'.$primary)))}}
					<div class="fileUpload custom-btn" style="margin-bottom: 15px;">
						UPLOAD FOTO
						{{Form::file('file',array('class' => 'upload'))}}
					</div>
					<div class="progress progress-striped active" id="progress">
						<div class="progress-bar"  role="progressbar" aria-valuemin="0" aria-valuemax="100">
							<span class="sr-only">45% Complete</span>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="custom-btn">Upload</button>
				{{Form::close()}}
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Update Profile Modal Mahasiswa-->
<!-- Modal -->
@if(Request::segment(2) == "mahasiswa")
<div class="modal fade" id="updateProfileModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Update Profil</h4>
			</div>
			<div class="modal-body">

				{{ Form::model($row,array(
			  		'route' => array('dashboard.mahasiswa.update',$row->id),
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
                                '' => '-- Status transfer --', 'Transfer' => 'Transfer', 'Bukan Transfer' => 'Bukan Transfer'), null, array(
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
						<div class="form-group col-md-6" style="padding-left:0">
							{{ Form::label('stskuliah', 'Status kuliah*') }}
							{{ Form::select('stskuliah', array(
                                '' => '-- Status kuliah --', 'Pagi-siang' => 'Pagi-siang', 'Siang-sore' => 'Siang-sore', 'Sore-malam' => 'Sore-malam'), null, array(
                                'class' => 'form-control',
                                'data-fv-notempty' => 'true',
                                'data-fv-notempty-message' => 'Required'
                             )) }}
						</div>

						<div class="form-group col-md-6" style="padding-left:0">
							{{ Form::label('dosenwali', 'Dosen wali*') }}
							{{ Form::select('dosenwali', $dosenwali, null, array(
                                'class' => 'form-control',
                                'data-fv-notempty' => 'true',
                                'data-fv-notempty-message' => 'Required'
                             )) }}
						</div>
					</div>
				</fieldset>
				<small>* : required</small>
			</div>
			<div class="modal-footer">
				<input type="hidden" value="{{ $row->id }}" id="mahasiswaId">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="ubah-profil">Save changes</button>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@else
<!-- Update Profile Modal Dosen-->
<!-- Modal -->
<div class="modal fade" id="updateProfileModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Update Profil</h4>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
@endif
@stop