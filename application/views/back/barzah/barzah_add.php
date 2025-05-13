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
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Individu</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Komunitas</a>
                    </li>
                  </ul>
                  <div class="tab-content mt-4">
                    <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                      <?php if ($this->session->flashdata('message')) {
                        echo $this->session->flashdata('message');
                      } ?>
                      <?php echo validation_errors(); ?>
                      <?php echo form_open_multipart($action_individu) ?>
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
                              <p>Nama Jenazah</p>
                              <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $data->nama ?>" readonly>
                              <input type="hidden" name="id_individu" id="id_individu" value="<?php echo $data->id_individu ?>">
                            </fieldset>
                          </div>

                          <div class="col-xl-6 col-lg-6 col-md-12">
                            <fieldset class="form-group">
                              <p>Sub Program</p>
                              <select class="form-control selectpicker" style="width: 100%" name="id_subprogram" required>
                                <option selected disabled>Pilih sub program...</option>
                                <?php foreach ($subprogram as $row) { ?>
                                  <option class="text-capitalize" value="<?php echo $row->id_subprogram ?>">
                                    <?php echo $row->nama_subprogram ?>
                                  </option>
                                <?php } ?>
                              </select>
                            </fieldset>
                          </div>
                          <div class="col-xl-6 col-lg-6 col-md-12">
                            <fieldset class="form-group">
                              <p>Asnaf</p>
                              <select class="form-control selectpicker" name="asnaf" required>
                                <option value="" selected disabled>Pilih asnaf...</option>
                                <option value="Mualaf">Mualaf</option>
                                <option value="Ghorimin">Ghorimin</option>
                                <option value="Fisabilillah">Fisabilillah</option>
                                <option value="Ibnu Sabil">Ibnu Sabil</option>
                                <option value="Fakir Miskin">Fakir Miskin</option>
                              </select>
                            </fieldset>
                          </div>

                          <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                              <p>Sumber Dana</p>
                              <input type="text" class="form-control text-capitalize" id="sumber_dana" name="sumber_dana">
                            </fieldset>
                          </div>

                          <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                              <p>Periode Menerima Manfaat</p>
                              <input type="date" class="form-control text-capitalize" id="periode_bantuan" name="periode_bantuan">
                            </fieldset>
                          </div>

                          <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                              <p>Total Periode</p>
                              <input type="number" class="form-control" name="total_periode" id="total_periode" required>
                            </fieldset>
                          </div>

                          <div class="col-xl-6 col-lg-6 col-md-12">
                            <fieldset class="form-group">
                              <p>Sebab Kematian</p>
                              <input type="text" class="form-control" name="sebab_kematian" id="sebab_kematian" required>
                            </fieldset>
                          </div>

                          <div class="col-xl-6 col-lg-6 col-md-12">
                            <fieldset class="form-group">
                              <p>Bentuk Layanan</p>
                              <input type="text" class="form-control" name="bentuk_layanan" id="bentuk_layanan" required>
                            </fieldset>
                          </div>

                          <div class="col-lg-6 col-md-12">
                            <fieldset class="form-group">
                              <p>Tempat Meninggal</p>
                              <input type="text" class="form-control" name="tempat_meninggal" id="tempat_meninggal" required>
                            </fieldset>
                          </div>

                          <div class="col-xl-6 col-lg-12 col-md-12">
                            <fieldset class="form-group">
                              <p>Meninggalkan</p>
                              <input type="text" class="form-control" name="meninggalkan" id="meninggalkan" required>
                            </fieldset>
                          </div>

                          <div class="col-xl-6 col-lg-6 col-md-12">
                            <fieldset class="form-group">
                              <p>Info Bantuan</p>
                              <select type="text" class="form-control selectpicker" style="width: 100%" name="info_bantuan" required>
                                <option value="" selected disabled>Pilih nama rekomender...</option>
                                <?php foreach ($rekomender as $row) { ?>
                                  <option class="text-capitalize" value="<?php echo $row->id_rekomender ?>">
                                    <?php echo $row->jenis_rekomender . ' - ' . $row->nama_rekomender ?>
                                  </option>
                                <?php } ?>
                              </select>
                            </fieldset>
                          </div>

                          <div class="col-xl-6 col-lg-6 col-md-12">
                            <fieldset class="form-group">
                              <p>Petugas</p>
                              <select type="text" class="form-control selectpicker" style="width: 100%" name="petugas" required>
                                <option value="" selected disabled>Pilih nama petugas...</option>
                                <?php foreach ($petugas as $row) { ?>
                                  <option class="text-capitalize" value="<?php echo $row->id_petugas ?>">
                                    <?php echo $row->nama_1 . ' & ' . $row->nama_2 ?>
                                  </option>
                                <?php } ?>
                              </select>
                            </fieldset>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-xl-12 col-lg-12 col-md-12">
                            <fieldset class="form-group">
                              <?= $btn_submit . ' ' . form_close() . ' ' . $btn_back ?>
                            </fieldset>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                      <?php echo form_open_multipart($action_komunitas) ?>
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
                              <input type="hidden" name="id_individu" id="id_individu" value="<?php echo $data->id_individu ?>">
                            </fieldset>
                          </div>

                          <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                              <p>Nama Komunitas</p>
                              <select type="text" class="form-control selectpicker" style="width: 100%" id="id_komunitas" name="id_komunitas">
                                <option value="" selected disabled>Pilih nama komunitas...</option>
                                <?php foreach ($komunitas as $row) { ?>
                                  <option class="text-capitalize" value="<?php echo $row->id_komunitas ?>">
                                    <?php echo $row->nama_komunitas ?>
                                  </option>
                                <?php } ?>
                              </select>
                            </fieldset>
                          </div>

                          <div class="col-xl-6 col-lg-6 col-md-12 mb-1 d-none">
                            <fieldset class="form-group">
                              <p>Nama Program</p>
                              <select type="text" class="form-control selectpicker" style="width: 100%" id="id_program" name="id_program">
                                <option value="" selected disabled>Pilih nama program...</option>
                                <?php foreach ($program as $row) { ?>
                                  <option class="text-capitalize" value="<?php echo $row->id_program ?>" selected>
                                    <?php echo $row->nama_program ?>
                                  </option>
                                <?php } ?>
                              </select>
                            </fieldset>
                          </div>

                          <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                              <p>Sub Program</p>
                              <select class="form-control selectpicker" style="width: 100%" name="id_subprogram">
                                <option selected disabled>Pilih sub program...</option>
                                <?php foreach ($subprogram as $row) { ?>
                                  <option class="text-capitalize" value="<?php echo $row->id_subprogram ?>">
                                    <?php echo $row->nama_subprogram ?>
                                  </option>
                                <?php } ?>
                              </select>
                            </fieldset>
                          </div>

                          <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                              <p>Bentuk Manfaat/Kegiatan</p>
                              <input type="text" class="form-control" name="bentuk_layanan" id="bentuk_layanan" required>
                            </fieldset>
                          </div>

                          <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                              <p>Jumlah Individu</p>
                              <input type="number" class="form-control" name="jml_individu" id="jml_individu" required>
                            </fieldset>
                          </div>

                          <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                            <fieldset class="form-group">
                              <p>Alamat / Lokasi</p>
                              <textarea type="text" name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
                            </fieldset>
                          </div>

                          <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                              <p>Provinsi</p>
                              <select name="id_provinsi" style="width: 100%" class="form-control selectpicker" id="province">
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
                              <select class="form-control selectpicker" style="width: 100%" id="kabupaten" name="id_kota_kab">
                                <option>Pilih Kabupaten</option>
                              </select>
                            </fieldset>
                          </div>
                          <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                              <p>Kecamatan</p>
                              <select class="form-control selectpicker" style="width: 100%" id="kecamatan" name="id_kecamatan">
                                <option>Pilih Kecamatan</option>
                              </select>
                            </fieldset>
                          </div>
                          <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                              <p>Desa/Kelurahan</p>
                              <select class="form-control selectpicker" style="width: 100%" id="desa_kelurahan" name="id_desa_kelurahan">
                                <option>Pilih Desa/Kelurahan</option>
                              </select>
                            </fieldset>
                          </div>

                          <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                              <p>Asnaf</p>
                              <select class="form-control selectpicker" style="width: 100%" name="asnaf" id="asnaf" required>
                                <option value="" selected disabled>Pilih asnaf...</option>
                                <option value="Mualaf">Mualaf</option>
                                <option value="Ghorimin">Ghorimin</option>
                                <option value="Fisabilillah">Fisabilillah</option>
                                <option value="Ibnu Sabil">Ibnu Sabil</option>
                                <option value="Fakir Miskin">Fakir Miskin</option>
                              </select>
                            </fieldset>
                          </div>

                          <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                              <p>Sumber Dana</p>
                              <input type="text" class="form-control text-capitalize" id="sumber_dana" name="sumber_dana">
                            </fieldset>
                          </div>

                          <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                              <p>Periode Menerima Manfaat</p>
                              <input type="date" class="form-control text-capitalize" id="periode_bantuan" name="periode_bantuan">
                            </fieldset>
                          </div>

                          <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                              <p>Total Periode</p>
                              <input type="number" class="form-control" name="total_periode" id="total_periode" required>
                            </fieldset>
                          </div>

                          <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                              <p>Jumlah Bantuan</p>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span id="basic-addon1" class="input-group-text">Rp</span>
                                </div>
                                <input type="text" oninput="formatValue('jumlah_bantuan')" id="jumlah_bantuan" name="jumlah_bantuan" aria-describedby="basic-addon1" class="form-control">
                              </div>
                            </fieldset>
                          </div>

                          <div class="col-xl-6 col-lg-6 col-md-12">
                            <fieldset class="form-group mb-1">
                              <p>Info Bantuan</p>
                              <select type="text" class="form-control selectpicker" style="width: 100%" name="info_bantuan" required>
                                <option value="" selected disabled>Pilih nama rekomender...</option>
                                <?php foreach ($rekomender as $row) { ?>
                                  <option class="text-capitalize" value="<?php echo $row->id_rekomender ?>">
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