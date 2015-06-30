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
			            <th width="100">KODE KELAS</th>
			            <th>MATA KULIAH</th>
			            <th>JADWAL</th>
			            <th>DOSEN</th>
			            <th>MANAGE</th>
			        </tr>
			    </thead>
			    <tbody>
			    @foreach($perkuliahan as $key => $value)
			        <tr>
			            <td align="center">{{ $value->kodekelas }}</td>
			            <td>{{ $value->mk->namamk }}</td>
			            <td>{{ $value->hari }}, {{ $value->jam }}</td>
			            <td>{{ $value->dosen->nama }}</td>
			            <td align="center">
			            	<div class="btn-group">
							  <a href="{{ URL::to('dashboard/perkuliahan/'.$value->kodekelas) }}" class="btn btn-success"><span class="fa fa-user-plus"></span></a>
							  <a href="{{ URL::to('dashboard/perkuliahan/' . $value->kodekelas . '/edit') }}" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
							  <a href="#" class="btn btn-danger"><span class="fa fa-trash"></span></a>
							</div>
			            </td>
			        </tr>
			    @endforeach
			    </tbody>
			</table>
		</div>
	</div>
@stop