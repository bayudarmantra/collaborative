@extends('frontend.layouts.user-master')
@section('content')
<!-- CONTENT -->

<div class="content">
	<a href="#" id="showPost" class="pull-right hide">Show Post</a>
	<div class="content-body" id="post-wrapper">
		<div class="alert alert-danger" id="ajaxError" style="display: none"><strong>Oopss!!</strong> There is an error when processing</div>
		<div class="loader"><i class="fa fa-circle-o-notch fa-spin"></i> Loading...</div>

	</div><!-- content-body -->
</div><!-- content -->
<!-- END CONTENT -->
@stop