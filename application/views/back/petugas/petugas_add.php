<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar', $header); ?>

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
                        <div class="form-body">
                          <div class="row">   

                            <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Nama Petugas 1</p>
                                <?php echo form_input($nama_1);?>
                              </fieldset>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Nama Petugas 2</p>
                                <?php echo form_input($nama_2);?>
                              </fieldset>
                            </div>                      

                            <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>No Telpon</p>
                                <?php echo form_input($no_telpon);?>
                              </fieldset>
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
</script>
</body>
</html>
