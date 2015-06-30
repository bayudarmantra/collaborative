@extends('backend.layouts.backend-master')
@section('content')
	<div class="panel panel-default bck-panel bck-table-panel">
		<div class="panel-heading">
			<h3 class="panel-title">Data {{ ucwords($title) }}</h3>
		</div>
		<div class="panel-body">

		@if (Session::has('message'))
		    <div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif

		 <a href="#" class="cs-btn blue animate"><span class="fa fa-plus-circle"></span>&nbsp;Tambah baru</a>
			<table class="table table-striped dataTable">
			    <thead>
			        <tr>
			            <th>NIM</th>
			            <th>NAMA</th>
			            <th>PRODI</th>
						<th width="100" align="center">MANAGE</th>
			        </tr>
			    </thead>
			    <tbody>
			    @foreach($mahasiswa as $key => $value)
			        <tr>
			            <td>{{ $value->nim }}</td>
			            <td>{{ $value->nama }}</td>
			            <td>{{ $value->prodi }}</td>
						<td align="center">
							<div class="btn-group">
								<a href="{{ URL::to('dashboard/mahasiswa/' . $value->id . '/edit') }}" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
								<a href="{{ URL::to('delMhs/' . $value->id) }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><span class="fa fa-trash"></span></a>
							</div>
						</td>
			        </tr>
			    @endforeach
			    </tbody>
			</table>
		</div>
	</div>
@stop