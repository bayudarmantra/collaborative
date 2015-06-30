<!-- javascript -->
{{ HTML::script('assets/js/jquery-1.11.1.min.js'); }}
{{ HTML::script('assets/js/bootstrap.min.js'); }}
{{ HTML::script('assets/js/jquery.autosize.min.js'); }}
{{ HTML::script('assets/js/jquery.form.min.js'); }}
{{ HTML::script('assets/js/function.js');}}
{{ HTML::script('assets/js/plupload.full.min.js'); }}
{{ HTML::script('assets/js/readmore.min.js'); }}
{{ HTML::script('assets/js/bootstrap-timepicker.min.js'); }}
{{ HTML::script('assets/js/bootstrap-datepicker.js'); }}
{{ HTML::script('assets/js/bootstrap-datepicker.id.js'); }}
{{ HTML::script('assets/js/moment-with-locales.min.js'); }}
{{ HTML::script('assets/js/wow.min.js'); }}
{{ HTML::script('assets/js/pusher.min.js'); }}

<script type="text/javascript">
    function testNotif()
    {
        console.log('loaded');
        var pusher = new Pusher('0867723453d030ee5279');
        var notificationsChannel = pusher.subscribe('collab');
        notificationsChannel.bind('notif', function(notification){
            // assign the notification's message to a <div></div>
            var message = notification.message;
            $('div.notification').text(message);
        });
    }

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1){
            $('.home-header').addClass("sticky");
        }
        else{
            $('.home-header').removeClass("sticky");
        }
    });

    new WOW().init();

    $(document).ready(function(){
        testNotif();
    });

    $(window).load(function(e) {
        //$('#google').trigger('click');
        //$('#getUserInfo').trigger('click');

        $('#showGrup').trigger('click');
        $('#showPost').trigger('click');
        showPengumuman();

        if (window.location.href.indexOf("tugas") > -1)
        {
            $('#showTugas').trigger('click');
        }else if (window.location.href.indexOf("materi") > -1)
        {
            showMateri();
        }else if (window.location.href.indexOf("dokumen") > -1)
        {
            showDokumenGrup();
        }

        timePicker();
        datePicker();
        readMore();
        autoSize();
    });

    $(document).ajaxComplete(function(event, xhr, settings) {
       timePicker();
       datePicker();
       readMore();
       autoSize();
    });
</script>

