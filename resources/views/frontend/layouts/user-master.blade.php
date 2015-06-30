<!DOCTYPE html>
<html>
<head>
   @include('frontend.includes.head')
</head>
<body class="user-body">
@include('frontend.includes.user-header')
  <div class="container-fluid">
  	<div class="row fixed-wrapper">
  		@include('frontend.includes.user-left-sidebar')
  		<div class="col-md-6">

			@if(Request::segment(3) == 'kelas' && Request::segment(5) == 'member' || Request::segment(4) == 'grup' && Request::segment(6) == 'member')
				@include('frontend.includes.top-menu')
				@include('frontend.includes.member-list')

			@elseif(Request::segment(3) == 'kelas' && Request::segment(5) == 'materi')
				@include('frontend.includes.top-menu')
				@include('frontend.includes.materi-list')

			@elseif(Request::segment(3) == 'kelas' && Request::segment(5) == 'tugas')
				@include('frontend.includes.top-menu')
				@include('frontend.includes.tugas-list')
			@elseif(Request::segment(3) == 'kelas' && Request::segment(5) == 'pengumuman')
				@include('frontend.includes.top-menu')
				@include('frontend.includes.pengumuman')
			@elseif(Request::segment(4) == 'grup' && Request::segment(6) == 'dokumen')
				@include('frontend.includes.top-menu')
				@include('frontend.includes.grup-file')

			@elseif(Request::segment(3) == 'kelas' || Request::segment(4) == 'grup')
				@include('frontend.includes.top-menu')
				@include('frontend.includes.user-add-post')
				@yield('content')
			@else
				@include('frontend.includes.user-add-post')
				@yield('content')
			@endif

  		</div>
  		@include('frontend.includes.user-right-sidebar')
  	</div>
  </div>

  @include('frontend.includes.foot')
</body>
</html>

