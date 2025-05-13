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

							<!-- <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Program</p>
                                <select name="id_program" class="form-control" id=""  name="id_program">
                                  <option>- Pilih Program -</option>
                                  <?php foreach($get_all_program as $row){
                                    if($program>id_program == $row->id_program){
                                      echo '<option value="'.$row->id_program.'" selected >'.($row->nama_program).'</option>';
                                    }else{
                                      echo '<option value="'.$row->id_program.'" >'.($row->id_program).'</option>';
                                    }
                                  } ?>
                                </select>
                              </fieldset>
                            </div> -->
							<?php echo form_input($id_subprogram, $subprogram->id_subprogram) ?>
							<div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Nama Program</p>
                                <select class="form-control" id="id_program" name="id_program" required>
                                  <option value="">Pilih</option>
                                  <option value="1" <?= $subprogram->id_program =='1'? "selected":""?> >LAMUSTA</option>
                                  <option value="2" <?= $subprogram->id_program =='2'? "selected":""?> >PKM</option>
								  <option value="3" <?= $subprogram->id_program =='3'? "selected":""?> >Darling</option>
								  <option value="4" <?= $subprogram->id_program =='4'? "selected":""?> >Shelter</option>
								  <option value="5" <?= $subprogram->id_program =='5'? "selected":""?> >PDM</option>
								  <option value="6" <?= $subprogram->id_program =='6'? "selected":""?> >BRP</option>
								  <option value="7" <?= $subprogram->id_program =='7'? "selected":""?> >YTB</option>
								  <option value="8" <?= $subprogram->id_program =='8'? "selected":""?> >BSL</option>
								  <option value="9" <?= $subprogram->id_program =='9'? "selected":""?> >Barzah</option>
                                </select>
                              </fieldset>
                            </div>
							<!-- <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
								<fieldset class="form-group">
								<p>Nama Menu</p>
								<?php echo form_dropdown('',$get_all_combobox_menu,$submenu->menu_id,$menu_id);?>
								</fieldset>
							</div>
							 -->
							<!-- <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Nama Program</p>
                                <?php echo form_dropdown('',$get_all_combobox_program,$program->id_program,$id_program);?>
                                </select>
                              </fieldset>
                            </div> -->



							<div class="col-xl-12 col-lg-6 col-md-12 mb-1">
								<fieldset class="form-group">
								<p>Nama Sub Program</p>
                				<?php echo form_input($nama_subprogram, $subprogram->nama_subprogram) ?>
								
								</fieldset>
							</div>
              
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

<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>select2/dist/css/select2-flat-theme.min.css">
<script src="<?php echo base_url('assets/plugins/') ?>select2/dist/js/select2.full.min.js"></script>

<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>


<!-- <script>
    $(document).ready(function() {
        $("#program").change(function() {
          let id_program =  $("#program").val() 
            $.ajax({
                type: "GET", // Method pengiriman data bisa dengan GET atau POST
                url: `<?= site_url() ?>AjaxApi/getKabupaten?id_provinsi=${id_provinsi}`, // Isi dengan url/path file php yang dituju
                success: function(response) {
                  response = JSON.parse(response)
                  console.log(response)
                    let option = '<option value="">-Pilih Kabupaten-</option>'
                    for(const row of response){
                      option += `<option value="${row.id_kota_kab}">${row.kota_kab}</option>`
                    }
                    $('#kabupaten').html(option);
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(thrownError); // Munculkan alert error
                }
            });
        });
    });
</script> -->
<?php $this->load->view('back/template/footer'); ?>
