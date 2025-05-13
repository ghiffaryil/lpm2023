<?php $this->load->view('back/template/meta'); ?>

<div class="wrapper">
	<?php $this->load->view('back/template/header'); ?>

  <?php $this->load->view('back/template/sidebar'); ?>

	<div class="main-panel">
		<div class="content">
      <div class="page-inner"><div class="page-header"><h4 class="page-title"><?php echo $page_title.' ('.$template->name.')' ?></h4></div>
				<div class="row">
					<div class="col-md-12">
            <?php echo validation_errors() ?>
            <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
            <?php echo form_open($action);?>
  						<div class="card">
                <div class="card-body">
                  <div class="form-group"><label>Color</label>
										<?php
										if($this->uri->segment(3) == '1'){
                    	echo form_dropdown('', $logo_header_value, $template->value, $value);
										}
										elseif($this->uri->segment(3) == '2'){
                    	echo form_dropdown('', $navbar_value, $template->value, $value);
										}
										elseif($this->uri->segment(3) == '3'){
                    	echo form_dropdown('', $sidebar_value, $template->value, $value);
										}
										elseif($this->uri->segment(3) == '4'){
                    	echo form_dropdown('', $background_value, $template->value, $value);
										}
										elseif($this->uri->segment(3) == '5'){
                    	echo form_dropdown('', $sidebarstyle_value, $template->value, $value);
										}
										?>

                  </div>
  							</div>
                <?php echo form_input($id, $template->id);?>
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
                  <button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-undo-alt"></i> <?php echo $btn_reset ?></button>
                </div>
              <?php echo form_close() ?>
						</div>
					</div>
				</div>
			</div>
    </div>

  	<?php $this->load->view('back/template/footer'); ?>
	</div>
</div>
<!-- jQuery UI Touch Punch -->
<script src="<?php echo base_url('assets/template/backend/') ?>js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
</body>
</html>
