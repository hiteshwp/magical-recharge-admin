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
                async: false,
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

    $(".txtcountry").on("change", function () {
        let country_id = $(this).val();
        let createUserCsrfName = $("#frmstoreuserdata").data('tn');
        let createUserCsrfHash = $("#frmstoreuserdata").data('tnv');

        if( country_id != "" )
        {
            $.ajax({  
                type:"POST",  
                data: {
                    action: "act_get_state",
                    country_id : country_id,
                    [createUserCsrfName]:createUserCsrfHash,
                },
                dataType: "json",
                async: false,
                url:baseUrl+"user/act-get-state",  
                beforeSend: function(data){  
                    $('.txtstate').html('<option value="">Loading...</option>');
                },
                success:function(data){  
                    if( data.status == "Success" )
                    {
                        $('.txtstate').html(data.data);
                    }
                    else
                    {
                        alert(data.message);
                    }
                }
            });
        }
    });

    $(".txtstate").on("change", function () {
        let state_id = $(this).val();
        let createUserCsrfName = $("#frmstoreuserdata").data('tn');
        let createUserCsrfHash = $("#frmstoreuserdata").data('tnv');

        if( state_id != "" )
        {
            $.ajax({  
                type:"POST",  
                data: {
                    action: "act_get_city",
                    state_id : state_id,
                    [createUserCsrfName]:createUserCsrfHash,
                },
                dataType: "json",
                async: false,
                url:baseUrl+"user/act-get-city",  
                beforeSend: function(data){  
                    $('.txtcity').html('<option value="">Loading...</option>');
                },
                success:function(data){  
                    if( data.status == "Success" )
                    {
                        $('.txtcity').html(data.data);
                    }
                    else
                    {
                        alert(data.message);
                    }
                }
            });
        }
    });

    $("#frmstoreuserdata").parsley();

    let userajaxurl = baseUrl+"user/get-user-list";
    let userCsrfName = jQuery("#user-datatable-list").data('tn');
    let userCsrfHash = jQuery("#user-datatable-list").data('tnv');
    let usertable = $("#user-datatable-list").DataTable({
        buttons: [ 'excel', 'pdf' ],
        scrollX: "100%",
        order: [[ 0, "desc" ]],
        responsive: false,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            loadingRecords: '&nbsp;',
            processing: 'Loading....'
        },
        processing: true,
        serverSide: true,
        ajax: {
            url:userajaxurl,
            type: 'POST',
            deferRender: true,
            data:{
                    [userCsrfName]:userCsrfHash,
            },
        },
        columns: [
            { data: 'user_id' },
            { data: 'user_type' },
            { data: 'user_shop_name' },
            { data: 'user_first_name' },
            { data: 'user_last_name' },
            { data: 'user_email_address' },
            { data: 'user_mobile_number' },
            { data: 'user_status' },
            { data: 'Action' },
        ],
    });
    usertable.buttons().container()
    .appendTo( '#user-datatable-list_wrapper .col-md-6:eq(0)' );

    $("body").on('submit', '#frmstoreuserdata', function(event) {
        event.preventDefault();

        if($('#frmstoreuserdata').parsley().isValid())
        {
            $.ajax({  
                type:"POST",  
                url:baseUrl+"user/store-user-data",  
                dataType: "json",
                async: false,
                data: $('#frmstoreuserdata').serialize(),
                beforeSend: function(data){  
                    $('.btnsubmitcreateuser').attr('disabled',true);
                    $('.btnsubmitcreateuser').val('Wait..');
                },
                success:function(data){  
                    $('.btnsubmitcreateuser').attr('disabled',false);
                    $('.btnsubmitcreateuser').val('Save');
                    console.log(data);
                    if( data.status == "Success" )
                    {
                        notif({
                            msg: "<b>Whoa! </b> "+data.message,
                            type: "success"
                        });
                        setTimeout(function() {
                            window.location = baseUrl+"user/list";
                        }, 3000);
                    }
                    else if( data == 3 )
                    {
                        notif({
                            msg: "<b>Whoa! </b> "+data.message,
                            type: "warning"
                        });
                    }
                    else
                    {
                        notif({
                            msg: "<b>Whoa! </b> "+data.message,
                            type: "warning"
                        });
                    }
                }
            });
        }
    });

    $("#frmupdateuserdata").parsley();
    $("body").on('submit', '#frmupdateuserdata', function(event) {
        event.preventDefault();

        if($('#frmupdateuserdata').parsley().isValid())
        {
            $.ajax({  
                type:"POST",  
                url:baseUrl+"user/update-user-data",  
                dataType: "json",
                async: false,
                data: $('#frmupdateuserdata').serialize(),
                beforeSend: function(data){  
                    $('.btnsubmitupdateuser').attr('disabled',true);
                    $('.btnsubmitupdateuser').val('Wait..');
                },
                success:function(data){  
                    $('.btnsubmitupdateuser').attr('disabled',false);
                    $('.btnsubmitupdateuser').val('Update');
                    console.log(data);
                    if( data.status == "Success" )
                    {
                        notif({
                            msg: "<b>Whoa! </b> "+data.message,
                            type: "success"
                        });
                        setTimeout(function() {
                            window.location = baseUrl+"user/list";
                        }, 3000);
                    }
                    else
                    {
                        notif({
                            msg: "<b>Whoa! </b> "+data.message,
                            type: "warning"
                        });
                    }
                }
            });
        }
    });

    jQuery("body").on('click', '.deleteuser', function(event) {
        event.preventDefault();
        let deleteuserid   = jQuery(this).data('user-id');
        let thisData           = jQuery(this);

        if (confirm('Are you sure?')) 
        {
            jQuery.ajax({  
                type:"POST",  
                url:baseUrl+"user/delete-user-info",  
                dataType: "json",
                data:{action_type:"act_delete_user_data", deleteuserid:deleteuserid, [userCsrfName]:userCsrfHash },  
                beforeSend: function(data){  
                    thisData.text('Wait...');
                },
                success:function(data){  
                    thisData.text('Delete');
                    console.log(data);
                    if( data.status == "Success" )
                    {
                        notif({
                            msg: "<b>Whoa! </b> "+data.message,
                            type: "success"
                        });
                        usertable.ajax.reload();
                    }
                    else
                    {
                        notif({
                            msg: "<b>Whoa! </b> "+data.message,
                            type: "warning"
                        });
                    }
                }
            });
        }
    });

    let deactiveuserajaxurl = baseUrl+"user/get-user-deactive-list";
    let deactiveUserCsrfName = jQuery("#deactive_user-datatable-list").data('tn');
    let deactiveUserCsrfHash = jQuery("#deactive_user-datatable-list").data('tnv');
    let deativeusertable = $("#deactive_user-datatable-list").DataTable({
        buttons: [ 'excel', 'pdf' ],
        scrollX: "100%",
        order: [[ 0, "desc" ]],
        responsive: false,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            loadingRecords: '&nbsp;',
            processing: 'Loading....'
        },
        processing: true,
        serverSide: true,
        ajax: {
            url:deactiveuserajaxurl,
            type: 'POST',
            deferRender: true,
            data:{
                    [deactiveUserCsrfName]:deactiveUserCsrfHash,
            },
        },
        columns: [
            { data: 'user_id' },
            { data: 'user_type' },
            { data: 'user_shop_name' },
            { data: 'user_first_name' },
            { data: 'user_last_name' },
            { data: 'user_email_address' },
            { data: 'user_mobile_number' },
            { data: 'user_status' },
            { data: 'Action' },
        ],
    });
    deativeusertable.buttons().container()
    .appendTo( '#deactive_user-datatable-list_wrapper .col-md-6:eq(0)' );
});