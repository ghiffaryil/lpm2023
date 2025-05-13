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

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Jenis Armada</p>
                                <?php echo form_input($jenis_armada);?>
                              </fieldset>

                              <fieldset class="form-group">
                                <p>Merk Armada</p>
                                <?php echo form_input($merk_armada);?>
                              </fieldset>

                              <fieldset class="form-group">
                                <p>No Polisi</p>
                                <?php echo form_input($no_polisi);?>
                              </fieldset>                    

                              <fieldset class="form-group">
                                <p>No Rangka</p>
                                <?php echo form_input($no_rangka);?>                                
                              </fieldset>

                              <fieldset class="form-group">
                                <p>No Mesin</p>
                                <?php echo form_input($no_mesin);?>
                              </fieldset>

                              <fieldset class="form-group">
                                <p>Tahun</p>
                                <?php echo form_input($tahun);?>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Posko Armada</p>
                                <?php echo form_input($lokasi_armada);?>
                              </fieldset>

                              <fieldset class="form-group">
                                <p>Petugas Armada</p>
                                <select class="form-control selectpicker" id="id_petugas" name="id_petugas">
                                  <option selected>Pilih petugas armada</option>
                                  <?php foreach($get_petugas as $row){
                                    echo '<option value="'.$row->id_petugas.'">'.($row->nama_1).' & '.($row->nama_2).'</option>';
                                  }?>
                                </select>
                              </fieldset>

                              <fieldset class="form-group">
                                <p>Foto Armada</p>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="foto" id="foto" onchange="photoPreview(this,'preview')">
                                  <small class="help-block">Maximum file size is 2Mb</small>
                                  <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>  
                                </div>
                                <p><img id="preview" class="img-fluid image" src="<?= base_url('app-assets/img/no-image.png')?>" width="100%" style="height: 265px;" /></p>
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

</body>
</html>