<script type="text/javascript">
    /*Readmore*/
    function readMore()
    {
        $('article').readmore({
            collapsedHeight: 100,
            moreLink: '<a href="#">Lihat detail</a>',
            lessLink: '<a href="#">Tutup</a>'
        });
    }

    /*Timepicker*/
    function timePicker()
    {
        $('#timepicker1').timepicker();
    }


    /*Datepicker*/
    function datePicker()
    {
        $('.input-group.date').datepicker({
            format: "yyyy-mm-dd",
            autolose: true,
            //language: "id",
            todayHighlight: true
        });
    }

    /*Add tugas*/
    $('#form-add-tugas').submit(function(e){
        e.preventDefault();
        var id = $('#tugas-kelas').val();
    $.ajax({
        url: '{{ URL::to('addtugas') }}' + '/' + id,
        type:'POST',
        data: $(this).serialize(),
        error:function()
        {
          console.log('error');
        },

        success:function(data)
        {
          console.log('sukses');
        }
    });
  });

   /*Show tugas*/
   $('#showTugas').click(function(){
       var kode = $('#tugas-kelas').val();
       $.ajax({
           url: '{{ URL::to('showTugas') }}' + '/' + kode,
           type: 'GET',
           dataType: 'html',

           beforeSend: function(){
               $('#tugas-loader').show().hide().fadeIn(500);
           },

           error: function () {
              // $('#ajaxError').show().hide().fadeIn(500);
               $('#tugas-loader').fadeOut(500).hide();
           },

           success: function (data) {
               $('#tugas-loader').fadeOut(500).hide();
               $('#tugasList').html(data).hide().fadeIn(500);
           }
       });
   });

    getTugasId(id);

    function showTugasById(id)
    {
        $.ajax({
            url: '{{URL::to('showTugasById')}}' + '/' + id,
            type: 'GET',
            dataType: 'json',

            beforeSend: function(){

            },

            error: function () {
                console.log('error');
            },

            success: function (data) {
                $('#judulTugas').val(data['judul']);
                $('#deskripsi').val(data['deskripsi']);

                var tgl = moment(data['pengumpulan']).locale('id').format('DD MMMM YYYY');
                $('#tglKumpul').val(tgl);

                var jam = moment(data['pengumpulan']).locale('en').format('hh:mm A');
                $('#timepicker1').val(jam);

                $('#tugasId').val(data['id']);
            }
        });
    }

    //Update Tugas
    function updateTugas()
    {
        var id = $('#tugasId').val();
        $.ajax({
            url: '{{ URL::to('updateTugas') }}' + '/' + id,
            type: 'POST',
            data: $('#form-edit-tugas').serialize(),

            beforeSend: function(){

            },

            error: function () {
                console.log('error');
            },

            success: function (data) {
                console.log('sukses');
                $('#editTugasModal').modal('hide');
                $('#editTugasModal').on('hidden.bs.modal', function (e) {
                    $('#showTugas').trigger('click');
                })
            }
        });
    }

    //Delete Tugas
    function deleteTugas()
    {
        var id = $('#tugasIdDel').val();
        $.ajax({
            url: '{{ URL::to('deleteTugas') }}' + '/' + id,
            type: 'POST',
            data:{
                "_token":"{{ csrf_token() }}"
            },

            beforeSend: function(){

            },

            error: function () {
                console.log('error');
            },

            success: function (data) {
                $('#confirmDeleteTugasModal').modal('hide');
                $('#confirmDeleteTugasModal').on('hidden.bs.modal', function (e) {
                    $('#showTugas').trigger('click');
                })
            }
        });
    }

    /*Add Pengumuman*/
    function addPengumuman(){
        var id = $('#kelasPengumuman').val();
        $.ajax({
            url: '{{ URL::to('addPengumuman') }}' + '/' + id,
            type:'POST',
            data: $('#form-add-pengumuman').serialize(),
            error:function()
            {
                console.log('error');
            },

            success:function(data)
            {
                console.log('sukses');
            }
        });
    }

    /*Show Pengumuman*/
   function showPengumuman(){
        var kode = $('#kelasPengumuman').val();
        $.ajax({
            url: '{{ URL::to('showPengumuman') }}' + '/' + kode,
            type: 'GET',
            dataType: 'html',

            beforeSend: function(){
                $('#pengumuman-loader').show().hide().fadeIn(500);
            },

            error: function () {
                // $('#ajaxError').show().hide().fadeIn(500);
                $('#pengumuman-loader').fadeOut(500).hide();
            },

            success: function (data) {
                $('#pengumuman-loader').fadeOut(500).hide();
                $('#pengumumanList').html(data).hide().fadeIn(500);
            }
        });
    }

    /*Show Pengumuman By Id*/
    getTugasId(id);

    function showPengumumanById(id)
    {
        $.ajax({
            url: '{{URL::to('showPengumumanById')}}' + '/' + id,
            type: 'GET',
            dataType: 'json',

            beforeSend: function(){

            },

            error: function () {
                console.log('error');
            },

            success: function (data) {
                $('#judulPengumuman').val(data['judul']);
                $('#isiPengumuman').val(data['isi']);

                var tgl = moment(data['waktuaktif']).locale('id').format('DD MMMM YYYY');
                $('#waktuaktif').val(tgl);

                $('#pengumumanId').val(data['id']);
            }
        });
    }
    /*Update Pengumuman*/
    function updatePengumuman()
    {
        var id = $('#pengumumanId').val();
        $.ajax({
            url: '{{ URL::to('updatePengumuman') }}' + '/' + id,
            type: 'POST',
            data: $('#form-edit-pengumuman').serialize(),

            beforeSend: function(){

            },

            error: function () {
                console.log('error');
            },

            success: function (data) {
                console.log('sukses');
                $('#editPengumumanModal').modal('hide');
                $('#editPengumumanModal').on('hidden.bs.modal', function (e) {
                    showPengumuman();
                })
            }
        });
    }

    /*Delete Pengumuman*/
    function deletePengumuman()
    {
        var id = $('#pengumumanIdDel').val();
        $.ajax({
            url: '{{ URL::to('deletePengumuman') }}' + '/' + id,
            type: 'POST',
            data:{
                "_token":"{{ csrf_token() }}"
            },

            beforeSend: function(){

            },

            error: function () {
                console.log('error');
            },

            success: function (data) {
                $('#confirmDeletePengumumanModal').modal('hide');
                $('#confirmDeletePengumumanModal').on('hidden.bs.modal', function (e) {
                    showPengumuman();
                })
            }
        });
    }

    /*Kumpul Tugas (Load Google Drive)*/
    function loadKumpulTugas(tugasId)
    {
        var kelas = "{{ Request::segment(4) }}";
        var grup = 0;

        $.ajax({
            url: '{{ URL::to('getUser') }}' + '/' + 'Tugas' + '/' + kelas + '/' + grup + '/' + tugasId,
            type: 'GET',
            dataType: 'html',

            beforeSend: function(){
                $('#tugasGDrive').html('');
                $('#kumpul-tugas-loader').show().hide().fadeIn(500);
            },

            error: function () {
                // $('#ajaxError').show().hide().fadeIn(500);
                $('#kumpul-tugas-loader').fadeOut(500).hide();
            },

            success: function (data) {
                $('#kumpul-tugas-loader').fadeOut(500).hide();
                $('#tugasGDrive').html(data).hide().fadeIn(500);
                $('#kelas').val(kelas);
                $('#kumpulTugasId').val(tugasId);
            }
        });
    }

    /*Pengumpulan*/
    function loadPengumpulan(tugasId)
    {

       var kelas = "{{ Request::segment(4) }}";
       var grup = -1;

        $.ajax({
            url: '{{ URL::to('getUser') }}' + '/' + 'Tugas' + '/' + kelas + '/' + grup + '/' + tugasId,
            type: 'GET',
            dataType: 'html',

            beforeSend: function(){
                $('#pengumpulan-tugas').html('');
                $('#pengumpulan-tugas-loader').show().hide().fadeIn(500);
            },

            error: function () {
                // $('#ajaxError').show().hide().fadeIn(500);
                $('#pengumpulan-tugas-loader').fadeOut(500).hide();
            },

            success: function (data) {
                $('#pengumpulan-tugas-loader').fadeOut(500).hide();
                $('#pengumpulan-tugas').html(data).hide().fadeIn(500);
                $('#pengumpulanTugasId').val(tugasId);
            }
        });
    }

    function kumpulTugas()
    {
        var fileId = $('#fileId').val();
        var kelas = $('#kelas').val();
        var tugasId = $('#kumpulTugasId').val();
        var fileName = $('#fileName').val();

        $.ajax({
            url: '{{ URL::to('kumpulTugas') }}' + '/' + kelas + '/' + fileId + '/' + fileName + '/' + tugasId,
            type: 'POST',
            data:{
                "_token":"{{ csrf_token() }}"
            },

            beforeSend: function(){
                //$('#tugasGDrive').html('');
                //$('#kumpul-tugas-loader').show().hide().fadeIn(500);
            },

            error: function () {
                // $('#ajaxError').show().hide().fadeIn(500);
                //$('#kumpul-tugas-loader').fadeOut(500).hide();
            },

            success: function (data) {
                //$('#kumpul-tugas-loader').fadeOut(500).hide();
                //$('#tugasGDrive').html(data).hide().fadeIn(500);
                console.log('sukses');
            }
        });
    }

    function pilihTugas(obj)
    {
       $('#fileId').val(obj.getAttribute('data-file'));
       $('#fileName').val(obj.getAttribute('data-file-name'));
    }

    /*Dokumen Grup*/
    function showDokumenGrup()
    {
        var kelas = "{{ Request::segment(3) }}";
        var grup = "{{ Request:: segment(5) }}";
        var tugasId = 0;

        $.ajax({
            url: '{{ URL::to('getUser') }}' + '/' + 'Tugas' + '/' + kelas + '/' + grup + '/' + tugasId,
            type: 'GET',
            dataType: 'html',

            beforeSend: function(){
                //$('#dokumenGrupList').html('');
                $('#dokumen-grup-loader').show().hide().fadeIn(500);
            },

            error: function () {
                // $('#ajaxError').show().hide().fadeIn(500);
                $('#dokumen-grup-loader').fadeOut(500).hide();
            },

            success: function (data) {
                $('#dokumen-grup-loader').fadeOut(500).hide();
                $('#dokumenGrupList').html(data).hide().fadeIn(500);
                eval("("+data+")");
            }
        });
    }

    function buatDokumenGrup(type)
    {
        if(type == "docs")
        {
            $('#logo').html('{{HTML::image('assets/images/docs.png','photo', array('height' => '20', 'width' => '20'))}}');
            $('#mimetype').val('application/vnd.google-apps.document');
        }else if(type == "sheets")
        {
            $('#logo').html('{{HTML::image('assets/images/spreadsheets.png','photo', array('height' => '20', 'width' => '20'))}}');
            $('#mimetype').val('application/vnd.google-apps.spreadsheet');
        }else{
            $('#logo').html('{{HTML::image('assets/images/slides.png','photo', array('height' => '20', 'width' => '20'))}}');
            $('#mimetype').val('application/vnd.google-apps.presentation');
        }
    }

    function makeFile()
    {
        $.ajax({
            url: '{{ URL::to('makeFile') }}',
            type:'POST',
            data: $('#buat-dokumen-form').serialize(),

            beforeSend:function()
            {
                $('#make-dokumen-loader').show().hide().fadeIn(500);

            },

            error:function()
            {
                console.log('error');
            },

            success:function(data)
            {
                $('#make-dokumen-loader').fadeOut(500).hide();
                $('#tambahDokumenModal').modal('hide');
                $('#nama-dokumen').val("");
                showDokumenGrup();
            }
        });
    }

    /*Materi*/
    function showUploadForm()
    {
        $.ajax({
            url: '{{ URL::to('getUploadForm') }}',
            type: 'GET',
            dataType: 'html',

            beforeSend: function(){
                $('#upload-loader').show().hide().fadeIn(500);
            },

            error: function () {
                // $('#ajaxError').show().hide().fadeIn(500);
                $('#upload-loader').fadeOut(500).hide();
            },

            success: function (data) {
                $('#upload-loader').fadeOut(500).hide();
                $('#upload-panel').html(data).hide().fadeIn(500);
            }
        });
    }

    function showMateri()
    {
        var kelas = "{{ Request::segment(4) }}";
        var grup = 0;
        var tugasId

        $.ajax({
            url: '{{ URL::to('getUser') }}' + '/' + 'Materi' + '/' + kelas + '/' + grup + '/' + tugasId,
            type: 'GET',
            dataType: 'html',

            beforeSend: function(){
                $('#materiList').html('');
                $('#materi-loader').show().hide().fadeIn(500);
            },

            error: function () {
                // $('#ajaxError').show().hide().fadeIn(500);
                $('#materi-loader').fadeOut(500).hide();
            },

            success: function (data) {
                $('#materi-loader').fadeOut(500).hide();
                $('#materiList').html(data).hide().fadeIn(500);
                showUploadForm();
            }
        });
    }
