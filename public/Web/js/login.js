$(function() {
    $('#login').click(function(e) {
        e.preventDefault();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax({
                'url' : 'login',
                'data': {
                    'taikhoan' : $('#taikhoan').val(),
                    'password' : $('#matkhau').val()
                },
                'type' : 'POST',
                success: function (data) {
                    console.log(data);
                    if (data.error == true) {
                        $('.error').hide();
                        if (data.message.taikhoan != undefined) {
                            $('.errorTaikhoan').show().text(data.message.taikhoan[0]);
                        }
                        if (data.message.password != undefined) {
                            $('.errorPassword').show().text(data.message.password[0]);
                        }
                        if (data.message.errorlogin != undefined) {
                            $('.errorLogin').show().text(data.message.errorlogin[0]);
                        }
                    } else {
                        window.location.href = "http://localhost/authentication/public/"
                    }
                }
            });
    })
})