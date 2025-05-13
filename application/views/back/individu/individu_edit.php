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
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title mb-0">Identitas Penerima Manfaat</h4>
                    <br>
                  </div>
                  <div class="card-content">                    
                    <div class="px-3">                      
                        <div class="form-body">
                          <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                            <?php echo validation_errors(); ?>
                            <?php echo form_open_multipart($action) ?>
                          <div class="row">                            
                            <input type="hidden" class="form-control" name="id_individu" value="<?php echo $individu->id_individu ?>">
                            <div class="col-xl-6 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>No KTP</p>
                                <input type="text" class="form-control" value="<?php echo $individu->nik ?>" disabled>
                                <input type="hidden" name="nik" value="<?php echo $individu->nik ?>">
                              </fieldset>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Nama Lengkap</p>
                                <input type="text" class="form-control" value="<?php echo $individu->nama ?>" disabled>
                                <input type="hidden" name="nama" value="<?php echo $individu->nama ?>">
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Jumlah Penghasilan</p>
                                <input type="text" class="form-control" data-type="currency" name="jumlah_penghasilan" value="<?php echo $individu->jumlah_penghasilan ?>">
                              </fieldset>
                            </div>

                            <div class="col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Profil Individu</p>
                                <textarea type="text" class="form-control" rows="4" name="profil_individu"><?php echo $individu->profil_individu ?></textarea>
                              </fieldset>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <hr>
                                <h4 class="card-title mb-0">Lampiran</h4>
                                <p>Silahkan sertakan berkas pendudung dibawah ini</p>
                              </fieldset>
                            </div>


                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Lampiran 1</p>
                                <?php if (empty($individu->lamp_1)) {?>
                                  <p><img id="preview" src="<?= base_url('app-assets/img/bg.png')?>" width="100%"/></p>
                                <?php }else{ ?>
                                  <p><img id="preview" src="<?php echo base_url('assets/lampiran/'.$individu->lamp_1) ?>" width="100%"/></p>
                                <?php }?>

                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="lamp_1" id="lamp_1" onchange="photoPreview(this,'preview')">
                                  <small class="help-block">Maximum file size is 2Mb</small>
                                  <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>  
                                </div>
                              </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                             <fieldset class="form-group">
                                <p>Lampiran 2</p>
                                <?php if (empty($individu->lamp_2)) {?>
                                  <p><img id="preview2" src="<?= base_url('app-assets/img/bg.png')?>" width="100%"/></p>
                                <?php }else{ ?>
                                  <p><img id="preview2" src="<?php echo base_url('assets/lampiran/'.$individu->lamp_2) ?>" width="100%"/></p>
                                <?php }?>
                                
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="lamp_2" id="lamp_2" onchange="photoPreview(this,'preview2')">
                                  <small class="help-block">Maximum file size is 2Mb</small>
                                  <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>  
                                </div>
                              </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Lampiran 3</p>
                                <?php if (empty($individu->lamp_3)) {?>
                                  <p><img id="preview3" src="<?= base_url('app-assets/img/bg.png')?>" width="100%"/></p>
                                <?php }else{ ?>
                                  <p><img id="preview3" src="<?php echo base_url('assets/lampiran/'.$individu->lamp_3) ?>" width="100%"/></p>
                                <?php }?>

                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="lamp_3" id="lamp_3" onchange="photoPreview(this,'preview3')">
                                  <small class="help-block">Maximum file size is 2Mb</small>
                                  <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>  
                                </div>
                              </fieldset>
                            </div>

                          </div>
                        </div>
                      
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" name="button" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
                      <?php echo form_close() ?>
                    <button class="btn btn-success" onclick="history.back()">Kembali</button>
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

    function photoPreview(photo,idpreview)
    {
      var gb = photo.files;
      for (var i = 0; i < gb.length; i++)
      {
        var gbPreview = gb[i];
        var imageType = /image.*/;
        var preview3=document.getElementById(idpreview);
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
          })(preview3);
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

    function photoPreview(photo,idpreview)
    {
      var gb = photo.files;
      for (var i = 0; i < gb.length; i++)
      {
        var gbPreview = gb[i];
        var imageType = /image.*/;
        var preview2=document.getElementById(idpreview);
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
          })(preview2);
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
