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
                <?php if ($this->session->flashdata('message')) {
                  echo $this->session->flashdata('message');
                } ?>
                <?php echo validation_errors(); ?>
                <div class="px-3">
                  <?php echo form_open_multipart($action) ?>
                  <input type="hidden" name="id_komunitas" class="form-control" value="<?php echo $komunitas->id_komunitas; ?>">
                  <div class="form-body">
                    <div class="row">

                      <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                          <p>No KTP</p>
                          <select class="form-control selectpicker text-capitalize" id="nik" name="nik">
                            <?php foreach ($get_penduduk as $row) {
                              if ($komunitas->nik == $row->nik) {
                                echo '<option value="' . $row->nik . '" selected >' . ($row->nik) . ' - ' . ($row->nama) . '</option>';
                              } else {
                                echo '<option value="' . $row->nik . '" >' . ($row->nik) . ' - ' . ($row->nama) . '</option>';
                              }
                            } ?>
                          </select>
                        </fieldset>

                        <fieldset class="form-group">
                          <p>Kategori Komunitas</p>
                          <select class="form-control selectpicker text-capitalize" id="kategori_komunitas" name="kategori_komunitas">
                            <option value="">Pilih Kategori Komunitas</option>
                            <?php foreach ($get_kategori_komunitas as $row) {
                              if ($komunitas->kategori_komunitas == $row->id_kategori_komunitas) {
                                echo '<option value="' . $row->id_kategori_komunitas . '" selected >' . ($row->nama_kategori_komunitas) . '</option>';
                              } else {
                                echo '<option value="' . $row->id_kategori_komunitas . '" >' . ($row->nama_kategori_komunitas) . '</option>';
                              }
                            } ?>
                          </select>
                        </fieldset>


                      </div>

                      <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                          <p>Nama Komunitas</p>
                          <input type="text" name="nama_komunitas" class="form-control" value="<?php echo $komunitas->nama_komunitas; ?>">
                        </fieldset>

                        <fieldset class="form-group">
                          <p>Nama Lengkap (Penangung Jawab)</p>
                          <input type="text" name="nama" class="form-control" value="<?php echo $komunitas->nama; ?>">
                        </fieldset>
                      </div>

                      <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                          <p>No Telpon</p>
                          <input type="text" name="no_telpon" class="form-control" value="<?php echo $komunitas->no_telpon; ?>">
                        </fieldset>
                      </div>

                      <div class="col-lg-12 col-md-12 mb-1">
                        <fieldset class="form-group">
                          <p>Profil Komunitas</p>
                          <textarea type="text" name="profil_komunitas" class="form-control"><?php echo $komunitas->profil_komunitas; ?></textarea>
                        </fieldset>
                      </div>

                      <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                        <fieldset class="form-group">
                          <hr>
                          <h4 class="card-title mb-0">Alamat Komunitas</h4>
                          <p>Silahkan sertakan alamat komunitas/lembaga/intansi dengan jelas.</p>
                        </fieldset>
                      </div>

                      <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                        <fieldset class="form-group">
                          <p>Alamat Lengkap</p>
                          <textarea type="text" name="alamat" class="form-control"><?php echo $komunitas->alamat; ?></textarea>
                        </fieldset>
                      </div>

                      <div class="col-xl-6 col-lg-12 col-md-12 mb-1">
                        <fieldset class="form-group">
                          <p>Negara</p>
                          <select class="form-control" id="negara" name="negara">
                            <option>Pilih Negara</option>
                            <?php foreach ($get_negara as $row) { ?>
                              <option value="<?php echo $row->nama_negara; ?>" <?php if ($komunitas->negara == $row->nama_negara) {echo 'selected';} ?>><?php echo $row->nama_negara; ?></option>
                            <?php } ?>
                          </select>
                        </fieldset>
                      </div>

                      <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                          <p>Provinsi</p>
                          <select class="form-control" id="province" name="id_provinsi">
                            <option>Pilih Provinsi</option>
                            <?php foreach ($get_all_provinsi as $row) {
                              if ($komunitas->id_provinsi == $row->id_provinsi) {
                                echo '<option value="' . $row->id_provinsi . '" selected >' . ($row->provinsi) . '</option>';
                              } else {
                                echo '<option value="' . $row->id_provinsi . '" >' . ($row->provinsi) . '</option>';
                              }
                            } ?>
                          </select>
                        </fieldset>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                          <p>Kota/Kabupaten</p>
                          <select class="form-control" id="kabupaten" name="id_kota_kab">
                            <?php foreach ($get_all_kabupaten as $row) {
                              if ($komunitas->id_kota_kab == $row->id_kota_kab) {
                                echo '<option value="' . $row->id_kota_kab . '" selected >' . ($row->kota_kab) . '</option>';
                              }
                            } ?>
                          </select>
                        </fieldset>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                          <p>Kecamatan</p>
                          <select class="form-control" id="kecamatan" name="id_kecamatan">
                            <?php foreach ($get_all_kecamatan as $row) {
                              if ($komunitas->id_kecamatan == $row->id_kecamatan) {
                                echo '<option value="' . $row->id_kecamatan . '" selected >' . ($row->kecamatan_name) . '</option>';
                              }
                            } ?>
                          </select>
                        </fieldset>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                          <p>Desa/Kelurahan</p>
                          <select class="form-control" id="desa_kelurahan" name="id_desa_kelurahan">
                            <?php foreach ($get_all_kelurahan as $row) {
                              if ($komunitas->id_desa_kelurahan == $row->id_desa_kelurahan) {
                                echo '<option value="' . $row->id_desa_kelurahan . '" selected >' . ($row->desa_kelurahan) . '</option>';
                              }
                            } ?>
                          </select>
                        </fieldset>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                          <p>Kode Pos</p>
                          <input type="text" name="kodepos" class="form-control" value="<?php echo $komunitas->kodepos; ?>">
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
                          <p>Legalitas 1</p>
                          <?php if (empty($komunitas->legalitas_1)) { ?>
                            <p><img id="preview" src="<?= base_url('app-assets/img/bg.png') ?>" width="100%" /></p>
                          <?php } else { ?>
                            <p><img id="preview" src="<?php echo base_url('assets/lampiran/' . $komunitas->legalitas_1) ?>" width="100%" /></p>
                          <?php } ?>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="legalitas_1" id="legalitas_1" onchange="photoPreview(this,'preview')">
                            <small class="help-block">Maximum file size is 2Mb</small>
                            <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>
                          </div>
                        </fieldset>
                      </div>
                      <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                          <p>Legalitas 2</p>
                          <?php if (empty($komunitas->legalitas_2)) { ?>
                            <p><img id="preview2" src="<?= base_url('app-assets/img/bg.png') ?>" width="100%" /></p>
                          <?php } else { ?>
                            <p><img id="preview2" src="<?php echo base_url('assets/lampiran/' . $komunitas->legalitas_2) ?>" width="100%" /></p>
                          <?php } ?>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="legalitas_2" id="legalitas_2" onchange="photoPreview(this,'preview2')">
                            <small class="help-block">Maximum file size is 2Mb</small>
                            <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>
                          </div>
                        </fieldset>
                      </div>
                      <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                          <p>Legalitas 3</p>
                          <?php if (empty($komunitas->legalitas_3)) { ?>
                            <p><img id="preview3" src="<?= base_url('app-assets/img/bg.png') ?>" width="100%" /></p>
                          <?php } else { ?>
                            <p><img id="preview3" src="<?php echo base_url('assets/lampiran/' . $komunitas->legalitas_3) ?>" width="100%" /></p>
                          <?php } ?>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="legalitas_3" id="legalitas_3" onchange="photoPreview(this,'preview3')">
                            <small class="help-block">Maximum file size is 2Mb</small>
                            <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>
                          </div>
                        </fieldset>
                      </div>

                    </div>
                    <button type="submit" name="button" class="btn btn-success"><i class="fa fa-save"></i> <?= $btn_submit ?></button>
                    <?php echo form_close() ?>
                    <button type="button" onclick="history.back()" class="btn btn-success"><?= $btn_back ?></button>
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
<script>
  function photoPreview(photo, idpreview) {
    var gb = photo.files;
    for (var i = 0; i < gb.length; i++) {
      var gbPreview = gb[i];
      var imageType = /image.*/;
      var preview = document.getElementById(idpreview);
      var reader = new FileReader();
      if (gbPreview.type.match(imageType)) {
        //jika tipe data sesuai
        preview.file = gbPreview;
        reader.onload = (function(element) {
          return function(e) {
            element.src = e.target.result;
          };
        })(preview);
        //membaca data URL gambar
        reader.readAsDataURL(gbPreview);
      } else {
        //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
    }
  }

  function photoPreview(photo, idpreview) {
    var gb = photo.files;
    for (var i = 0; i < gb.length; i++) {
      var gbPreview = gb[i];
      var imageType = /image.*/;
      var preview3 = document.getElementById(idpreview);
      var reader = new FileReader();
      if (gbPreview.type.match(imageType)) {
        //jika tipe data sesuai
        preview.file = gbPreview;
        reader.onload = (function(element) {
          return function(e) {
            element.src = e.target.result;
          };
        })(preview3);
        //membaca data URL gambar
        reader.readAsDataURL(gbPreview);
      } else {
        //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
    }
  }

  function photoPreview(photo, idpreview) {
    var gb = photo.files;
    for (var i = 0; i < gb.length; i++) {
      var gbPreview = gb[i];
      var imageType = /image.*/;
      var preview2 = document.getElementById(idpreview);
      var reader = new FileReader();
      if (gbPreview.type.match(imageType)) {
        //jika tipe data sesuai
        preview.file = gbPreview;
        reader.onload = (function(element) {
          return function(e) {
            element.src = e.target.result;
          };
        })(preview2);
        //membaca data URL gambar
        reader.readAsDataURL(gbPreview);
      } else {
        //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
    }
  }
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#nik').on('change', function() {
      var nik = $(this).val();
      $.ajax({
        type: "GET",
        url: "<?= base_url('komunitas/get_data_penduduk') ?>",
        dataType: "JSON",
        data: {
          nik: nik
        },
        cache: false,
        success: function(data) {
          $.each(data, function(nama) {
            $('#nama').val(data.nama);
          });
        }
      });
      return false;
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#province").change(function() {
      let id_provinsi = $("#province").val()
      $.ajax({
        type: "GET", // Method pengiriman data bisa dengan GET atau POST
        url: `<?= site_url() ?>AjaxApi/getKabupaten?id_provinsi=${id_provinsi}`, // Isi dengan url/path file php yang dituju
        success: function(response) {
          response = JSON.parse(response)
          console.log(response)
          let option = '<option value="">Pilih Kabupaten</option>'
          for (const row of response) {
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
      let id_kota_kab = $("#kabupaten").val()
      $.ajax({
        type: "GET", // Method pengiriman data bisa dengan GET atau POST
        url: `<?= site_url() ?>AjaxApi/getKecamatan?id_kota_kab=${id_kota_kab}`, // Isi dengan url/path file php yang dituju
        success: function(response) {
          response = JSON.parse(response)
          console.log(response)
          let option = '<option value="">Pilih Kecamatan</option>'
          for (const row of response) {
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
      let id_kecamatan = $("#kecamatan").val()
      $.ajax({
        type: "GET", // Method pengiriman data bisa dengan GET atau POST
        url: `<?= site_url() ?>AjaxApi/getDesa_kelurahan?id_kecamatan=${id_kecamatan}`, // Isi dengan url/path file php yang dituju
        success: function(response) {
          response = JSON.parse(response)
          console.log(response)
          let option = '<option value="">Pilih Desa/Kelurahan</option>'
          for (const row of response) {
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
</body>

</html>