<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

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
            <div class="row match-height">
              <div class="col-md-12">
                <div class="card"><br>
                  <div class="card-content">
                    <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                    <?php echo validation_errors(); ?>
                    <div class="px-3">
                      <?php echo form_open_multipart($action) ?>
                      <?php echo form_input($id_rekomender, $rekomender->id_rekomender) ?>
                        <div class="form-body">
                          <div class="row">       

                            <div class="col-xl-12 col-lg-12 col-md-12 mb-1 jen">
                              <fieldset class="form-group">
                                <p>Jenis Rekomendasi</p>
                                  <input type="radio" id="individu" name="jenis_rekomender" value="Individu" class="individu" <?php if ($rekomender->jenis_rekomender == 'Individu'){echo "checked";}?>>
                                  <label for="individu" class="font-medium-2 text-bold-40">Individu</label>
                                  &nbsp;
                                  <input type="radio" id="lembaga" name="jenis_rekomender" value="Lembaga" class="lembaga" <?php if ($rekomender->jenis_rekomender == 'Lembaga'){echo "checked";}?>>
                                  <label for="lembaga" class="font-medium-2 text-bold-40">Lembaga</label>
                              </fieldset>

                              <fieldset class="form-group">
                                <p>Nama</p>
                                <?php echo form_input($nama_rekomender, $rekomender->nama_rekomender);?>
                              </fieldset>

                              <fieldset class="form-group">
                                <p>Alamat</p>
                                <?php echo form_textarea($alamat_rekomender, $rekomender->alamat_rekomender);?>
                              </fieldset>

                              <fieldset class="form-group">
                                <p>No Telpon</p>
                                <?php echo form_input($no_telpon, $rekomender->no_telpon);?>
                              </fieldset>            

                              <?php if ($rekomender->jenis_rekomender == 'Individu') { ?>
                                <fieldset class="form-group status_hubungan">
                                  <p>Status Hubungan</p>
                                  <?php echo form_input($status_hubungan, $rekomender->status_hubungan);?>
                                </fieldset> 
                              <?php } else {?>                              
                                  <fieldset class="form-group status_hubungan" hidden>
                                    <p>Status Hubungan</p>
                                    <?php echo form_input($status_hubungan);?>
                                  </fieldset>
                              <?php } ?>
                            </div>

                          </div>
                          <?= $btn_submit ?>
                        <?php echo form_close() ?>
                          <?= $btn_back ?>
                        </div>
                        <br>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Basic Inputs end -->
        </div>
      </div>
</div>
<?php $this->load->view('back/template/footer'); ?>

<script>
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }                        

  $('.individu').on('click', function(){
    if($(this).is(':checked')) {
      $('#status_hubungan').val('<?php echo $rekomender->status_hubungan;?>');
      $('.lembaga').prop('checked', false);
      $('.status_hubungan').attr('hidden', false);
    } else {
      $('.lembaga').prop('checked', true);
      $('.status_hubungan').attr('hidden', true);
    }
  })

  $('.lembaga').on('click', function(){
    if($(this).is(':checked')) {
      $('#status_hubungan').val('');
      $('.individu').prop('checked', false);
      $('.status_hubungan').attr('hidden', true);
    } else {
      $('.individu').prop('checked', true);
      $('.status_hubungan').attr('hidden', false);
    }
  })
</script>

</body>
</html>
