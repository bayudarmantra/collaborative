@extends('backend.layouts.backend-master')
@section('content')
<div class="col-md-7">
	<div class="panel panel-default bck-panel bck-table-panel">
		<div class="panel-heading">
			<h3 class="panel-title">Detail {{ ucwords($title) }}</h3>
		</div>
		<div class="panel-body">
			@foreach($perkuliahan as $kelas)
			<table class="tb-kelas">
				<tr>
					<td class="title">MATA KULIAH</td>
					<td>{{ strtoupper($kelas->mk->namamk) }} ({{$kelas->mk->kodemk }})</td>
				</tr>
				<tr>
					<td class="title">KELAS</td>
					<td>{{ strtoupper($kelas->kodekelas) }}</td>
				</tr>
				<tr>
					<td class="title">NAMA DOSEN</td>
					<td>{{ strtoupper($kelas->dosen->nama) }}</td>
				</tr>
				<tr>
					<td class="title">JML SKS</td>
					<td>{{ strtoupper($kelas->mk->sks) }} SKS</td>
				</tr>
				<tr>
					<td class="title">HARI</td>
					<td>{{ strtoupper($kelas->hari) }}</td>
				</tr>
				<tr>
					<td class="title">WAKTU</td>
					<td>{{ strtoupper($kelas->jam) }}</td>
				</tr>
			</table>
			@endforeach
			<hr>
			<h4 align="center">DAFTAR PESERTA PERKULIAHAN</h4>
			<a href="#" class="btn btn-default" id="get-mhskelas" style="display:none">getData</a>
			<table class="table table-striped" id="table-mhskelas">
				<thead>
					<tr>
						<td>NO</td>
						<td>NIM</td>
						<td>NAMA MAHASISWA</td>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>
</div>
	
<div class="col-md-5">
	<div class="panel panel-default bck-panel bck-table-panel">
		<div class="panel-heading">
			<h3 class="panel-title">Mahasiswa</h3>
		</div>
		<div class="panel-body">
		<a href="#" class="btn btn-default" id="get-mhs" style="display:none">getData</a>
			{{ Form::open(array(
				'id' => 'add-mhs-kelas'
			))}}
			<table class="table table striped" id="table-mhs">
				<thead>
					<tr>
						<td>#</td>
						<td>NIM</td>
						<td>NAMA</td>
					</tr>
				</thead>
				<tbody>

				</tbody>
				
			</table>

			@foreach($perkuliahan as $kelas)
				{{ Form::hidden('kodekelas', $kelas->kodekelas, array('id' => 'kodekelas')) }}
				{{ Form::hidden('kodemk', $kelas->mk->kodemk) }}
			@endforeach
			<button type="submit" class="btn btn-default" id="add-mhs">Add</button>
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop