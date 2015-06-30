<!-- PROFILE -->
		<div class="col-md-3 sidebar-wrapper">
			<div class="notification"></div>
			<div class="user-profile">
				<div class="media" style="padding:0 10px 10px 10px">
				  <div class="media-body media-profile">
					  <div class="media-image">
						  @if(Request::segment(2) == 'mahasiswa')
						  	<?php
						  		$row = $mahasiswa;
						  		$link = 'u/mahasiswa/';
								$primary = $row->nim;
								$perkuliahan = $kelas;
						  	?>
						  @else
						  	<?php
							  $row = $dosen;
							  $link = 'u/dosen/';
							  $primary = $row->nip;
							  $perkuliahan = $kelasDosen;
							  ?>
						  @endif
						  @if($row->foto != '')
						  	{{HTML::image('assets/upload/'.$row->foto,'photo', array('class' => 'media-object img-circle', 'height' => '100', 'width' => '100'))}}
						  @else
						  	{{HTML::image('assets/images/user.png','photo', array('class' => 'media-object img-circle', 'height' => '100', 'width' => '100'))}}
						  @endif

					  </div>
				      <span class="media-heading"><a href="{{URL::to($link.$primary.'/profil')}}">{{ $row->nama }}</a></span>
				  </div>
				</div>
			</div><!-- user-profile -->
			<div class="sidebar-title"><span class="fa fa-graduation-cap"></span> <small>Perkuliahan</small>
                <a href="#"></a>
            </div>
			<div class="sidebar list-group">
				@if($perkuliahan->isEmpty())
					<a href="javascript:void(0)" class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-exclamation-sign"></span> <strong>TIDAK ADA PERKULIAHAN</strong></a>
				@else
					@if(Request::segment(2) == "mahasiswa")
					@foreach($perkuliahan as $value)
						<a href="{{ URL::to('u/mahasiswa/kelas/'.$value->perkuliahan->kodekelas )}}" class="list-group-item sidebar-item"><span class="label label-primary">{{ $value->perkuliahan->kodekelas }}</span> {{ $value->mk->namamk }}<span class="fa fa-chevron-circle-right pull-right" style="position: relative; top:3px;"></span><div class="arrow-right pull-right"></div></a>
					@endforeach
					@else
						@foreach($perkuliahan as $value)
							<a href="{{ URL::to('u/dosen/kelas/'.$value->kodekelas )}}" class="list-group-item sidebar-item"><span class="label label-primary">{{ $value->kodekelas }}</span> {{ $value->mk->namamk }}<span class="fa fa-chevron-circle-right pull-right" style="position: relative; top:3px;"></span><div class="arrow-right pull-right"></div></a>
						@endforeach
					@endif
				@endif
			</div><!-- sidebar -->

			@if(Request::segment(2) == "mahasiswa")
				<div class="sidebar-title"><span class="fa fa-users"></span> <small>Grup <a href="#" id="showGrup" style="display: none">Show grup</a></small> <a href="#" style="color: #FFF"><span class="fa fa-plus-square-o pull-right" style="margin-top: 2px;" data-toggle="modal" data-target="#addGrup"></span></a></div>
				<div class="sidebar list-group" id="grupList">

				</div><!-- sidebar -->
			@endif
		</div>
		<!-- END PROFILE -->

		<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="addGrup">
		  <div class="modal-dialog modal-sm">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title" id="myModalLabel">Buat grup baru</h4>
			      </div>

			      <div class="modal-body">
			      	{{Form::open(array(
		     		'id' => 'add-grup',
			     	))}}
			     	<div class="form-group">
			     		{{ Form::label('nama', 'Nama grup') }}
			     		{{ Form::text('nama', null, array(
			     				'class' => 'form-control'
			     			))}}
			     		{{Form::hidden('nim', $primary, array('id' => 'getNim'))}}
			     	</div>

			     	<div class="form-group">
			     		{{ Form::select('kelas', $listPerkuliahan, Input::old('kelas'), array(
						    'class' => 'form-control',
						    'data-fv-notempty' => 'true',
						    'data-fv-notempty-message' => 'Required'
						 )) }}
			     	</div>

			     	<button class="custom-btn" type="submit">Buat grup</button>
			     	
			     	{{ Form::close() }}
			      </div>
		    </div>
		  </div>
		</div>

