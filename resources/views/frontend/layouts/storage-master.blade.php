<!DOCTYPE html>
<html>
<head>
    @include('frontend.includes.head')
</head>
<body class="user-body">
@include('frontend.includes.user-header')
<div class="container-fluid">
    <div class="row fixed-wrapper">
        @include('frontend.includes.storage-sidebar')
        <div class="col-md-9">
            @if(Auth::user()->role == "dosen")
                @include('frontend.includes.storage-upload');
            @endif
            @include('frontend.includes.storage')
        </div>
    </div>
</div>

@include('frontend.includes.foot')
</body>
</html>

