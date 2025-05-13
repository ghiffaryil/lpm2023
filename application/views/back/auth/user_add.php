<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>select2/dist/css/select2-flat-theme.min.css">
<div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper"><!-- Basic Elements start -->
<section class="basic-elements">
	<div class="row">
		<div class="col-sm-12">
			<div class="content-header"><?php echo $page_title ?></div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?php echo form_open_multipart($action);?>
			<div class="card">
				<div class="card-header">
					<h4 class="card-title mb-0">Data Personal</h4>
				</div>
				<hr>
				<div class="card-content">
					<div class="px-3">			
							<div class="form-body">
								<div class="row">
									<div class="col-xl-3 col-lg-6 col-md-12 mb-1 match-height">
								<p>Photo</p>
			            		<p><img src="<?= base_url('app-assets/img/bg.png')?>" id="preview" class="img-fluid image" alt="current photo" alignt="center"></p>			            		
								<p class="help-block">Maximum file size is 2Mb</p>
							</div>
							<div class="col-xl-4 col-lg-6 col-md-12 mb-1">
								<fieldset class="form-group">
								<p>Nama Lengkap (*)</p>
								<?php echo form_input($name) ?>
								</fieldset>

								<fieldset class="form-group">
								<p>Jenis Kelamin</p>
								<?php echo form_dropdown('', $gender_value, '', $gender) ?>
								</fieldset>

								<fieldset class="form-group">
								<p>Tempat Lahir</p>
								<?php echo form_input($birthplace) ?>
								</fieldset>

								<fieldset class="form-group">
								<p>Tanggal Lahir</p>
								<?php echo form_input($birthdate) ?>
								</fieldset>

							</div>
							<div class="col-xl-5 col-lg-6 col-md-12 mb-1">
								<fieldset class="form-group">
								<p>No Telephone</p>
								<?php echo form_input($phone) ?>
								</fieldset>

								<fieldset class="form-group">
								<p>Alamat</p>
								<?php echo form_textarea($address) ?>
								</fieldset>

								<fieldset class="form-group">
								<p>Photo</p>
									<div class="custom-file">
									<input type="file" class="custom-file-input" name="photo" id="photo" onchange="photoPreview(this,'preview')"/>
									<label class="custom-file-label" for="inputGroupFile01">Pilih Photo</label>
									</div>
								</fieldset>
							</div>
							<div class="col-xl-12 col-lg-6 col-md-12 mb-1">
								<button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
	                			<button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-undo-alt"></i> <?php echo $btn_reset ?></button>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-header">
					<h4 class="card-title mb-0">Auth</h4>
				</div>
				<hr>
				<div class="card-content">
					<div class="px-3">
							<div class="form-body">
								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
										<fieldset class="form-group">
										<p>Username (*)</p>
										<?php echo form_input($username) ?>
										</fieldset>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
										<fieldset class="form-group">
										<p>Email</p>
										<?php echo form_input($email) ?>
										</fieldset>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
										<fieldset class="form-group">
										<p>Password (*)</p>
										<?php echo form_password($password) ?>
										</fieldset>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
										<fieldset class="form-group">
										<p>Password Confirmation (*)</p>
										<?php echo form_password($password_confirm) ?>
										</fieldset>
									</div>
									
									<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
										<fieldset class="form-group">
										<p>User Type</p>
										<?php echo form_dropdown('', $get_all_combobox_usertype, '', $usertype) ?>
										</fieldset>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
										<fieldset class="form-group">
										<p>Data Akses</p>
										<?php echo form_dropdown('', $get_all_combobox_data_access, '', $data_access_id) ?>
										</fieldset>
									</div>
									<div class="col-xl-12 col-lg-6 col-md-12 mb-1">
									<button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
	                				<button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-undo-alt"></i> <?php echo $btn_reset ?></button>
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>
		<?php echo form_close() ?>
		<?php echo validation_errors() ?>
		<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
		</div>
	</div>
</section>
<!-- Basic Inputs end -->


<?php $this->load->view('back/template/footer'); ?>

<script type="text/javascript">
	    $('#birthdate').datepicker({
	      autoclose: true,
	      zIndexOffset: 9999
	    })

	    $("#data_access_id").select2({
	      placeholder: "- Please Choose Data Access -",
	      theme: "flat"
	    });

	    function photoPreview(photo,idpreview)
	    {
	      var gb = photo.files;
	      for (var i = 0; i < gb.length; i++)
	      {
	        var gbPreview = gb[i];
	        var imageType = /image.*/;
	        var preview=document.getElementById(idpreview);
	        var reader = new FileReader();
	        if (gbPreview.type.match(imageType))
	        {
	          //jika tipe data sesuai
	          preview.file = gbPreview;
	          reader.onload = (function(element)
	          {
	            return function(e)
	            {
	              element.src = e.target.result;
	            };
	          })(preview);
	          //membaca data URL gambar
	          reader.readAsDataURL(gbPreview);
	        }
	          else
	          {
	            //jika tipe data tidak sesuai
	            alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
	          }
	      }
	    }
	  </script>