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

			@if(Request::segment(4) == 'kelas')
				@include('...includes.tugas-list')
			@endif

	  		@include('frontend.includes.user-add-post')
			@include('...includes.materi-list')
	  		@yield('content')
  		</div>
  		@include('frontend.includes.user-right-sidebar')
  	</div>
  </div>

  @include('frontend.includes.foot')
</body>
</html>

