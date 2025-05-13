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
                    <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                    <?php echo validation_errors() ?>
                    <div class="px-3">
                      <?php echo form_open_multipart($action) ?>
                      <input type="hidden" name="id_penduduk" value="<?php echo $penduduk->id_penduduk ?>">
                        <div class="form-body">
                          <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>No KTP</p>
                                <input type="text" name="nik" id="nik" class="form-control" value="<?php echo $penduduk->nik ?>"/>
                                <!-- <input type="hidden" name="nik" value="<?php echo $penduduk->nik ?>" /> -->
                              </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Nama Lengkap</p>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $penduduk->nama ?>">
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>No KK</p>
                                <input type="text" class="form-control" id="no_kk" onkeypress="return hanyaAngka(event)" name="no_kk" maxlength="16" value="<?php echo $penduduk->no_kk ?>" />
                                <script>
                                  function hanyaAngka(evt) {
                                    var charCode = (evt.which) ? evt.which : event.keyCode
                                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                              
                                      return false;
                                    return true;
                                  }
                                </script>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Nama Kepala Keluarga</p>
                                <input type="text" class="form-control" id="nama_kkt" name="nama_kk" value="<?php echo $penduduk->nama_kk ?>">
                              </fieldset>
                            </div>


                            <div class="col-xl-3 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Tempat Lahir</p>
                                <select class="form-control selectpicker" id="tmpt_lahir"  name="tmpt_lahir">
                                  <option value="">Tidak ada keterangan</option>
                                  <?php foreach($get_all_kabupaten as $row){?>
                                    <option value="<?php echo $row->kota_kab ?>" <?php if ($row->kota_kab == $penduduk->tmpt_lahir) {echo "selected";}else{echo "";}?>><?php echo $row->kota_kab ?></option>';
                                  <?php } ?>
                                </select>
                              </fieldset>
                            </div>

                            <div class="col-xl-3 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Tanggal Lahir</p>
                                <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?php echo $penduduk->tgl_lahir ?>">
                              </fieldset>
                            </div>


                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Jenis Kelamin</p>
                                <select class="form-control" id="jk" name="jk">
                                  <option>Pilih</option>
                                  <option value="L" <?php if ($penduduk->jk == 'L') {echo "selected";}else{echo "";}?>>Laki-laki</option>
                                  <option value="P" <?php if ($penduduk->jk == 'P') {echo "selected";}else{echo "";}?>>Perempuan</option>
                                </select>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Kewarganegaraan</p>
                                <select class="form-control" id="kewaranegaraan"  name="kewaranegaraan">
                                  <option>Tidak ada keterangan</option>                                  
                                  <?php foreach($get_negara as $row){?>
                                    <option value="<?php echo $row->nama_negara ?>" <?php if ($row->nama_negara == $penduduk->negara) {echo "selected";}else{echo "";}?>><?php echo $row->nama_negara ?></option>';
                                  <?php } ?>
                                </select>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Telpon</p>
                                <input type="text" class="form-control" id="no_hp" onkeypress="return hanyaAngka(event)" name="no_hp" value="<?php echo $penduduk->no_hp ?>"/>
                                <script>
                                  function hanyaAngka(evt) {
                                    var charCode = (evt.which) ? evt.which : event.keyCode
                                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                              
                                      return false;
                                    return true;
                                  }
                                </script>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Email</p>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $penduduk->email ?>"/>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Status Pernikahan</p>
                                <select class="form-control" id="status_perkawinan"  name="status_perkawinan">
                                  <option value="">Tidak ada keterangan</option>
                                  <option value="Belum Menikah" <?php if ($penduduk->status_perkawinan == 'Belum Menikah') {echo "selected";}else{echo "";}?>>Belum Menikah</option>
                                  <option value="Menikah" <?php if ($penduduk->status_perkawinan == 'Menikah') {echo "selected";}else{echo "";}?>>Menikah</option>
                                  <option value="Pernah Menikah/Cerai" <?php if ($penduduk->status_perkawinan == 'Pernah Menikah/Cerai') {echo "selected";}else{echo "";}?>>Pernah Menikah/Cerai</option>
                                </select>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Jumlah Anggota Keluarga</p>
                                <input type="text" class="form-control" id="jum_individu" onkeypress="return hanyaAngka(event)" name="jum_individu" value="<?php echo $penduduk->jum_individu ?>"/>
                                <script>
                                  function hanyaAngka(evt) {
                                    var charCode = (evt.which) ? evt.which : event.keyCode
                                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                              
                                      return false;
                                    return true;
                                  }
                                </script>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Agama</p>
                                <select class="form-control" id="agama"  name="agama">
                                  <option>Pilih Agama</option>
                                  <?php foreach($get_agama as $row){ ?>
                                    <option value="<?php echo $row->nama_agama ?>" <?php if ($row->nama_agama == $penduduk->agama) {echo "selected";}else{echo "";}?>><?php echo $row->nama_agama ?></option>
                                  <?php } ?>
                                </select>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Pendidikan Terakhir</p>
                                <select class="form-control" id="pendidikan"  name="pendidikan">
                                  <option>Tidak ada keterangan</option>
                                  <option value="SD" <?php if ($penduduk->pendidikan == "SD") {echo "selected";}else{echo "";}?>>SD</option>
                                  <option value="SMP" <?php if ($penduduk->pendidikan == "SMP") {echo "selected";}else{echo "";}?>>SMP</option>
                                  <option value="SMA/SMK" <?php if ($penduduk->pendidikan == "SMA/SMK") {echo "selected";}else{echo "";}?>>SMA/SMK</option>
                                  <option value="D3" <?php if ($penduduk->pendidikan == "D3") {echo "selected";}else{echo "";}?>>D3</option>
                                  <option value="S1" <?php if ($penduduk->pendidikan == "S1") {echo "selected";}else{echo "";}?>>S1</option>
                                  <option value="S2" <?php if ($penduduk->pendidikan == "S2") {echo "selected";}else{echo "";}?>>S2</option>
                                  <option value="S3" <?php if ($penduduk->pendidikan == "S3") {echo "selected";}else{echo "";}?>>S3</option>
                                  <option value="Tidak Sekolah" <?php if ($penduduk->pendidikan == "Tidak Sekolah") {echo "selected";}else{echo "";}?>>Tidak Sekolah</option>
                                </select>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Pekerjaan</p>
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $penduduk->pekerjaan ?>"/>
                              </fieldset>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <hr>
                                <h4 class="card-title mb-0">Alamat Identitas</h4>
                                <p>Alamat sesuai tanda pengenal, contoh: KTP atau SIM</p>
                              </fieldset>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Alamat Lengkap</p>
                                <textarea id="projectinput8" rows="4" class="form-control" name="alamat"><?php echo $penduduk->alamat ?></textarea>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Negara</p>
                                <select class="form-control" id="negara"  name="negara">
                                  <option>Pilih Negara</option>
                                  <?php foreach($get_negara as $row){
                                    if($penduduk->negara == $row->nama_negara){
                                      echo '<option value="'.$row->nama_negara.'" selected >'.($row->nama_negara).'</option>';
                                    }else{
                                      echo '<option value="'.$row->nama_negara.'" >'.($row->nama_negara).'</option>';
                                    }
                                  } ?>
                                </select>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Provinsi</p>
                                <select name="id_provinsi" class="form-control" id="province"  name="id_provinsi">
                                  <option>Pilih Provinsi</option>
                                  <?php foreach($get_all_provinsi as $row){
                                    if($penduduk->id_provinsi == $row->id_provinsi){
                                      echo '<option value="'.$row->id_provinsi.'" selected >'.($row->provinsi).'</option>';
                                    }else{
                                      echo '<option value="'.$row->id_provinsi.'" >'.($row->provinsi).'</option>';
                                    }
                                  } ?>
                                </select>
                              </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Kota/Kabupaten</p>
                                <select class="form-control" id="kabupaten" name="id_kota_kab">
                                  <?php
                                    if($penduduk->id_kota_kab){
                                      echo '<option value="'.$penduduk->id_kota_kab.'" selected >'.($penduduk->kota_kab).'</option>';
                                    }
                                  ?>
                                </select>
                              </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Kecamatan</p>
                                <select class="form-control" id="kecamatan" name="id_kecamatan">
                                  <?php
                                    if($penduduk->id_kecamatan){
                                      echo '<option value="'.$penduduk->id_kecamatan.'" selected >'.($penduduk->kecamatan_name).'</option>';
                                    }
                                  ?>
                                </select>
                              </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Desa/Kelurahan</p>
                                <select class="form-control" id="desa_kelurahan" name="id_desa_kelurahan">
                                  <?php
                                    if($penduduk->id_desa_kelurahan){
                                      echo '<option value="'.$penduduk->id_desa_kelurahan.'" selected >'.($penduduk->desa_kelurahan).'</option>';
                                    }
                                  ?>
                                </select>
                              </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Kode Pos</p>
                                <input class="form-control" id="kodepos" name="kodepos" value="<?= $penduduk->kodepos ?>" />
                              </fieldset>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <hr>
                                <h4 class="card-title mb-0">Alamat Domisili</h4>
                                <p>Alamat sesuai tempat tinggal saat ini</p>
                              </fieldset>
                            </div>

                            <div class="col-md-6 form-group">
                              <input name="check_domisili" type="checkbox" id="check_domisili">
                              <span class="checkbox-label">
                                &nbsp; Apakah alamat identitas sama dengan alamat domisili?
                              </span>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Alamat Lengkap</p>
                                <textarea id="alamat_domisili" rows="4" class="form-control" name="alamat_domisili"><?= $penduduk->alamat_domisili ?></textarea>
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
                                <p>Photo</p>
                                <?php if (empty($penduduk->photo)) {?>
                                  <p><img id="preview_photo" src="<?= base_url('app-assets/img/bg.png')?>" width="100%"/></p>
                                <?php }else{ ?>
                                  <p><img id="preview_photo" src="<?php echo base_url('assets/photo/'.$penduduk->photo) ?>" width="100%"/></p>
                                <?php }?>
                                
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="photo" id="photo" onchange="photoPreview(this,'preview_photo')">
                                  <small class="help-block">Maximum file size is 2Mb</small>
                                  <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>  
                                </div>
                              </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Scan KK</p>
                                <?php if (empty($penduduk->photo)) {?>
                                  <p><img id="preview" src="<?= base_url('app-assets/img/bg.png')?>" width="100%"/></p>
                                <?php }else{ ?>
                                  <p><img id="preview" src="<?php echo base_url('assets/photo/'.$penduduk->photo_kk) ?>" width="100%"/></p>
                                <?php }?>

                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="photo_kk" id="photo_kk" onchange="photoPreview(this,'preview')">
                                  <small class="help-block">Maximum file size is 2Mb</small>
                                  <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>  
                                </div>
                              </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Scan KTP</p>
                                <?php if (empty($penduduk->photo)) {?>
                                  <p><img id="preview_ktp" src="<?= base_url('app-assets/img/bg.png')?>" width="100%"/></p>
                                <?php }else{ ?>
                                  <p><img id="preview_ktp" src="<?php echo base_url('assets/photo/'.$penduduk->photo_ktp) ?>" width="100%"/></p>
                                <?php }?>

                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="photo_ktp" id="photo_ktp" onchange="photoPreview(this,'preview_ktp')">
                                  <small class="help-block">Maximum file size is 2Mb</small>
                                  <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>  
                                </div>
                              </fieldset>
                            </div>
                          </div>
                          <button type="submit" name="button" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
                          <?php echo $btn_back ?>
                        </div>
                        <br>
                      <?php echo form_close() ?>
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

