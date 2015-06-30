@extends('backend.layouts.backend-master')
@section('content')
	<div class="panel panel-default bck-panel bck-table-panel">
		<div class="panel-heading">
			<h3 class="panel-title">Administrator</h3>
		</div>
		<div class="panel-body">

		@if (Session::has('message'))
		    <div class="alert alert-info alert-dismissable">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		    {{ Session::get('message') }}
		    </div>
		@endif

		 <a href="{{ URL::to('dashboard/admin/create') }}" class="cs-btn blue animate"><span class="fa fa-plus-circle"></span>&nbsp;Tambah baru</a>
			<a href="" class="ghost-btn"><span class="fa fa-plus-circle"></span> Tambah</a>
			<table class="table table-striped dataTable">
			    <thead>
			        <tr>
			            <th>NAMA</th>
			            <th>ALAMAT</th>
			            <th width="100">MANAGE</th>
			        </tr>
			    </thead>
			    <tbody>
				@foreach($admin as $row)
			    	<tr>
						<td>{{ $row->nama }}</td>
						<td>{{ $row->alamat }}</td>
						<td align="center">
							<div class="btn-group">
								<a href="{{ URL::to('dashboard/admin/' . $row->id . '/edit') }}" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
								<a href="{{ URL::to('delAdmin/' . $row->id) }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><span class="fa fa-trash"></span></a>
							</div>
						</td>
					</tr>
				@endforeach
			    </tbody>
			</table>
		</div>
	</div>
@stop