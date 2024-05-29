<!doctype html>
<html lang="en" dir="ltr">
  <head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="<?php echo $pageTitle; ?>">

		<!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url("assets/images/brand/favicon.ico"); ?>" />

		<!-- TITLE -->
		<title><?php echo $pageTitle; ?></title>

		<!-- BOOTSTRAP CSS -->
		<link id="style" href="<?php echo base_url("assets/plugins/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet" />

		<!-- STYLE CSS -->
		<link href="<?php echo base_url("assets/css/style.css"); ?>" rel="stylesheet"/>
		<link href="<?php echo base_url("assets/css/dark-style.css"); ?>" rel="stylesheet"/>
        <link href="<?php echo base_url("assets/css/skin-modes.css"); ?>" rel="stylesheet" />
        <link href="<?php echo base_url("assets/css/transparent-style.css"); ?>" rel="stylesheet" />

		<!--- FONT-ICONS CSS -->
		<link href="<?php echo base_url("assets/css/icons.css"); ?>" rel="stylesheet"/>

		<!-- COLOR SKIN CSS -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo base_url("assets/colors/color1.css"); ?>" />

        <!-- CUCSTOM CSS -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo base_url("assets/css/custom.css"); ?>" />

	</head>

	<body data-baseurl="<?php echo base_url(); ?>">

		<!-- BACKGROUND-IMAGE -->
		<div class="login-img">

			<!-- GLOABAL LOADER -->
			<div id="global-loader">
				<img src="<?php echo base_url("assets/images/loader.svg"); ?>" class="loader-img" alt="Loader">
			</div>
			<!-- /GLOABAL LOADER -->

			<!-- PAGE -->
			<div class="page">
				<div class="">

				    <!-- CONTAINER OPEN -->
					<div class="col col-login mx-auto">
						<div class="text-center">
							<H3 style="color: #fff; font-weight: bold;">MAGICAL RECHARGE PORTAL</H3>
						</div>
					</div>
					<div class="container-login100">
						<div class="wrap-login100 p-0">
							<div class="card-body">
								<form class="login100-form validate-form" method="POST" id="frm_resetpassword" action="<?php echo base_url("reset-password"); ?>">
                                    <?php echo csrf_field(); ?>
									<span class="login100-form-title">
										Reset Password
									</span>
									<div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
										<input class="input100" type="password" id="txtnewpassword" name="txtnewpassword" placeholder="New password" required data-parsley-required-message="Please enter new password">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="zmdi zmdi-lock" aria-hidden="true"></i>
										</span>
									</div>
									<div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
										<input class="input100" type="password" id="txtretypepassword" name="txtretypepassword" placeholder="Retype password" required data-parsley-required-message="Please enter retype password" data-parsley-equalto="#txtnewpassword" data-parsley-equalto-message="New and Retype Password should be same">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="zmdi zmdi-lock" aria-hidden="true"></i>
										</span>
									</div>
									<div class="container-login100-form-btn">
										<input type="submit" name="btnlogin" id="btnreserpassword" class="login100-form-btn btn-primary" value="Password Update"/>
                                        <input type="hidden" name="action" value="actDoResetPassword">
                                        <input type="hidden" name="requestdetails" value="<?php echo $getDetails; ?>">
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- CONTAINER CLOSED -->
				</div>
			</div>
			<!-- End PAGE -->

		</div>
		<!-- BACKGROUND-IMAGE CLOSED -->

		<!-- JQUERY JS -->
		<script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>

		<!-- BOOTSTRAP JS -->
		<script src="<?php echo base_url("assets/plugins/bootstrap/js/popper.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/plugins/bootstrap/js/bootstrap.min.js"); ?>"></script>

        <!-- Color Theme js -->
        <script src="<?php echo base_url("assets/js/themeColors.js"); ?>"></script>

        <!-- NOTIFY JS -->
        <script src="<?php echo base_url("assets/plugins/notify/js/notifIt.js"); ?>"></script>

        <!-- CUSTOM JS -->
        <script src="<?php echo base_url("assets/js/custom.js"); ?>"></script>

        <!-- PARSLEY JS -->
        <script src="<?php echo base_url("assets/js/parsley.js"); ?>"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                let baseUrl = $("body").data("baseurl");
                $("#frm_resetpassword").parsley();
                $("body").on("submit", "#frm_resetpassword", function (e) {
                    e.preventDefault();
                    if($('#frm_resetpassword').parsley().isValid())
                    {
                        $.ajax({  
                            type:"POST",  
                            data: $('#frm_resetpassword').serialize(),
                            dataType: "json",
                            async: false,
                            url:baseUrl+"reset-password",  
                            beforeSend: function(data){  
                                $('#btnreserpassword').attr('disabled',true);
                                $('#btnreserpassword').val('Please Wait..');
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
                                    $('#btnreserpassword').attr('disabled',false);
                                    $('#btnreserpassword').val('Password Update');
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
        </script>

	</body>
</html>
