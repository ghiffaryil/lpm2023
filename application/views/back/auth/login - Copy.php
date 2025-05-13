<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $page_title ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>LPM DD</title>
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('app-assets/') ?>img/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('app-assets/') ?>img/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('app-assets/') ?>img/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('app-assets/') ?>img/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('app-assets/') ?>img/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('app-assets/') ?>img/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/') ?>fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/') ?>fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/') ?>/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/') ?>vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/') ?>vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/') ?>vendors/css/chartist.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/') ?>css/app.css">

	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url('assets/template/backend/') ?>css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

</head>


  <!-- BEGIN : Body-->
  <body data-col="1-column" class=" 1-column  blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
      <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
        
          <div class="content-wrapper"><!--Login Page Starts-->
<section id="login">
  <div class="container-fluid">
    <div class="row full-height-vh m-0">
      <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="card">
          <div class="card-content">


                <div class="col-lg-0 d-lg-block d-none py-0 text-center align-middle">
                  <!-- <img src="<?php echo base_url('app-assets/') ?>img/gallery/login.png" alt="" class="img-fluid mt-5" width="400" height="230"> -->
                </div>				
                <div class="col-lg-12 col-md-6 bg-white px-4 pt-3">
                  <h4 class="mb-2 card-title" ><!-- Login --></h4>
                  <p class="card-text mb-3">
                  Selamat Datang, silakan login ke akun Anda.
                  </p>
                  <?php echo form_open($action) ?>
                  <?php echo validation_errors() ?>
                  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>

                    <div class="form-group"><label>Username</label>
                    <?php echo form_input($username) ?>
                  </div>
                  <div class="form-group"><label>Password</label>
                    <?php echo form_password($password) ?>
                  </div>
                  <div class="d-flex justify-content-between mt-2">
                    <div class="forgot-password-option">
                      <!-- <a href="<?php echo base_url('auth/reset_password') ?>" class="text-decoration-none text-primary">Forgot Password ?</a> -->
                    </div>
					
                  </div>
				  
                  <div class="fg-actions d-flex justify-content-between">
                    <div class="login-btn">
                    </div>
					
                    <div class="recover-pass">
					            <button type="submit" name="submit" class="btn white btn-round btn-success"><i class="fa fa-sign"></i> Login </button>
                    </div>
                  </div>
				            <?php echo form_close() ?>
                </div>


          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Login Page Ends-->















</body>
</html>