<!-- Datatables -->
<script src="<?php echo base_url('assets/template/backend/') ?>js/plugin/datatables/datatables.min.js"></script>
<script src="<?php echo base_url('app-assets/js/data-tables/') ?>datatable-basic.js"></script>

<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>select2/dist/css/select2.min.css"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>select2/dist/css/select2-flat-theme.min.css"></script>
<script src="<?php echo base_url('assets/plugins/') ?>select2/dist/js/select2.full.min.js"></script>

<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"></script>
<script src="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>


<script>
    $('#tgl_lahir').datepicker({
        autoclose: true,
        zIndexOffset: 9999
    });

    $('input[name=check_domisili]').on('change', function(){
      if($(this).is(':checked')) {
        $('#alamat_domisili').val('Alamat identitas sama dengan alamat domisili.')
        $('#alamat_domisili').attr('disabled', true)
      } else {
      	$('#alamat_domisili').val('<?= $penduduk->alamat_domisili ?>')
        $('#alamat_domisili').attr('disabled', false)
      }
    })
    
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
          preview.file = gbPreview;
          reader.onload = (function(element)
          {
            return function(e)
            {
              element.src = e.target.result;
            };
          })(preview);
          reader.readAsDataURL(gbPreview);
        }
          else
          {
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
        var preview_ktp=document.getElementById(idpreview);
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
          })(preview_ktp);
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
        var preview_photo=document.getElementById(idpreview);
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
          })(preview_photo);
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
    
    


    $(document).ready(function() {
        $("#province").change(function() {
          let id_provinsi =  $("#province").val() 
            $.ajax({
                type: "GET", // Method pengiriman data bisa dengan GET atau POST
                url: `<?= site_url() ?>AjaxApi/getKabupaten?id_provinsi=${id_provinsi}`, // Isi dengan url/path file php yang dituju
                success: function(response) {
                  response = JSON.parse(response)
                  console.log(response)
                    let option = '<option value="">Pilih Kabupaten</option>'
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
        $("#kabupaten").change(function() {
          let id_kota_kab =  $("#kabupaten").val() 
            $.ajax({
                type: "GET", // Method pengiriman data bisa dengan GET atau POST
                url: `<?= site_url() ?>AjaxApi/getKecamatan?id_kota_kab=${id_kota_kab}`, // Isi dengan url/path file php yang dituju
                success: function(response) {
                  response = JSON.parse(response)
                  console.log(response)
                    let option = '<option value="">Pilih Kecamatan</option>'
                    for(const row of response){
                      option += `<option value="${row.id_kecamatan}">${row.kecamatan_name}</option>`
                    }
                    $('#kecamatan').html(option);
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(thrownError); // Munculkan alert error
                }
            });
        });
        $("#kecamatan").change(function() {
          let id_kecamatan =  $("#kecamatan").val() 
            $.ajax({
                type: "GET", // Method pengiriman data bisa dengan GET atau POST
                url: `<?= site_url() ?>AjaxApi/getDesa_kelurahan?id_kecamatan=${id_kecamatan}`, // Isi dengan url/path file php yang dituju
                success: function(response) {
                  response = JSON.parse(response)
                  console.log(response)
                    let option = '<option value="">Pilih Desa/Kelurahan</option>'
                    for(const row of response){
                      option += `<option value="${row.id_desa_kelurahan}">${row.desa_kelurahan}</option>`
                    }
                    $('#desa_kelurahan').html(option);
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(thrownError); // Munculkan alert error
                }
            });
        });
    });
</script>