</script>

<!-- Elastic Textarea -->
<script>
 function autoSize()
{
    $('.textarea').autosize();
    $('.animate-autosize').autosize();
}
</script>

<script type="text/javascript">
	$('[data-toggle="tooltip"]').tooltip();   
</script>

<script type="text/javascript">
	// Add Fade in animation to dropdown
	$('.dropdown').on('show.bs.dropdown', function(e){
	  $(this).find('.dropdown-menu').first().stop(true, true).fadeToggle(300);
	});

	// Add Fade out animation to dropdown
	$('.dropdown').on('hide.bs.dropdown', function(e){
	  $(this).find('.dropdown-menu').first().stop(true, true).fadeToggle(300);
	});
</script>

<!--Add Grup-->
<script type="text/javascript">
  $('#add-grup').submit(function(e){
    e.preventDefault();
    $.ajax({
        url: '{{ URL::to('add-grup') }}',
        type:'POST',
        data: $(this).serialize(),
        error:function()
        {
          console.log('error');
        },

        success:function(data)
        {
            $('#addGrup').modal('hide');
            $('#addGrup').on('hidden.bs.modal', function (e) {
                $('#showGrup').trigger('click');
            })
        }
    });
  });
</script>

<script type="text/javascript">
	$('#test').on('hidden.bs.modal', function (e) {
  
})
</script>

