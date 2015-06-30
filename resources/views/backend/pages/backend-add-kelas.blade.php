@extends('backend.layouts.backend-master')
@section('content')
	<div class="row">
		<div class="col-md-7">
			<div class="panel panel-default bck-panel">
			  <div class="panel-heading">
			    <h3 class="panel-title">Tambah Kelas Perkuliahan</h3>
			  </div>
			  <div class="panel-body">
			    <form role="form">
			    	<fieldset>
			    		<legend>Data Personal</legend>
				    		<div class="form-group col-md-6" style="padding-left:0">
							    <label>Nama MK</label>
							    <input type="text" class="form-control" placeholder="Mata kuliah">
						    </div>

						    <div class="form-group col-md-6" style="padding-left:0">
					    		<label>Kelas</label>
					    		<input type="text" class="form-control" placeholder="Kelas">
					    	</div>

						    <div class="form-group col-md-6" style="padding-left:0">
							    <label>Jam Perkuliahan</label>
							    <input type="text" class="form-control" placeholder="Jam Perkuliahan" data-mask="99.99 - 99.99">
						    </div>

					    	<div class="form-group col-md-6" style="padding-left:0">
					    		<label>Ruangan</label>
					    		<input type="text" class="form-control" placeholder="Ruang kelas">
					    	</div>

					    	<div class="form-group">
					    		<label>Dosen</label>
					    		<input type="text" class="form-control" placeholder="Dosen Pengajar">
					    	</div>   
			    	</fieldset>	    
			    </form>
			  </div>
			  <div class="panel-footer">
			  		<input type="submit" class="cs-btn blue animate" value="Submit">
			  </div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="panel panel-default bck-panel">
			  <div class="panel-heading">
			    <h3 class="panel-title">Panel title</h3>
			  </div>
			  <div class="panel-body">
			    Panel content
			  </div>
			</div>
		</div>
	</div>
@stop