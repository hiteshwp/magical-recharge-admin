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
							<img src="<?php echo base_url("assets/images/brand/logo.png"); ?>" class="header-brand-img" alt="">
						</div>
					</div>
					<div class="container-login100">
						<div class="row">
							<div class="col col-login mx-auto">
								<form class="card shadow-none" method="post">
									<div class="card-body">
										<div class="text-center">
											<span class="login100-form-title">
												Forgot Password
											</span>
											<p class="text-muted">Enter the email address registered on your account</p>
										</div>
										<div class="pt-3" id="forgot">
											<div class="form-group">
												<label class="form-label">E-Mail</label>
												<input class="form-control" placeholder="Enter Your Email" type="email">
											</div>
											<div class="submit">
												<a class="btn btn-primary d-grid" href="index.html">Submit</a>
											</div>
											<div class="text-center mt-4">
												<p class="text-dark mb-0">Forgot It?<a class="text-primary ms-1" href="<?php echo base_url("/"); ?>">Send me Back</a></p>
											</div>
										</div>
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

		<!-- SPARKLINE JS -->
		<script src="<?php echo base_url("assets/js/jquery.sparkline.min.js"); ?>"></script>

		<!-- CHART-CIRCLE JS -->
		<script src="<?php echo base_url("assets/js/circle-progress.min.js"); ?>"></script>

		<!-- Perfect SCROLLBAR JS-->
		<script src="<?php echo base_url("assets/plugins/p-scroll/perfect-scrollbar.js"); ?>"></script>

		<!-- INPUT MASK JS -->
		<script src="<?php echo base_url("assets/plugins/input-mask/jquery.mask.min.js"); ?>"></script>

        <!-- Color Theme js -->
        <script src="<?php echo base_url("assets/js/themeColors.js"); ?>"></script>

        <!-- NOTIFY JS -->
        <script src="<?php echo base_url("assets/plugins/notify/js/notifIt.js"); ?>"></script>

        <!-- CUSTOM JS -->
        <script src="<?php echo base_url("assets/js/custom.js"); ?>"></script>

        <!-- PARSLEY JS -->
        <script src="<?php echo base_url("assets/js/parsley.js"); ?>"></script>

         <!-- AJAX JS -->
         <script src="<?php echo base_url("assets/js/ajax.js"); ?>"></script>

         <?php if(session()->getFlashdata('logout-success')):?>
            <script type="text/javascript">
                jQuery(document).ready(function() {
                    let msg = "<?php echo session()->getFlashdata('logout-success') ?>";
                    notif({
                        msg: "<b>Whoa! </b> "+msg,
                        type: "success"
                    });
                });
            </script>
        <?php endif;?>

	</body>
</html>