<script type="text/javascript">
    $('#getUserInfo').click(function(){
        var userEmail = $('#userEmail').val();
        var userPhoto = $('#userPhoto').val();
        var userId = $('#userId').val();

        $('#setEmail').html(userEmail).hide().fadeIn(500);
        $('#setPhoto').attr('src', userPhoto);
        $('#setId').html(userId).hide().fadeIn(500);
    });

    $('#google').click(function(){
        $.ajax({
            url: '{{ URL::to('getUser') }}',
            type: 'GET',
            dataType: 'html',

            beforeSend: function(){
                $('.loader').show().hide().fadeIn(500);
            },

            error: function () {
                $('#ajaxError').show().hide().fadeIn(500);
                $('.loader').fadeOut(500).hide();
            },

            success: function (data) {
                $('.loader').fadeOut(500).hide();
                $('#google-wrapper').html(data).hide().fadeIn(500);
                $('#getUserInfo').trigger('click');
            }
        });
    });
</script>

<script type="text/javascript">
    //Post
    if( '{{Request::segment(3)}}' == 'kelas')
    {
        var kode = '{{Request::segment(4)}}';
        var kodeGrup = 0;
    }else if('{{Request::segment(4)}}' == 'grup') {
        var kode = '{{Request::segment(3)}}';
        var kodeGrup = '{{Request::segment(5)}}';
    }else{
        var kodeGrup = -1;
    }
    showPost('{{ URL::to('showPost') }}', kode, kodeGrup);
    addPost('{{ URL::to('addPost') }}');
    getPostId(id);

    //Komentar
    getKomentarId(id);
