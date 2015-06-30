<div class="col-md-2 bck-sidebar">
	<div class="user">
		{{HTML::image('assets/images/user.png','photo', array('height' => '80', 'width' => '80', 'class' => 'img img-circle center-block'))}}
		<span>Bayu Darmantra</span>
	</div>

	<div class="list-group" id="list-group">
	  <a href="{{ URL::to('dashboard') }}" class="list-group-item">
	    <span class="fa fa-dashboard"></span>&nbsp;&nbsp; dashboard
	  </a>

		<a href="#" class="list-group-item hide" data-toggle="collapse" data-target="#admin">
			<span class="fa fa-user"></span>&nbsp;&nbsp; administrator<i class="caret pull-right" style="margin-top:7px;"></i>
		</a>
		<div id="admin" class="list-group collapse child">
			<a href="{{ URL::to('dashboard/admin/create') }}" class="list-group-item">
				<span class="fa fa-plus-circle"></span>&nbsp;&nbsp; tambah baru</a>
			<a href="{{ URL::to('dashboard/admin') }}" class="list-group-item">
				<span class="fa fa-table"></span>&nbsp;&nbsp; data administrator</a>
		</div>

	  <a href="#" class="list-group-item" data-toggle="collapse" data-target="#mhs">
	  <span class="fa fa-graduation-cap"></span>&nbsp;&nbsp; mahasiswa<i class="caret pull-right" style="margin-top:7px;"></i>
	  </a>
	  <div id="mhs" class="list-group collapse child">
		  <a href="{{ URL::to('dashboard/mahasiswa/create') }}" class="list-group-item">
		  <span class="fa fa-plus-circle"></span>&nbsp;&nbsp; tambah baru</a>
		  <a href="{{ URL::to('dashboard/mahasiswa') }}" class="list-group-item">
		  <span class="fa fa-table"></span>&nbsp;&nbsp; data mahasiswa</a>
	  </div>

	  <a href="#" class="list-group-item" data-toggle="collapse" data-target="#dosen">
	  <span class="fa fa-group"></span>&nbsp;&nbsp; dosen<i class="caret pull-right" style="margin-top:7px;"></i>
	  </a>
	  <div id="dosen" class="list-group collapse child">
		  <a href="{{ URL::to('dashboard/dosen/create') }}" class="list-group-item">
		  <span class="fa fa-plus-circle"></span>&nbsp;&nbsp; tambah baru</a>
		  <a href="{{ URL::to('dashboard/dosen') }}" class="list-group-item">
		  <span class="fa fa-table"></span>&nbsp;&nbsp; data dosen</a>
	  </div>

	  <a href="#" class="list-group-item" data-toggle="collapse" data-target="#mk">
	  <span class="fa fa-book"></span>&nbsp;&nbsp; mata kuliah<i class="caret pull-right" style="margin-top:7px;"></i>
	  </a>
	  <div id="mk" class="list-group collapse child">
		  <a href="{{ URL::to('dashboard/matakuliah/create') }}" class="list-group-item">
		  <span class="fa fa-plus-circle"></span>&nbsp;&nbsp; tambah baru</a>
		  <a href="{{ URL::to('dashboard/matakuliah') }}" class="list-group-item">
		  <span class="fa fa-table"></span>&nbsp;&nbsp; data mata kuliah</a>
	  </div>

	  <a href="#" class="list-group-item" data-toggle="collapse" data-target="#perkuliahan">
	  <span class="fa fa-calendar-o"></span>&nbsp;&nbsp; perkuliahan<i class="caret pull-right" style="margin-top:7px;"></i>
	  </a>
	  <div id="perkuliahan" class="list-group collapse child">
		  <a href="{{ URL::to('dashboard/perkuliahan/create') }}" class="list-group-item">
		  <span class="fa fa-plus-circle"></span>&nbsp;&nbsp; tambah baru</a>
		  <a href="{{ URL::to('dashboard/perkuliahan') }}" class="list-group-item">
		  <span class="fa fa-table"></span>&nbsp;&nbsp; data perkuliahan</a>
	  </div>
	</div>
</div>
