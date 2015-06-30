<!-- NAVBAR -->
<nav class="navbar user-navbar" role="navigation">
<div class="container-fluid wrapper-fixed">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="#">{{HTML::image('assets/images/logo2.png','Logo', array('class' => 'logo'))}}</a>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav pull-right">
    <li><a class="btn btn-primary" style="margin-top: 8px; padding: 5px" href="{{URL::to('auth/login')}}">Login</a></li>
  </ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array(
             'url' => 'dashboard/login',
             'class' => 'form-validator',
             'data-fv-framework' => 'bootstrap',
             'data-fv-message' => 'This value is not valid',
             'data-fv-feedbackicons-valid' => 'glyphicon glyphicon-ok',
             'data-fv-feedbackicons-invalid' => 'glyphicon glyphicon-remove',
             'data-fv-feedbackicons-validating' => 'glyphicon glyphicon-refresh'
           )) }}

        <div class="form-group">
          {{ Form::label('username', 'USERNAME') }}
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            {{ Form::text('username', Input::old('username'), array(
              'class' => 'form-control',
              'placeholder' => 'Enter username',
              'data-fv-notempty' => 'true',
              'data-fv-notempty-message' => 'Required'
              )) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('password', 'PASSWORD') }}
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            {{ Form::password('password', array(
              'class' => 'form-control',
              'placeholder' => 'Enter password',
              'data-fv-notempty' => 'true',
              'data-fv-notempty-message' => 'Required'
              )) }}
          </div>
        </div>

        <button type="submit" class="cs-btn blue animate">LOGIN</button>
        {{ Form::close() }}
      </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->