</script>

<script type="text/javascript">
    //Show Post by ID
    function showPostById(id)
    {
        $.ajax({
            url: '{{URL::to('showPostByID')}}' + '/' + id,
            type: 'GET',
            dataType: 'json',

            beforeSend: function(){

            },

            error: function () {
                console.log('error');
            },

            success: function (data) {
                $('#editPost').val(data['isi']);
                $('#postId').val(data['id']);
            }
        });
    }

    //Show Komentar by ID
    function showKomentarById(id)
    {
        $.ajax({
            url: '{{ URL::to('showKomentarByID') }}' + '/' + id,
            type: 'GET',
            dataType: 'json',

            beforeSend: function(){

            },

            error: function () {
                console.log('error');
            },

            success: function (data) {
                $('#editKomentar').val(data['isi']);
                $('#komentarId').val(data['id']);
            }
        });
    }

    //Update Post
    function updatePost()
    {
        var id = $('#postId').val();
        $.ajax({
            url: '{{ URL::to('updatePost') }}' + '/' + id,
            type: 'POST',
            data: $('#form-edit-post').serialize(),

            beforeSend: function(){

            },

            error: function () {
                console.log('error');
            },

            success: function (data) {
                console.log('sukses');
                $('#editPostModal').modal('hide');
                $('#editPostModal').on('hidden.bs.modal', function (e) {
                    $('#showPost').trigger('click');
                })
            }
        });
    }

    //Delete Post
    function deletePost()
    {
        var id = $('#postIdDel').val();
        $.ajax({
            url: '{{ URL::to('deletePost') }}' + '/' + id,
            type: 'POST',
            data:{
                "_token":"{{ csrf_token() }}"
            },

            beforeSend: function(){

            },

            error: function () {
                console.log('error');
            },

            success: function (data) {
                $('#confirmDeletePostModal').modal('hide');
                $('#confirmDeletePostModal').on('hidden.bs.modal', function (e) {
                    $('#showPost').trigger('click');
                })
            }
        });
    }

    //Add Komentar
    function addKomentar (id) {
        $.ajax({
            url: '{{ URL::to('addKomentar') }}' + '/' + id,
            type: 'POST',
            data: $('form[data-id=' +id+ ']').serialize(),
            error: function () {
                console.log('error');
            },

            success: function (data) {
                console.log('sukses');
                $('#showPost').trigger('click');
            }
        });
    }

    //Update Komentar
    function updateKomentar()
    {
        var id = $('#komentarId').val();
        $.ajax({
            url: '{{ URL::to('updateKomentar') }}' + '/' + id,
            type: 'POST',
            data: $('#form-edit-komentar').serialize(),

            beforeSend: function(){

            },

            error: function () {
                console.log('error');
            },

            success: function (data) {
                console.log('sukses');
                $('#editKomentarModal').modal('hide');
                $('#editKomentarModal').on('hidden.bs.modal', function (e) {
                    $('#showPost').trigger('click');
                })
            }
        });
    }

    //Delete Komentar
    function deleteKomentar()
    {
        var id = $('#komentarIdDel').val();
        $.ajax({
            url: '{{ URL::to('deleteKomentar') }}' + '/' + id,
            type: 'POST',
            data:{
                "_token":"{{ csrf_token() }}"
            },

            beforeSend: function(){

            },

            error: function () {
                console.log('error');
            },

            success: function (data) {
                $('#confirmDeleteKomentarModal').modal('hide');
                $('#confirmDeleteKomentarModal').on('hidden.bs.modal', function (e) {
                    $('#showPost').trigger('click');
                })
            }
        });
    }

