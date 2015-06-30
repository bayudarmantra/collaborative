<!DOCTYPE html>
<html>
<head>
   @include('backend.includes.backend-head')
</head>
<body class="backend-body">
  <div class="container-fluid" style="height:91.9%;">
  	@include('backend.includes.backend-header')
    <div class="row" style="height:100%;">
    	@include('backend.includes.backend-sidebar')
    	<div class="col-md-10 bck-content">
    		@include('backend.includes.backend-content-title')
    		@yield('content')
    	</div>
    </div>  
  </div>
  @include('backend.includes.backend-foot')
</body>
</html>

