<div class="panel panel-default">
    <div class="panel-heading add-post-heading">
        <h4 class="panel-title">Dokumen Grup <a href="#" id="showDokumenGrup" class="pull-right"><span class="glyphicon glyphicon-refresh"></span></a></h4>
    </div>
    <div class="panel-body">
        @if($infoGrup->nim == Session::get('user'))
            <div class="btn-group" style="margin-bottom: 10px;">
                <button type="button" class="custom-btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-plus-square"></i> Buat dokumen baru <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-toggle="modal" data-target="#tambahDokumenModal" id="googleDocs" onclick="buatDokumenGrup('docs')"> {{HTML::image('assets/images/docs.png','photo', array('height' => '30', 'width' => '30'))}} Google Docs</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#tambahDokumenModal" id="googleSheets" onclick="buatDokumenGrup('sheets')"> {{HTML::image('assets/images/spreadsheets.png','photo', array('height' => '30', 'width' => '30'))}} Google Sheets</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#tambahDokumenModal" id="googleSlides" onclick="buatDokumenGrup('slides')"> {{HTML::image('assets/images/slides.png','photo', array('height' => '30', 'width' => '30'))}} Google Slides</a></li>
                </ul>
            </div>
        @endif
        <div class="loader" id="dokumen-grup-loader"><i class="fa fa-circle-o-notch fa-spin"></i> Loading...</div>
        <div id="dokumenGrupList"></div>
    </div>
</div>

<!-- Modal Tambah Dokumen Grup -->
<div class="modal fade" id="tambahDokumenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Buat dokumen baru</h4>
            </div>
            <div class="modal-body">
                {{Form::open(array('id' => 'buat-dokumen-form'))}}
                <input type="hidden" id="mimetype" name="mimetype">
                <input type="hidden" id="kelas" name="kelas" value="{{Request::segment(3)}}">
                <input type="hidden" id="grup" name="grup" value="{{Request::segment(5)}}">
                <div class="input-group">
                    <span class="input-group-addon" id="logo"></span>
                    <input type="text" class="form-control" name="judul" placeholder="Nama dokumen" id="nama-dokumen">
                    <a href="#" class="btn btn-danger input-group-addon" onclick="makeFile()"> <i class="fa fa-spinner fa-spin" id="make-dokumen-loader" style="display: none"></i> Buat dokumen</a>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>