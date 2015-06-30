@extends('backend.layouts.backend-master')
@section('content')


<!-- PRODUCT SHOT -->
  <div class="row">

  <div class="col-md-3">
	  <a href="{{URL::to('dashboard/dosen/create')}}" style="position: absolute; top: -10px; left: 5px;"><span class="fa fa-plus-circle" style="font-size: 40px; color: #FFF"></span></a>
  	<div class="panel panel-primary">
	  <div class="panel-body bg-primary">
	    <span class="fa fa-users pull-left" style="font-size: 80px"></span>
		<h4 style="font-size: 15px"><strong>DOSEN</strong></h4>
		<span style="font-size: 30px">{{$dosen}}</span>
	  </div>
	</div>
  </div>

  <div class="col-md-3">
	  <a href="{{URL::to('dashboard/mahasiswa/create')}}" style="position: absolute; top: -10px; left: 5px;"><span class="fa fa-plus-circle" style="font-size: 40px; color: #FFF"></span></a>
  	<div class="panel panel-primary">
	  <div class="panel-body bg-primary">
		  <span class="fa fa-graduation-cap pull-left" style="font-size: 80px"></span>
		  <h4 style="font-size: 14px"><strong>MAHASISWA</strong></h4>
		  <span style="font-size: 30px">{{$mahasiswa}}</span>
	  </div>
	</div>
  </div>

  <div class="col-md-3">
	  <a href="{{URL::to('dashboard/matakuliah/create')}}" style="position: absolute; top: -10px; left: 5px;"><span class="fa fa-plus-circle" style="font-size: 40px; color: #FFF"></span></a>
  	<div class="panel panel-primary">
	  <div class="panel-body bg-primary">
		  <span class="fa fa-book pull-left" style="font-size: 80px"></span>
		  <h4 style="font-size: 15px"><strong>MATA KULIAH</strong></h4>
		  <span style="font-size: 30px">{{$matakuliah}}</span>
	  </div>
	</div>
  </div>

  <div class="col-md-3">
	  <a href="{{URL::to('dashboard/perkuliahan/create')}}" style="position: absolute; top: -10px; left: 5px;"><span class="fa fa-plus-circle" style="font-size: 40px; color: #FFF"></span></a>
  	<div class="panel panel-primary">
	  <div class="panel-body bg-primary">
		  <span class="fa fa-calendar-o pull-left" style="font-size: 80px"></span>
		  <h4 style="font-size: 15px"><strong>PERKULIAHAN</strong></h4>
		  <span style="font-size: 30px">{{$perkuliahan}}</span>
	  </div>
	</div>
  </div>
  	
  </div>

	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default bck-panel bck-table-panel">
				<div class="panel-heading"><h3 class="panel-title">GOOGLE DRIVE STATUS | MAHASISWA</h3></div>
				<div class="panel body">
					<table class="table table-striped">
						<thead>
						<tr>
							<th>NAMA</th>
							<th>EMAIL</th>
							<th width="50">STATUS</th>
						</tr>
						</thead>

						<tbody>
						@foreach($userMhs as $value)
							<tr>
								<td>{{$value->mhs->nama}}</td>
								<td>{{$value->mhs->email}}</td>
								@if(!empty($value->access_token))
									<td align="center"><span class="fa fa-circle" style="color:#2ca02c;"></span></td>
								@else
									<td align="center"><span class="fa fa-circle" style="color:red;"></span></td>
								@endif
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default bck-panel bck-table-panel">
				<div class="panel-heading"><h3 class="panel-title">GOOGLE DRIVE STATUS | DOSEN</h3></div>
				<div class="panel body">
					<table class="table table-striped">
						<thead>
						<tr>
							<th>NAMA</th>
							<th>EMAIL</th>
							<th width="50">STATUS</th>
						</tr>
						</thead>

						<tbody>
						@foreach($userDosen as $value)
							<tr>
								<td>{{$value->dosen->nama}}</td>
								<td>{{$value->dosen->email}}</td>
								@if(!empty($value->access_token))
									<td align="center"><span class="fa fa-circle" style="color:#2ca02c;"></span></td>
								@else
									<td align="center"><span class="fa fa-circle" style="color:red;"></span></td>
								@endif
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop