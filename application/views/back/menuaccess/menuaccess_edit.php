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
          <?php echo form_open($action);?>
				<div class="card">
					<div class="card-header pb-2">
						<div class="row">
							<div class="col-xl-12 col-lg-6 col-md-12 mb-1">
								<fieldset class="form-group">
								<p>Usertype</p>
								<?php echo form_dropdown('',$get_all_combobox_usertype,$menuaccess->usertype_id,$usertype_id);?>
								</fieldset>
							</div>
              <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
								<fieldset class="form-group">
								<p>Menuname</p>
								<?php echo form_dropdown('',$get_all_combobox_menu,$menuaccess->menu_id,$menu_id);?>
								</fieldset>
							</div>
              <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
								<fieldset class="form-group">
								<p>SubMenu Name</p>
								<?php echo form_dropdown('',$get_all_combobox_submenu,$menuaccess->submenu_id,$submenu_id);?>
								</fieldset>
							</div>




            <?php echo form_input($id_menu_access,$menuaccess->id_menu_access) ?>
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

</div>
<script type="text/javascript">
function showSubmenu()
{
  menu_id = document.getElementById("menu_id").value;
  $.ajax({
    url:"<?php echo base_url();?>submenu/choose_submenu/"+menu_id+"",
    success: function(response){
      $("#submenu_id").html(response);
    },
    dataType:"html"
  });
  return false;
}
</script>
<?php $this->load->view('back/template/footer'); ?>
