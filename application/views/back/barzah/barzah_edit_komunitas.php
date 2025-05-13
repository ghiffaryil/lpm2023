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

                <div class="col-lg-12">

                  <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                    <?php echo form_open_multipart($update_action_komunitas) ?>
                    <input type="hidden" name="id_transaksi_komunitas" value="<?php echo $data->id_transaksi_komunitas ?>">
                    <input type="hidden" name="code" value="<?php echo $data->code ?>">
                    <div class="form-body">
                      <div class="row">

                        <div class="col-xl-6 col-lg-6 col-md-12">
                          <fieldset class="form-group">
                            <p>No KTP</p>
                            <input type="text" class="form-control text-capitalize" id="nik" name="nik" value="<?php echo $data->nik ?>" readonly>
                          </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12">
                          <fieldset class="form-group">
                            <p>Nama PJ</p>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $data->nama ?>" readonly>
                          </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                          <fieldset class="form-group">
                            <p>Nama Komunitas</p>
                            <select type="text" class="form-control selectpicker" style="width: 100%" id="id_komunitas" name="id_komunitas">
                              <option value="" selected disabled>Pilih nama komunitas...</option>
                              <?php foreach ($komunitas as $row) { ?>
                                <option class="text-capitalize" value="<?php echo $row->id_komunitas ?>" <?php if ($data->id_komunitas == $row->id_komunitas) {
                                                                                                            echo "selected";
                                                                                                          } ?>>
                                  <?php echo $row->nama_komunitas ?>
                                </option>
                              <?php } ?>
                            </select>
                          </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1 d-none">
                          <fieldset class="form-group">
                            <p>Nama Program</p>
                            <input type="text" value="9" name="id_program" hidden>
                          </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                          <fieldset class="form-group">
                            <p>Sub Program</p>
                            <select class="form-control selectpicker" style="width: 100%" name="id_subprogram">
                              <option selected disabled>Pilih sub program...</option>
                              <?php foreach ($subprogram as $row) { ?>
                                <option class="text-capitalize" value="<?php echo $row->id_subprogram ?>" <?php if ($data->id_subprogram == $row->id_subprogram) {
                                                                                                            echo "selected";
                                                                                                          } ?>>
                                  <?php echo $row->nama_subprogram ?>
                                </option>
                              <?php } ?>
                            </select>
                          </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                          <fieldset class="form-group">
                            <p>Bentuk Manfaat/Kegiatan</p>
                            <input type="text" class="form-control" name="bentuk_layanan" id="bentuk_layanan" value="<?php echo $data->bentuk_manfaat ?>" required>
                          </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                          <fieldset class="form-group">
                            <p>Jumlah Individu</p>
                            <input type="number" class="form-control" name="jml_individu" id="jml_individu" value="<?php echo $data->jumlah_pm ?>" required>
                          </fieldset>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                          <fieldset class="form-group">
                            <p>Alamat / Lokasi</p>
                            <textarea type="text" name="alamat" id="alamat" class="form-control" rows="3" required><?php echo $data->alamat ?></textarea>
                          </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                          <fieldset class="form-group">
                            <p>Provinsi</p>
                            <select name="id_provinsi" class="form-control" id="province" name="id_provinsi">
                              <option>Pilih Provinsi</option>
                              <?php foreach ($get_all_provinsi as $row) {
                                if ($data->provinsi == $row->id_provinsi) {
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
                              <?php
                              if ($data->kota) {
                                echo '<option value="' . $data->kota . '" selected >' . ($data->kota_kab) . '</option>';
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
                              if ($data->kecamatan) {
                                echo '<option value="' . $data->kecamatan . '" selected >' . ($data->kecamatan_name) . '</option>';
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
                              if ($data->kelurahan) {
                                echo '<option value="' . $data->kelurahan . '" selected >' . ($data->desa_kelurahan) . '</option>';
                              }
                              ?>
                            </select>
                          </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                          <fieldset class="form-group">
                            <p>Asnaf</p>
                            <select class="form-control selectpicker" name="asnaf" required>
                              <option value="" selected disabled>Pilih asnaf...</option>
                              <option value="Mualaf" <?php if ($data->asnaf == 'Mualaf') {
                                                        echo "selected";
                                                      } ?>>Mualaf
                              </option>
                              <option value="Ghorimin" <?php if ($data->asnaf == 'Ghorimin') {
                                                          echo "selected";
                                                        } ?>>
                                Ghorimin</option>
                              <option value="Fisabilillah" <?php if ($data->asnaf == 'Fisabilillah') {
                                                              echo "selected";
                                                            } ?>>Fisabilillah</option>
                              <option value="Ibnu Sabil" <?php if ($data->asnaf == 'Ibnu Sabil') {
                                                            echo "selected";
                                                          } ?>>
                                Ibnu Sabil</option>
                              <option value="Fakir Miskin" <?php if ($data->asnaf == 'Fakir Miskin') {
                                                              echo "selected";
                                                            } ?>>Fakir Miskin</option>
                            </select>
                          </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                          <fieldset class="form-group">
                            <p>Sumber Dana</p>
                            <input type="text" class="form-control text-capitalize" id="sumber_dana" name="sumber_dana" value="<?php echo $data->sumber_dana ?>">
                          </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                          <fieldset class="form-group">
                            <p>Periode Menerima Manfaat</p>
                            <input type="date" class="form-control text-capitalize" id="periode_bantuan" name="periode_bantuan" value="<?php echo $data->periode_bantuan ?>">
                          </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                          <fieldset class="form-group">
                            <p>Total Periode</p>
                            <input type="number" class="form-control" name="total_periode" id="total_periode" value="<?php echo $data->total_periode ?>" required>
                          </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                          <fieldset class="form-group">
                            <p>Jumlah Bantuan</p>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span id="basic-addon1" class="input-group-text">Rp</span>
                              </div>
                              <input type="text" oninput="formatValue('jumlah_bantuan')" id="jumlah_bantuan" name="jumlah_bantuan" aria-describedby="basic-addon1" class="form-control" value="<?php echo $data->jumlah_bantuan ?>">
                            </div>
                          </fieldset>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12">
                          <fieldset class="form-group mb-1">
                            <p>Info Bantuan</p>
                            <select type="text" class="form-control selectpicker" style="width: 100%" name="info_bantuan" required>
                              <option value="" selected disabled>Pilih nama rekomender...</option>
                              <?php foreach ($rekomender as $row) { ?>
                                <option class="text-capitalize" value="<?php echo $row->id_rekomender ?>" <?php if ($data->info_bantuan == $row->id_rekomender) {
                                                                                                            echo "selected";
                                                                                                          } ?>>
                                  <?php echo $row->jenis_rekomender . ' - ' . $row->nama_rekomender ?>
                                </option>
                              <?php } ?>
                            </select>
                          </fieldset>
                        </div>

                      </div>

                      <?= $btn_submit ?>
                      <?php echo form_close() ?>
                      <?= $btn_back ?>
                    </div>
                    <br>
                    <?php echo form_close() ?>
                  </div>

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
  $(document).ready(function() {
    $('#nik').on('change', function() {
      var nik = $(this).val();
      $.ajax({
        type: "GET",
        url: "<?= base_url('barzah/get_data_penduduk') ?>",
        dataType: "JSON",
        data: {
          nik: nik
        },
        cache: false,
        success: function(data) {
          $.each(data, function(nama) {
            $('#nama').val(data.nama);
            $('#id_individu').val(data.id_individu);
          });
        }
      });
      return false;
    });
  });
  $(document).ready(function() {
    $('#nik_komunitas').on('change', function() {
      var nik = $(this).val();
      $.ajax({
        type: "GET",
        url: "<?= base_url('barzah/get_data_penduduk') ?>",
        dataType: "JSON",
        data: {
          nik: nik
        },
        cache: false,
        success: function(data) {
          $.each(data, function(nama) {
            $('#nama_komunitas').val(data.nama);
            $('#id_individu_komunitas').val(data.id_individu);
          });
        }
      });
      return false;
    });
  });

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