</script>


<script>
 $('#add-link a#tee').click(function (){
    console.log('test');
        var link = $('#hyperlink').val();
        var text = $('#txtDisplay').val();
      $('#link-wrapper').append('<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom:10px">'
        + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
        + '<span class="glyphicon glyphicon-link"></span> ' + '<a href="' + link + '">' + text + '</a></div>');
  });
</script>

<script type="text/javascript">
   $('#add-link a#ee').click(function (){
        //e.preventDefault();
        console.log('test');
        var link = $('#hyperlink').val();
        var text = $('#txtDisplay').val();

        $('#link-wrapper').append(
            "
            <div class=\"alert alert-danger alert-dismissible\" role=\"alert\" style=\"margin-bottom:10px\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <span class=\"glyphicon glyphicon-link\"></span> <a href=" + link + ">" + text + "</a>     
            </div>
            "
        );

       // $('#link-wrapper').append("test");
    });

</script>


<script type="text/javascript">
    /*Get Kelas Member for grup member add*/
    $('#add-member').click(function (){
        var id = $('#add-member-kode').val();
        var id_grup = $('#grup-kode').val();
        $.ajax({
            url: '{{ URL::to('getKelasMember') }}' + '/' + id + '/' + id_grup,
            type: 'GET',
            dataType: 'HTML',

            beforeSend: function(){
                $('.loader').show().hide().fadeIn(500);
            },

            error: function () {
                console.log('error');
                $('.loader').fadeOut(500).hide();
            },

            success: function (data) {
                $('.loader').fadeOut(500).hide();
                $('#grupMemberAdd').html(data).hide().fadeIn(500);
            }
        });
    });

    /*Invite member to group*/
    function inviteToGrup(obj)
    {
        $.ajax({
            url: '{{ URL::to('inviteMember') }}',
            type: 'POST',
            data: $('#form-invite-member').serialize(),

            beforeSend: function(){

            },

            error: function () {
                console.log('error');
            },

            success: function (data) {
                obj.setAttribute('class', 'hide');
                $('#undang').addClass('show');
            }
        });
    }

    /*Get Invite Notifications*/
    $('#getNotif').click(function (){
        $.ajax({
            url: '{{ URL::to('getInviteNotif') }}',
            type: 'GET',
            dataType: 'HTML',

            beforeSend: function(){

            },

            error: function () {
                console.log('error');
            },

            success: function (data) {
                $('.user-list').html(data);
            }
        });
    });

    /*Invite Accept*/
    function inviteAccept(id, notif_id)
    {
        $.ajax({
            url: '{{ URL::to('addMemberGrup') }}' + '/' + id + '/' + notif_id,
            type: 'POST',
            data: $('#form-add-grup-member').serialize(),

            beforeSend: function(){

            },

            error: function () {
                console.log('error');
            },

            success: function (data) {
                console.log('sukses');
            }
        });
    }

    /*Invite Decline*/
    function inviteDecline(id)
    {
        $.ajax({
            url: '{{ URL::to('inviteDecline') }}' + '/' + id,
            type: 'POST',
            data: $('#form-add-grup-member').serialize(),

            beforeSend: function(){

            },

            error: function () {
                console.log('error');
            },

            success: function (data) {
                console.log('sukses');
            }
        });
    }

    /*Show Grup List*/
    $('#showGrup').click(function(){
        $.ajax({
            url: '{{ URL::to('grupList') }}',
            type: 'GET',
            dataType: 'HTML',

            beforeSend: function(){

            },

            error: function () {
                console.log('error');
            },

            success: function (data) {
                $('#grupList').html(data);
            }
        });
    });
