@foreach($grup as $value)
    <a href="{{URL::to('u/mahasiswa/'.$value->kodekelas.'/grup/'.$value->id)}}" class="list-group-item sidebar-item"><span class="label label-primary">{{ $value->kodekelas  }}</span> {{ $value->nama }} <span class="fa fa-chevron-circle-right pull-right" style="position: relative; top:3px;"></span><div class="arrow-right pull-right"></div></a>
@endforeach