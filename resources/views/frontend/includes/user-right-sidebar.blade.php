		<div class="col-md-3 sidebar-wrapper">
			<?php
			if(Auth::user()->role == "mahasiswa")
			{
				$url = 'u/mahasiswa';
			}else{
				$url = 'u/dosen';
			}
			?>

			@if(Request::segment(3) == 'kelas')
				<div class="user-profile" style="margin-bottom:15px;">
					<div class="sidebar-title" style="position: relative; top: -10px"><span class="fa fa-user"></span> <small>Dosen Pengajar</small></div>
					<div class="media" style="padding:0 10px 15px 10px">
						<a class="pull-left" href="#">
							@if($infokelas->dosen->foto != '')
								{{HTML::image('assets/upload/'.$infokelas->dosen->foto,'photo', array('class' => 'media-object img-circle', 'height' => '60', 'width' => '60'))}}
							@else
								{{HTML::image('assets/images/user.png','photo', array('class' => 'media-object img-circle', 'height' => '60', 'width' => '60'))}}
							@endif
						</a>
						<div class="media-body">
							<h5 class="media-heading"><a href="{{URL::to('u/dosen/'.$infokelas->dosen->nip.'/profil')}}">{{$infokelas->dosen->nama}}</a></h5>
							<small>{{$infokelas->dosen->nip}}</small>
						</div>
					</div>
				</div><!-- user-profile -->

				<div class="sidebar-title">
					<span class="fa fa-tasks"></span> <small>INFO PERKULIAHAN</small>
					<a href="#"></a>
				</div>
				<div class="sidebar" style="padding: 15px;">
					<table class="table table-striped table-info">
						<tr>
							<td><strong style="color: #E62F17">KODE KELAS</strong></td>
							<td>&nbsp;<span class="fa fa-chevron-circle-right"></span>&nbsp;</td>
							<td>{{$infokelas->kodekelas}}</td>
						</tr>
						<tr>
							<td><strong style="color: #E62F17">MATA KULIAH</strong></td>
							<td>&nbsp;<span class="fa fa-chevron-circle-right"></span>&nbsp;</td>
							<td align="center">{{$infokelas->mk->namamk}}</td>
						</tr>
						<tr>
							<td><strong style="color: #E62F17">SKS</strong></td>
							<td>&nbsp;<span class="fa fa-chevron-circle-right"></span>&nbsp;</td>
							<td>{{$infokelas->mk->sks}}</td>
						</tr>
						<tr>
							<td><strong style="color: #E62F17">HARI / JAM</strong></td>
							<td>&nbsp;<span class="fa fa-chevron-circle-right"></span>&nbsp;</td>
							<td>{{strtoupper($infokelas->hari)}} | {{$infokelas->jam}}</td>
						</tr>
					</table>

				</div><!-- sidebar -->
				@elseif(Request::segment(4) == "grup")
				<div class="sidebar-title">
					<span class="glyphicon glyphicon-th-large"></span> <small>INFO GRUP</small>
					<a href="#"></a>
				</div>
				<div class="sidebar" style="padding: 15px;">
					<table class="table table-striped table-info">
						<tr>
							<td><strong style="color: #E62F17">NAMA GRUP</strong></td>
							<td>&nbsp;<span class="fa fa-chevron-circle-right"></span>&nbsp;</td>
							<td>{{$infoGrup->nama}}</td>
						</tr>
						<tr>
							<td><strong style="color: #E62F17">MATA KULIAH</strong></td>
							<td>&nbsp;<span class="fa fa-chevron-circle-right"></span>&nbsp;</td>
							<td>{{$infokelas->mk->namamk}}</td>
						</tr>
						<tr>
							<td><strong style="color: #E62F17">ADMIN GRUP</strong></td>
							<td>&nbsp;<span class="fa fa-chevron-circle-right"></span>&nbsp;</td>
							<td>{{$infoGrup->mhs->nama}}</td>
						</tr>
					</table>
				</div><!-- sidebar -->
			@endif

			<div class="sidebar-title"><span class="glyphicon glyphicon-tasks"></span> <small>tugas</small></div>
				<div class="sidebar list-group">
				@if(Auth::user()->role == "mahasiswa")
					<?php
						$tugas = $tugasMhs;
						$pengumuman = $pengumumanMhs;
						$link = "u/mahasiswa";
						?>
				@else
					<?php
						$tugas = $tugasDosen;
						$pengumuman = $pengumumanDosen;
						$link = "u/dosen";
						?>
				@endif

				@if($tugas->isEmpty())
					<a href="javascript:void(0)" class="list-group-item list-group-item-warning"><span class="glyphicon glyphicon-exclamation-sign"></span> <strong>Tidak ada tugas</strong></a>
				@else
					@foreach($tugas as $row)
						<a href="#" class="list-group-item"><small><span class="label label-primary">{{$row->kelas}}</span> {{$row->judul}}</small></a>
					@endforeach
				@endif
				</div>

			<div class="sidebar-title"><span class="glyphicon glyphicon-list-alt"></span> <small>pengumuman</small></div>
				<div class="sidebar list-group">

					@if($pengumuman->isEmpty())
						<a href="javascript:void(0)" class="list-group-item list-group-item-warning"><span class="glyphicon glyphicon-exclamation-sign"></span> <strong>Tidak ada pengumuman</strong></a>
					@else
						@foreach($pengumuman as $row)
							<a href="" class="list-group-item"><small><span class="label label-primary">{{$row->kodekelas}}</span> {{$row->judul}}</small></a>
						@endforeach
					@endif
				</div>
		</div>