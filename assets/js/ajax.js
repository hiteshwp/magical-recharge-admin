$(document).ready(function() {
    let baseUrl = $("body").data("baseurl");
    $('#frmlogin').parsley();
    $("body").on("submit", "#frmlogin", function (e) {
        e.preventDefault();

        if($('#frmlogin').parsley().isValid())
        {
            $.ajax({  
                type:"POST",  
                data: $('#frmlogin').serialize(),
                dataType: "json",
                url:baseUrl+"login",  
                beforeSend: function(data){  
                    $('#btnlogin').attr('disabled',true);
                    $('#btnlogin').val('Please Wait..');
                },
                success:function(data){  
                    if( data.status == "Success" )
                    {
                        notif({
                            msg: "<b>Whoa! </b> "+data.msg,
                            type: "success"
                        });
                        setTimeout(function() {
                            window.location = baseUrl+"dashboard";
                        }, 3000);
                    }
                    else
                    {
                        $('#btnlogin').attr('disabled',false);
                        $('#btnlogin').val('Submit');
                        notif({
                            msg: "<b>Oops! </b>"+data.msg,
                            type: "error"
                        });
                    }
                }
            });
        }
    });
});