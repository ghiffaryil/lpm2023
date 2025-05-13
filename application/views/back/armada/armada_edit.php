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
                        <?php echo form_input($id_armada, $armada->id_armada) ?>
                        <div class="form-body">
                          <div class="row">       

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Jenis Armada</p>
                                <?php echo form_input($jenis_armada, $armada->jenis_armada);?>
                              </fieldset>

                              <fieldset class="form-group">
                                <p>Merk Marmada</p>
                                <?php echo form_input($merk_armada, $armada->merk_armada);?>
                              </fieldset>

                              <fieldset class="form-group">
                                <p>No Polisi</p>
                                <?php echo form_input($no_polisi, $armada->no_polisi);?>
                              </fieldset>                       

                              <fieldset class="form-group">
                                <p>No Rangka</p>
                                <?php echo form_input($no_rangka, $armada->no_rangka);?>                                
                              </fieldset>

                              <fieldset class="form-group">
                                <p>No Mesin</p>
                                <?php echo form_input($no_mesin, $armada->no_mesin);?>
                              </fieldset>

                              <fieldset class="form-group">
                                <p>Tahun</p>
                                <?php echo form_input($tahun, $armada->tahun);?>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Posko Armada</p>
                                <?php echo form_input($lokasi_armada, $armada->lokasi_armada);?>
                              </fieldset>

                              <fieldset class="form-group">
                                <p>Petugas Armada</p>
                                <select class="form-control selectpicker" id="id_petugas" name="id_petugas">
                                  <option>Pilih petugas armada</option>
                                  <?php foreach($get_petugas as $row){
                                    if ($armada->id_petugas == $row->id_petugas) {
                                      echo '<option class="text-capitalize" value="'.$row->id_petugas.'" selected>'.($row->nama_1).' & '.($row->nama_2).'</option>';
                                    }else{
                                      echo '<option class="text-capitalize" value="'.$row->id_petugas.'">'.($row->nama_1).' & '.($row->nama_2).'</option>';
                                    }                                    
                                  }?>
                                </select>
                              </fieldset>

                              <fieldset class="form-group">
                                <p>Foto Armada</p>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="foto" id="foto" onchange="photoPreview(this,'preview')">
                                  <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>  
                                </div>
                                <?php if (empty($armada->foto)) {?>
                                  <p><img id="preview" src="<?= base_url('app-assets/img/no-image.png')?>" width="100%"/></p>
                                <?php }else{ ?>
                                  <p><img id="preview" class="img-fluid image" src="<?php echo base_url('assets/armada/'.$armada->foto) ?>" width="100%" style="height: 285px;"/></p>
                                <?php }?>
                              </fieldset>

                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <?= $btn_submit ?>
                  <?php echo form_close() ?>
                  <?= $btn_back ?>
                </div>
              </div>
            </div>
          </section>
          <!-- Basic Inputs end -->
        </div>
      </div>
</div>
<?php $this->load->view('back/template/footer'); ?>

<script type="text/javascript">
    $(document).ready(function(){
       $('#nik').on('change',function(){
                var nik = $(this).val();
                $.ajax({
                    type : "GET",
                    url  : "<?= base_url('komunitas/get_data_penduduk')?>",
                    dataType : "JSON",
                    data : {nik: nik},
                    cache:false,
                    success: function(data){
                        $.each(data,function(nama){
                            $('#nama').val(data.nama);
                        });
                    }
                });
                return false;
           });
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
</body>
</html>
