@extends('app')

@section('content')
<div class="container-fluid">
	<div class="login-logo"></div>
	<div class="login-form">
		<div class="panel panel-danger">
			<div class="panel-heading">LOGIN</div>
			<div class="panel-body">
				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group">
						<div class="col-md-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
								<input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<button type="submit" class="custom-btn col-md-12">LOGIN</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="cloud-back"></div>
@endsection
