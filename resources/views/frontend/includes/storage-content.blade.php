@if(Session::has('access_token'))
    {{Form::hidden('email',$email,array('id' => 'userEmail'))}}
    {{Form::hidden('photo',$photo,array('id' => 'userPhoto'))}}
    {{Form::hidden('userId',$userId,array('id' => 'userId'))}}

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object img img-circle" src="{{$photo}}" alt="...">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$email}}</h4>
                    <button type="button" class="btn btn-default" id="taik">Disconnect</button>
                </div>
            </div>
        </div>
    </div>

        @foreach($result as $file)
            <div class="media" id="dokumen">
                <a class="pull-left" href="#">
                    @if($file->getThumbnailLink() == "")
                        {{HTML::image('assets/images/no-thumb.gif','photo', array('class' => 'media-object', 'height' => '80', 'width' => '70'))}}
                    @else
                        <img class="media-object" src="{{$file->getThumbnailLink()}}" width="70" height="80" alt="..." style="border: 1px solid #000">
                    @endif
                </a>
                <!-- Dokumen Grup -->
                @if(Request::segment(2) == "Tugas" && Request::segment(4) != 0)
                    <a href="{{ $file->getAlternateLink() }}" class="btn btn-default pull-right" target="_blank"><span class="fa fa-pencil-square-o"></span> Edit</a>
                @elseif(Request::segment(2) == "Tugas" && Request::segment(4) == 0)
                    <!-- Kumpul Tugas -->
                    <input type="radio" name="pilihTugas" class="pull-right" data-file="{{ $file->getId() }}" data-file-name="{{ $file->getTitle() }}" onchange="pilihTugas(this)"/>
                    <input type="hidden" id="fileId">
                    <input type="hidden" id="fileName">
                @endif

                <div class="media-body">
                    <a href="https://drive.google.com/file/d/{{$file->getId()}}/edit"><h4 class="media-heading"><img src="{{$file->getIconLink()}}"> {{$file->title}}</h4></a>
                    <ul class="list-unstyled">
                        <li><small><span class="fa fa-calendar"></span> {{ Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.uP', $file->getModifiedDate())->toDateString() }}</small></li>
                        <li><small><span class="glyphicon glyphicon-hdd"></span> {{ AppHelper::formatSizeUnits($file->getFileSize()) }}</small></li>
                    </ul>
                </div>
            </div>
            <hr/>
        @endforeach
@else
    <div class="notConnect">
        <div class="logoButton">
            {{HTML::image('assets/images/gdrive.png','photo', array('class' => 'img center-block', 'height' => '150', 'width' => '150'))}}
            <div class="center-block">Email: <strong>{{ $user }}</strong></div>
            <a href="{{ URL::to('googleAuth') }}" class="btn btn-danger center-block" onclick="window.open('{{ URL::to('googleAuth') }}', 'newWindow', 'width=500,height=500'); return false"><span><strong>CONNECT<i class="fa fa-google pull-right" style="margin-top: 2px; font-size: 18px;"></i></strong></span></a>
        </div>
    </div>
@endif
