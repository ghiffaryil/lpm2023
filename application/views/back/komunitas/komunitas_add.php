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
                <?php if ($this->session->flashdata('message')) {
                  echo $this->session->flashdata('message');
                } ?>
                <?php echo validation_errors(); ?>
                <div class="px-3">
                  <?php echo form_open_multipart($action, 'id="komunitas"') ?>
                  <div class="form-body">
                    <div class="row">

                      <div class="col-xl-6 col-lg-6 col-md-12 mb-1">

                        <fieldset class="form-group">
                          <p>Kategori Komunitas</p>
                          <select class="form-control selectpicker text-capitalize" id="kategori_komunitas" name="kategori_komunitas">
                            <option value="">Silahkan pilih</option>
                            <?php foreach ($get_kategori_komunitas as $row) {
                              echo '<option value="' . $row->id_kategori_komunitas . '">' . ($row->nama_kategori_komunitas) . '</option>';
                            } ?>
                          </select>
                        </fieldset>

                        <fieldset class="form-group" id="div_nik">
                          <p>No KTP</p>
                          <select class="form-control selectpicker text-capitalize" data-live-search="true" id="nik" name="nik">
                            <option>Silahkan pilih</option>
                            <?php foreach ($get_penduduk as $row) {
                              echo '<option value="' . $row->nik . '">' . ($row->nik) . ' - ' . ($row->nama) . '</option>';
                            } ?>
                          </select>
                        </fieldset>




                      </div>

                      <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                          <p>Nama Komunitas</p>
                          <?php echo form_input($nama_komunitas); ?>
                        </fieldset>

                        <fieldset class="form-group" id="div_pj">
                          <p>Nama Lengkap (Penangung Jawab)</p>
                          <?php echo form_input($nama); ?>
                        </fieldset>

                      </div>

                      <div class="col-xl-6 col-lg-6 col-md-12 mb-1">


                        <fieldset class="form-group">
                          <p>No Telpon</p>
                          <?php echo form_input($no_telpon); ?>
                        </fieldset>
                      </div>




                      <div class="col-lg-12 col-md-12 mb-1">
                        <fieldset class="form-group">
                          <p>Profil Komunitas</p>
                          <?php echo form_textarea($profil_komunitas); ?>
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
                          <?php echo form_textarea($alamat); ?>
                        </fieldset>
                      </div>

                      <div class="col-xl-6 col-lg-12 col-md-12 mb-1">
                        <fieldset class="form-group">
                          <p>Negara</p>
                          <select class="form-control selectpicker" id="negara" name="negara">
                            <option>Pilih Negara</option>
                            <?php foreach ($get_negara as $row) {
                              if ($row->nama_negara == 'Indonesia') {
                                echo '<option value="' . $row->nama_negara . '" selected>' . ($row->nama_negara) . '</option>';
                              } else {
                                echo '<option value="' . $row->nama_negara . '">' . ($row->nama_negara) . '</option>';
                              }
                            } ?>
                          </select>
                        </fieldset>
                      </div>

                      <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                          <p>Provinsi</p>
                          <select name="id_provinsi" class="form-control selectpicker" id="province" name="id_provinsi">
                            <option>Pilih Provinsi</option>
                            <?php foreach ($get_all_provinsi as $row) {
                              echo '<option value="' . $row->id_provinsi . '">' . ($row->provinsi) . '</option>';
                            } ?>
                          </select>
                        </fieldset>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                          <p>Kota/Kabupaten</p>
                          <select class="form-control selectpicker" id="kabupaten" name="id_kota_kab">
                            <option>Pilih Kabupaten</option>
                          </select>
                        </fieldset>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                          <p>Kecamatan</p>
                          <select class="form-control selectpicker" id="kecamatan" name="id_kecamatan">
                            <option>Pilih Kecamatan</option>
                          </select>
                        </fieldset>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                          <p>Desa/Kelurahan</p>
                          <select class="form-control selectpicker" id="desa_kelurahan" name="id_desa_kelurahan">
                            <option>Pilih Desa/Kelurahan</option>
                          </select>
                        </fieldset>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                        <fieldset class="form-group">
                          <p>Kode Pos</p>
                          <input class="form-control" id="kodepos" name="kodepos" />
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
                          <p><img id="preview" src="<?= base_url('app-assets/img/bg.png') ?>" width="100%" /></p>

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
                          <p><img id="preview2" src="<?= base_url('app-assets/img/bg.png') ?>" width="100%" /></p>

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
                          <p><img id="preview3" src="<?= base_url('app-assets/img/bg.png') ?>" width="100%" /></p>

                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="legalitas_3" id="legalitas_3" onchange="photoPreview(this,'preview3')">
                            <small class="help-block">Maximum file size is 2Mb</small>
                            <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>
                          </div>
                        </fieldset>
                      </div>

                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> <?= $btn_submit ?></button>
                    <?php echo form_close() ?>
                    <button type="button" onclick="history.back()" class="btn btn-secondary"><?= $btn_back ?></button>
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

<script type="text/javascript">
  $('#komunitas').submit(function(e) {
    e.preventDefault();
    var data = new FormData($("#komunitas")[0]);
    $.ajax({
      url: '<?php echo base_url("komunitas/create_action") ?>',
      type: 'post',
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      success: function(data) {
        if (data === 'exist') {
          Swal.fire({
            title: "Oops!",
            html: "Data already exists.",
            icon: "error",
            showCancelButton: false,
            confirmButtonText: 'Oke',
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.reload();
            }
          })
        } else if (data === 'trash') {
          Swal.fire({
            title: "Oops!",
            html: "Community name already exists in Recycle Bin.",
            icon: "error",
            showCancelButton: false,
            confirmButtonText: 'Oke',
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.reload();
            }
          })
        } else {
          Swal.fire({
            title: "Yeah!",
            html: "Your data has been saved.",
            icon: "success",
            showCancelButton: false,
            confirmButtonText: 'Oke',
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.reload();
            }
          })
        }
      },
      error: function(data) {
        Swal.fire('Oops!', 'Data failed to save.', 'error');
      },
    });
  });
</script>

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
      var nik = $('#nik').val();
      $.ajax({
        type: "get",
        url: "<?= base_url('komunitas/get_data_penduduk/') ?>"+nik,
        dataType: "JSON",
        success: function(data) {
          $('#nama').val(data.nama);          
        }
      });
    });


    $('#kategori_komunitas').on('change', function() {
      var kategori_komunitas = $(this).val();
      if (kategori_komunitas == 3) {
        document.getElementById("div_nik").style.display = "none";
        document.getElementById("div_pj").style.display = "none";
      } else {
        document.getElementById("div_nik").style.display = "block";
        document.getElementById("div_pj").style.display = "block";
      }
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