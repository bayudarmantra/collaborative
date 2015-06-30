<nav class="navbar user-navbar" role="navigation">
  <div class="container-fluid fixed-wrapper">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="col-md-2">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <?php
          if(Auth::user()->role == "mahasiswa")
            $link = "u/mahasiswa";
          else
            $link = "u/dosen";
        ?>
        <a class="navbar-brand" href="{{ URL::to($link) }}">{{ HTML::image('assets/images/logoFinal2.png','collaborative learning',array('class' => 'logo', 'width' => '80', 'height' => '55')) }}</a>
      </div>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <div class="col-md-8">
        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalKuisioner" style="margin-left: 40%; position: relative; top: 10px;">KUISIONER</a>
      </div>

    <div class="col-md-2">
        <ul class="nav navbar-nav navbar-right">

          <li class="dropdown hide" style="margin-top: 2px;">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="fa fa-bell fa-lg"></span></a><span class="badge badge-notify">4</span>
            <div class="dropdown-menu">
              <div class="dropdown-title">Notifications</div>
              <div class="dropdown-body">

                <div class="media notification">
                  <a class="pull-left" href="#">
                    <img class="media-object" src="holder.js/40x40" alt="...">
                  </a>
                  <div class="media-body">
                    <small>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet</small>
                  </div>
                </div>

                <div class="media notification">
                  <a class="pull-left" href="#">
                    <img class="media-object" src="holder.js/40x40" alt="...">
                  </a>
                  <div class="media-body">
                    <a href="#"><small>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet</small></a>
                  </div>
                </div>

                <div class="media notification">
                  <a class="pull-left" href="#">
                    <img class="media-object" src="holder.js/40x40" alt="...">
                  </a>
                  <div class="media-body">
                    <small>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet</small>
                  </div>
                </div>

                <div class="media notification">
                  <a class="pull-left" href="#">
                    <img class="media-object" src="holder.js/40x40" alt="...">
                  </a>
                  <div class="media-body">
                    <small>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet</small>
                  </div>
                </div>

              </div>
              <div class="dropdown-footer">See all</div>
            </div>
          </li>

          <li class="dropdown" style="margin-top: 2px;"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="fa fa-users fa-lg"></span></a><span class="badge badge-notify"></span>
            <div class="dropdown-menu">
              <div class="dropdown-title">Group Request</div>
              <div class="dropdown-body">
                  <div class="user-list" style="padding: 10px 0 10px 10px">

                  </div>
              </div>
              <div class="dropdown-footer">See all</div>
            </div>
          </li>

          <li class="dropdown" style="margin-top: 2px;"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <span class="fa fa-user fa-lg"></span></a>
           <div class="dropdown-menu user-dropdown">
              <div class="dropdown-bg">
                <img src="holder.js/100x100/sky" class="img img-thumbnail img-circle center-block">
                <span>Bayu Darmantra</span>
              </div>
              <div class="dropdown-footer">
                <a href="#" class="cs-btn blue animate pull-left">Setting</a>
                <a href="#" class="cs-btn blue animate pull-right">Sign out</a>
              </div>
            </div>
          </li>
        </ul>
      <li class="hide"><a href="#" id="getNotif">Get Notif</a></li>
    </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- Modal Kuisioner-->
<div class="modal fade" id="modalKuisioner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Kuisioner</h4>
      </div>
      <div class="modal-body">
        <span class="text-danger"><strong>Tolong lengkapi identitas dan jawab semua pertanyaan kuisioner, terima kasih</strong></span>
        <hr/>
        {{ Form::open() }}
        <div class="row">
          <div class="form-group col-md-8">
            {{ Form::label('nama', 'Nama Mahasiswa') }}
            {{ Form::text('nama', null, array('class' => 'form-control')) }}
          </div>

          <div class="form-group col-md-4">
            {{ Form::label('nim', 'Nomor Induk Mahasiswa') }}
            {{ Form::text('nim', null, array('class' => 'form-control')) }}
          </div>
        </div>
        <hr/>

        <div class="form-group">
          {{ Form::label('pertanyaan', '#1. lorem ipsum set amet dolor') }}
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-md-2 col-md-offset-1">
              {{ Form::radio('jawaban', 'Jawaban 1') }} Jawaban 1
            </div>

            <div class="col-md-2">
              {{ Form::radio('jawaban', 'Jawaban 1') }} Jawaban 1
            </div>

            <div class="col-md-2">
              {{ Form::radio('jawaban', 'Jawaban 1') }} Jawaban 1
            </div>

            <div class="col-md-2">
              {{ Form::radio('jawaban', 'Jawaban 1') }} Jawaban 1
            </div>

            <div class="col-md-2">
              {{ Form::radio('jawaban', 'Jawaban 1') }} Jawaban 1
            </div>
          </div>
        </div>
        <hr/>
        {{ Form::close() }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>