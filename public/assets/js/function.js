/*
* AJAX POST
* */

//Add Post
function addPost(url)
{
    $('#form-add-post').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: url,
            type: 'POST',
            data: $(this).serialize(),

            beforeSend: function(){
                $('#postBtn').val('Posting....');
            },

            error: function () {
                console.log('error');
            },

            success: function (data) {
                console.log('sukses');
                $('#showPost').trigger('click');
                $('#postBtn').val('Post');
            }
        });
    });
}

//Show Post
function showPost(url, kode, kodeGrup)
{
    $('#showPost').click(function(){
        $.ajax({
            url: url + '/kelas/' + kode + '/grup/' + kodeGrup,
            type: 'GET',
            dataType: 'html',

            beforeSend: function(){
                $('.loader').show().hide().fadeIn(500);
            },

            error: function (xhr, status, error) {
                $('#ajaxError').show().hide().fadeIn(500);
                $('.loader').fadeOut(500).hide();
            },

            success: function (data) {
                $('.loader').fadeOut(500).hide();
                $('#post-wrapper').html(data).hide().fadeIn(500);
                //$('#showPost').trigger('click');
            }
        });
    });
}

//Get Post ID
function getPostId(id)
{
    $('#postIdDel').val(id);
}



/*
* AJAX KOMENTAR
*/

//Get Komentar ID
function getKomentarId(id)
{
    $('#komentarIdDel').val(id);
}

/*Get Tugas ID*/
function getTugasId(id)
{
    $('#tugasIdDel').val(id);
}

/*Get Pengumuman ID*/
function getPengumumanId(id)
{
    $('#pengumumanIdDel').val(id);
}






