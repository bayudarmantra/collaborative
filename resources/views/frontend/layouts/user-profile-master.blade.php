<!DOCTYPE html>
<html>
<head>
   @include('frontend.includes.head')
</head>
<body class="user-body">
@include('frontend.includes.user-header')
  <div class="container-fluid">
    <div class="fixed-wrapper" style="width:800px;">
        @yield('content')
    </div>
  </div>

  @include('frontend.includes.foot')
</body>
</html>

