<!DOCTYPE html>
<html>
<head>
   @include('backend.includes.backend-head')
</head>
<body class="backend-body">
  <div class="container-fluid" style="height:91.9%;">
  	@yield('content')
  </div>
  @include('backend.includes.backend-foot')
</body>
</html>