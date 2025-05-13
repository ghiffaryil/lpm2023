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
			<?php echo validation_errors() ?>
			<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
			<?php echo form_open_multipart($action);?>
			<div class="row match-height">
			<div class="col-xl-12 col-lg-12 col-12">
				<div class="card">
					<div class="card-header pb-2">
						<div class="row">
							<div class="col-xl-3 col-lg-6 col-md-12 mb-1 match-height">
								<p>Photo</p>
			            		<p><img src="<?php echo base_url('assets/images/user/'.$user->photo_thumb) ?>" id="preview" class="img-fluid image" alt="current photo" alignt="center"></p>			            		
								<p class="help-block">Maximum file size is 2Mb</p>
							</div>
							<div class="col-xl-4 col-lg-6 col-md-12 mb-1">
								<fieldset class="form-group">
								<p>Nama Lengkap (*)</p>
								<?php echo form_input($name, $user->name, $user->name) ?>
								</fieldset>

								<fieldset class="form-group">
								<p>Jenis Kelamin</p>
								<?php echo form_dropdown('', $gender_value, $user->gender, $gender) ?>
								</fieldset>

								<fieldset class="form-group">
								<p>Tempat Lahir</p>
								<?php echo form_input($birthplace, $user->birthplace) ?>
								</fieldset>

								<fieldset class="form-group">
								<p>Tanggal Lahir</p>
								<?php echo form_input($birthdate, $user->birthdate) ?>
								</fieldset>

							</div>
							<div class="col-xl-5 col-lg-6 col-md-12 mb-1">
								<fieldset class="form-group">
								<p>No Telephone</p>
								<?php echo form_input($phone, $user->phone) ?>
								</fieldset>

								<fieldset class="form-group">
								<p>Alamat</p>
								<?php echo form_textarea($address, $user->address) ?>
								</fieldset>

								<fieldset class="form-group">
								<p>Photo</p>
									<div class="custom-file">
									<input type="file" class="custom-file-input" name="photo" id="photo" onchange="photoPreview(this,'preview')"/>
									<label class="custom-file-label" for="inputGroupFile01">Pilih Photo</label>
									</div>
								</fieldset>
							</div>
						</div>
						<button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
	                	<button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-undo-alt"></i> <?php echo $btn_reset ?></button>
      				</div>
    			</div>
  			</div>
			  <div class="col-xl-12 col-lg-12 col-12">
				  
			  <div class="card">
					<div class="card-header pb-2">
						<div class="content-header">AUTH
							<br><br>
						</div>
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
								<fieldset class="form-group">
								<p>Username</p>
								<?php echo form_input($username, $user->username) ?>
								</fieldset>

								<fieldset class="form-group">
								<p>Email</p>
								<?php echo form_input($email, $user->email) ?>
								</fieldset>

								<fieldset class="form-group">
								<p>Usertype</p>
								<?php echo form_dropdown('', $get_all_combobox_usertype, $user->usertype, $usertype) ?>
								</fieldset>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
								<fieldset class="form-group">
								<p>Data Akses Baru</p>
								<?php echo form_dropdown('', $get_all_combobox_data_access, '', $data_access_id) ?>
								</fieldset>

								<fieldset class="form-group">
								<p>Current Data Access (*)</p>
								<p>
									<?php
									if($get_all_data_access_old == NULL)
									{
									echo '<button class="btn btn-sm btn-danger">No Data</button>';
									}
									else
									{
									foreach($get_all_data_access_old as $data_access)
									{
										$string = chunk_split($data_access->data_access_name, 9, "</button> ");
										echo '<button class="btn btn-sm btn-success" disabled>'.$string;
									}
									}
									?>
			                  </p>
								</fieldset>
							</div>
							<?php echo form_input($id_users, $user->id_users) ?>
						</div>
						<button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
	                	<button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-undo-alt"></i> <?php echo $btn_reset ?></button>
      				</div>
    			</div>
			</div>
			<?php echo form_close() ?>
		</div>		
	</div>
	<br><br><br>
</div>

<?php $this->load->view('back/template/footer'); ?>

	  <script type="text/javascript">
	    $('#birthdate').datepicker({
	      autoclose: true,
	      zIndexOffset: 9999
	    })

	    $(".selectpicker").select2({
	      placeholder: " Please Choose Data Access ",
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
	  

