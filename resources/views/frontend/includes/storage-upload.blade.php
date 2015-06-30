@if(Auth::user()->role == "dosen")
<div class="panel panel-default">
    <div class="panel-heading add-post-heading">
        <h4 class="panel-title">
           Unggah Materi Perkuliahan
        </h4>
    </div>
    <div class="panel-body">
        <table class="table table-bordered" id="uploadQueue">
            <thead>
                <tr>
                    <td colspan="2" align="center">Nama file</td>
                    <td width="100" align="center">Ukuran</td>
                    <td width="40" colspan="2" align="center">Status</td>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <pre id="console"></pre>
        <div id="response"></div>
        <div id="filelist"></div>
    </div>
    <div class="panel-footer">
        <div class="row" style="margin-left:0px">
            <div id="container">
                <div class="pull-left" style="margin-right:10px">
                    {{Form::hidden('kelas', Request::segment(4), array('id' => 'kelas'))}}
                </div>
                <button type="button" id="pickfiles" class="custom-btn" disabled><i class="fa fa-plus-circle"></i> Tambah file</button>
                <button type="button" id="uploadfiles" class="custom-btn"><i class="fa fa-cloud-upload"></i> Unggah</button>
            </div>
        </div>
        <div class="pull-right"></div>
    </div>
</div>
@endif