</script>

<script type="text/javascript">
    $(function() {
        $('#form-upload').ajaxForm({
            beforeSubmit: ShowProgress,
            uploadProgress: showUpload,
            success: SubmitSuccesful,
            error: AjaxError
        });
    });

    function ShowProgress(event, position, total, percentComplete) {
        var percent = '0%';
        $('#progress .progress-bar').width(percent);
    }

    function showUpload(){
        var percent = percentComplete + '%';
        $('#progress .progress-bar').width(percent);
    }

    function AjaxError() {
        alert("An AJAX error occured.");
    }

    function SubmitSuccesful(responseText, statusText) {
        var percent = '100%';
        var storagePath = 'http://localhost:8000/assets/upload/';

        $('#progress .progress-bar').width(percent);

        $('#photo').attr('src',storagePath + responseText);
    }


/*Upload to Google Drive*/
    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });

    $(document).ready( function() {
        $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
            console.log(numFiles);
            console.log(label);
        });
    });
</script>

<script type="text/javascript">
    var uploader = '';
        if($('#kelas').val() != "")
        {
           $('#pickfiles').prop('disabled', false);
            uploader = new plupload.Uploader({
                browse_button: 'pickfiles', // this can be an id of a DOM element or the DOM element itself
                url: '{{URL::to('testupload')}}',
                multipart_params: {kelas: $('#kelas').val()}
            });

            uploader.init();

            uploader.bind('FilesAdded', function(up, files) {
                console.log(files);
                var deleteHandle = function(uploaderObject, fileObject) {
                    return function(event) {
                        event.preventDefault();
                        uploaderObject.removeFile(fileObject);
                        $("table#uploadQueue tbody tr#" + fileObject.id).remove();
                    };
                };

                plupload.each(files, function(file) {
                    $("table#uploadQueue tbody").append(
                            '<tr id="' + file.id + '">' + '<td width="10" align="center"><span class="glyphicon glyphicon-file"</span></td>' + '<td>' + file.name + '</td><td align="center">' + plupload.formatSize(file.size) + '</td><td id="progress" align="center"><i class="fa fa-upload"></i></td>'+
                            '<td align="center" width="10"><a href="#"  id="deleteFile' + file.id + '"><span class="glyphicon glyphicon-trash"></span></a></td></tr>'
                    );
                    $('#deleteFile' + file.id).click(deleteHandle(up, file));
                });
            });

            uploader.bind('UploadProgress', function(up, file) {
                $("table#uploadQueue tr#" + file.id).find('td#progress').html('<i class="fa fa-spinner fa-pulse"></i>');
                //document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
                //<i class="fa fa-spinner fa-pulse"></i>
                //'<td>'+ file.percent +'%</td>
            });

            uploader.bind('Error', function(up, err) {
                document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
            });

            uploader.bind('FileUploaded', function(up, file){
                $("table#uploadQueue tr#" + file.id).find('td#progress').hide().fadeIn(500).html('<i class="fa fa-check" style="color:#2ca02c"></i>');
            });

            uploader.bind('UploadComplete', function(up, response){
                showMateri();
                //console.log(response['id']);
                //$("table#uploadQueue tr").remove();
            });

            document.getElementById('uploadfiles').onclick = function() {
                uploader.start();
            };
        }else{
            $('#pickfiles').prop('disabled', true);
            uploader.destroy();
        }
</script>

<script type="text/javascript">
    $('#getPost').click(function () {
        var id = $('#getNim').val();
        $.ajax({
            url: '{{ URL::to('getPost') }}' + '/' + id,
            type: 'GET',
            dataType: 'json',
            error: function () {
                console.log('error');
            },

            success: function (response) {
                $.each(response, function (i, data) {
                    if(data['foto'] != ''){

                    }
                });
            }
        });
    });

    //Ubah Profil
    $('#ubah-profil').click(function(){
        var id = $('#mahasiswaId').val();
        $.ajax({
            url: '{{ URL::to('updateMahasiswa') }}' + '/' + id,
            type: 'GET',
            data:$('#form-mahasiswa').serialize(),

            beforeSend: function(){

            },

            error: function () {
                console.log('error');
            },

            success: function (data) {
               console.log('sukses');
            }
        });
    });

</script>

