@extends('backend.layouts.backend-master')
@section('content')
	<div class="panel panel-default bck-panel bck-table-panel">
		<div class="panel-heading">
			<h3 class="panel-title"><span class="fa fa-group"></span> Dosen</h3>
		</div>
		<div class="panel-body">

		@if (Session::has('message'))
		    <div class="alert alert-info alert-dismissable">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		    {{ Session::get('message') }}
		    </div>
		@endif

		 <a href="{{ URL::to('dashboard/dosen/create') }}" class="cs-btn blue animate"><span class="fa fa-plus-circle"></span>&nbsp;Tambah baru</a>
			<table class="table table-striped dataTable">
			    <thead>
			        <tr>
			            <th width="200">NIP</th>
			            <th>NAMA</th>
						<th>ALAMAT</th>
			            <th width="200" align="center">MANAGE</th>
			        </tr>
			    </thead>
			    <tbody>
			    @foreach($dosen as $key => $value)
			        <tr>
			            <td>{{ $value->nip }}</td>
			            <td>{{ $value->nama }}</td>
						<td>{{ $value->alamat }}</td>
			            <td align="center">
							<div class="btn-group">
								<a href="{{ URL::to('dashboard/dosen/' . $value->id . '/edit') }}" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
								<a href="{{ URL::to('delDosen/' . $value->id) }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><span class="fa fa-trash"></span></a>
							</div>
						</td>
			        </tr>
			    @endforeach
			    </tbody>
			</table>
		</div>
	</div>
@stop