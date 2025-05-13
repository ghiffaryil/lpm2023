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
      <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
      <?php echo form_open_multipart($action);?>  
				<div class="card">
					<div class="card-header pb-2">
						<div class="row">
							<div class="col-xl-12 col-lg-6 col-md-12 mb-1">
								<fieldset class="form-group" type="disabled">
								<p>Nama Program</p>
                				<?php echo form_input($nama_program, $program->nama_program);?>
								</fieldset>

								<fieldset class="form-group">
								<p>Deskripsi</p>
                				<?php echo form_textarea($deskripsi, $program->deskripsi);?>
								</fieldset>

								<fieldset class="form-group">
								<p>Direktorat</p>
                				<?php echo form_input($direktorat, $program->direktorat);?>
								</fieldset>

								<fieldset class="form-group">
								<p>Divisi</p>
                				<?php echo form_input($divisi, $program->divisi);?>
								</fieldset>

								<fieldset class="form-group">
								<p>Organ</p>
                				<?php echo form_input($organ, $program->organ);?>
								</fieldset>
							</div>
              				<?php echo form_input($id_program, $program->id_program);?>
						</div>
						<button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
              			<button type="reset" name="reset" class="btn btn-danger" onclick="history.back(-1)"  ><i class="fa fa-undo-alt"></i>Kembali ,</button>
      			</div>
    			</div>
  			</div>
      <?php echo form_close() ?>	  
			  
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
