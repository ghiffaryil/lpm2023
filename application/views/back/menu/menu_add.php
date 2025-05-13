<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<div class="main-panel">
	<!-- BEGIN : Main Content-->
	<div class="main-content">
		<div class="content-wrapper">
			<div class="col-sm-12">
				<div class="content-header"><?php echo $page_title ?>
				</div>
			</div>
			<div class="col-xl-12 col-lg-12 col-12">
				<?php echo validation_errors() ?>
				<?php if ($this->session->flashdata('message')) {
					echo $this->session->flashdata('message');
				} ?>
				<?php echo form_open_multipart($action); ?>
				<div class="card">
					<div class="card-header pb-2">
						<div class="row">
							<div class="col-xl-12 col-lg-6 col-md-12 mb-1">
								<fieldset class="form-group">
									<p>Order Number</p>
									<?php echo form_input($order_no); ?>
								</fieldset>
							</div>
							<div class="col-xl-12 col-lg-6 col-md-12 mb-1">
								<fieldset class="form-group">
									<p>Menu Name</p>
									<?php echo form_input($menu_name); ?>
								</fieldset>
							</div>
							<div class="col-xl-12 col-lg-6 col-md-12 mb-1">
								<fieldset class="form-group">
									<p>Menu URL</p>
									<?php echo form_input($menu_url); ?>
								</fieldset>
							</div>
							<div class="col-xl-12 col-lg-6 col-md-12 mb-1">
								<fieldset class="form-group">
									<p>Menu Icon | (Choose The Icon From The List Below)</p>
									<?php echo form_input($menu_icon); ?>
								</fieldset>
							</div>

						</div>
						<button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
						<button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-undo-alt"></i> <?php echo $btn_reset ?></button>
					</div>
				</div>
			</div>
			<?php echo form_close() ?>

			<div class="col-xl-12 col-lg-12 col-12">
				<div class="card">
					<div id="headingCollapse1" class="card-header pb-3">
						<a data-toggle="collapse" href="#feather" aria-expanded="true" aria-controls="feather" class="card-title lead">Show Feather Icon</a>
					</div>
					<div id="feather" role="tabpanel" aria-labelledby="headingCollapse1" class="collapse" style="">
						<div class="card-content">
							<div class="card-body">
								<?php $this->load->view('back/menu/feather_icon'); ?>
							</div>
						</div>
					</div>
					<div id="headingCollapse1" class="card-header pb-3">
						<a data-toggle="collapse" href="#fontawesome" aria-expanded="true" aria-controls="fontawesome" class="card-title lead">Show Fontawesome Icon</a>
					</div>
					<div id="fontawesome" role="tabpanel" aria-labelledby="headingCollapse1" class="collapse" style="">
						<div class="card-content">
							<div class="card-body">
								<?php $this->load->view('back/menu/fontawesome_list'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br><br><br>
</div>

<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>select2/dist/css/select2-flat-theme.min.css">
<script src="<?php echo base_url('assets/plugins/') ?>select2/dist/js/select2.full.min.js"></script>

<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<?php $this->load->view('back/template/footer'); ?>