<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $page_title ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Sejaman.com">
	<title>LPM DD</title>
	<link rel="shortcut icon" type="image/icon" href="<?php echo base_url('app-assets/') ?>img/ico/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/') ?>fonts/feather/style.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/') ?>fonts/simple-line-icons/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/') ?>css/app.css">    
	<link rel="stylesheet" type="text/css" href="https://glyphsearch.com/bower_components/font-awesome/css/all.min.css">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

<body data-col="1-column" class=" 1-column  blank-page  pace-done">
	<div class="pace  pace-inactive">
		<div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);"><div class="pace-progress-inner"></div>
	</div>
	<div class="pace-activity"></div>
</div>
<div class="wrapper">
	<div class="main-panel">
		<div class="main-content">
			<div class="content-wrapper">
				<section id="login">
					<div class="container-fluid">
						<div class="row full-height-vh m-0">
							<div class="col-12 d-flex align-items-center justify-content-center">
								<div class="card">
									<div class="card-content">
										<div class="card-body login-img">
											<div class="row m-0">
												<div class="col-lg-6 d-lg-block d-none py-2 text-center align-middle">
													<img src="<?php echo base_url('app-assets/') ?>/img/gallery/login.png" alt="" class="img-fluid mt-5" width="400" height="230">
												</div>
												<div class="col-lg-6 col-md-12 bg-white px-4 pt-3 text-center">
													<img src="<?php echo base_url('app-assets/') ?>/img/logo.png" alt="" class="img-fluid pt-2" width="250">
													<h4 class="mb-2 card-title pt-3">Login</h4>
													<p class="card-text mb-3">Welcome back, please login to your account.</p>
													<?php echo form_open($action) ?>
													<?php echo validation_errors() ?>
													<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
													<?php echo form_input($username) ?>
													<?php echo form_password($password) ?>
													<div class="d-flex justify-content-between mt-2">
														<div class="remember-me">
															<div class="custom-control custom-checkbox custom-control-inline mb-3">
																<input type="checkbox" id="customCheckboxInline1" name="customCheckboxInline1" class="custom-control-input">
																<label class="custom-control-label text-capitalize" for="customCheckboxInline1">
																	Remember Me
																</label>
															</div>
														</div>
														<div class="forgot-password-option">
															<a href="forgot-password-page.html" class="text-decoration-none text-primary">Forgot Password?</a>
														</div>
													</div>
													<div class="fg-actions d-flex justify-content-between">
														<div class="login-btn">
															<button type="submit" name="submit" class="btn btn-primary text-white">
																Login
															</button>
														</div>
													</div>
													<?php echo form_close() ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url('app-assets/') ?>vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"/>
	<script src="<?php echo base_url('app-assets/') ?>vendors/js/core/popper.min.js" type="text/javascript"/>
		<script src="<?php echo base_url('app-assets/') ?>vendors/js/core/bootstrap.min.js" type="text/javascript"/>
			<script src="<?php echo base_url('app-assets/') ?>js/customizer.js" type="text/javascript"/>
			</body>
			</html>
