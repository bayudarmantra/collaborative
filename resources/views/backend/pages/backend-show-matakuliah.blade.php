@extends('backend.layouts.backend-master')
@section('content')
	<div class="panel panel-default bck-panel bck-table-panel">
		<div class="panel-heading">
			<h3 class="panel-title">Mahasiswa</h3>
		</div>
		<div class="panel-body">

		@if (Session::has('message'))
		    <div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif

		 <a href="#" class="cs-btn blue animate"><span class="fa fa-plus-circle"></span>&nbsp;Tambah baru</a>
			<table class="table table-striped dataTable">
			    <thead>
			        <tr>
			            <th>KODE MK</th>
			            <th>MATA KULIAH</th>
			            <th>SKS</th>
			            <th>PRODI</th>
						<th>MANAGE</th>

			        </tr>
			    </thead>
			    <tbody>
			    @foreach($matakuliah as $key => $value)
			        <tr>
			            <td>{{ $value->kodemk }}</td>
			            <td>{{ $value->namamk }}</td>
			            <td>{{ $value->sks }}</td>
			            <td>{{ $value->prodi }}</td>
						<td align="center">
							<div class="btn-group">
								<a href="{{ URL::to('dashboard/matakuliah/' . $value->kodemk . '/edit') }}" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
								<a href="{{ URL::to('delMatakuliah/' . $value->kodemk) }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><span class="fa fa-trash"></span></a>
							</div>
						</td>
			        </tr>
			    @endforeach
			    </tbody>
			</table>
		</div>
	</div>
@stop