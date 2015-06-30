<div class="container-fluid" style="background-color: #FFF; margin-top:10px;" >
    <div class="col-md-2 col-md-offset-5" style="position: relative; top: -20px;">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="add-post">
            <span class="fa-stack fa-2x">
              <i class="fa fa-circle fa-stack-2x"></i>
              <i class="fa fa-plus fa-stack-1x fa-inverse"></i>
            </span>
        </a>
    </div>
</div>

<div class="panel panel-default panel-collapse collapse" id="collapseOne">
    <div class="panel-heading add-post-heading">
      <h4 class="panel-title"><strong>BUAT POST BARU</strong></h4>
    </div>
    <div>
      <div class="panel-body add-post-wrapper">
        {{ Form::open(array(
            'id' => 'form-add-post'
        )) }}
		    <div class="form-group">
                {{Form::textarea('post', null, array(
                    'class' => 'form-control textarea animate-autosize',
                    'style' => 'resize:vertical',
                    'placeholder' => 'Buat post anda disini...',
                ))}}

		    </div>
		    <div class="form-group">
                @if(Auth::user()->role ==  "mahasiswa")
                    {{Form::hidden('creator-sts','mahasiswa')}}
                    <?php $kodekelas = $listPerkuliahan ?>
                @else
                    {{Form::hidden('creator-sts','dosen')}}
                    <?php $kodekelas = $perkuliahanDosen ?>
                @endif

                @if(Request::segment(4) == "grup")
                    {{Form::hidden('scope', 'grup')}}
                    {{Form::hidden('scope_id', Request::segment(5))}}
                @else
                    {{Form::hidden('scope', 'kelas')}}
                    {{Form::select('scope_id', $kodekelas, null, array('class' => 'form-control', 'style' => 'width:50%'))}}
                @endif
		    </div>
          <input type="submit" class="custom-btn" value="Post"/>
        {{ Form::close() }}
      </div>
    </div>
  </div>

