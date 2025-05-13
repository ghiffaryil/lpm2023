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
                  <?php if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                  } ?>
                  <?php echo validation_errors(); ?>
                  <?php echo form_open_multipart($update_action_individu) ?>
                  <input type="text" name="id_transaksi_individu" value="<?php echo $data->id_transaksi_individu ?>" hidden>
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
                              <option class="text-capitalize" value="<?php echo $row->id_subprogram ?>" <?php if ($row->id_subprogram == $data->id_subprogram) {
                                                                                                          echo 'selected';
                                                                                                        } ?>>
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
                            <option value="Mualaf" <?php if ('Mualaf' == $data->asnaf) {
                                                      echo 'selected';
                                                    } ?>>Mualaf</option>
                            <option value="Ghorimin" <?php if ('Ghorimin' == $data->asnaf) {
                                                        echo 'selected';
                                                      } ?>>Ghorimin</option>
                            <option value="Fisabilillah" <?php if ('Fisabilillah' == $data->asnaf) {
                                                            echo 'selected';
                                                          } ?>>Fisabilillah</option>
                            <option value="Ibnu Sabil" <?php if ('Ibnu Sabil' == $data->asnaf) {
                                                          echo 'selected';
                                                        } ?>>Ibnu Sabil</option>
                            <option value="Fakir Miskin" <?php if ('Fakir Miskin' == $data->asnaf) {
                                                            echo 'selected';
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

                      <div class="col-xl-6 col-lg-6 col-md-12">
                        <fieldset class="form-group">
                          <p>Sebab Kematian</p>
                          <input type="text" class="form-control" name="sebab_kematian" id="sebab_kematian" value="<?php echo $data->sebab_kematian ?>" required>
                        </fieldset>
                      </div>

                      <div class="col-xl-6 col-lg-6 col-md-12">
                        <fieldset class="form-group">
                          <p>Bentuk Layanan</p>
                          <input type="text" class="form-control" name="bentuk_layanan" id="bentuk_layanan" value="<?php echo $data->jenis_bantuan ?>" required>
                        </fieldset>
                      </div>

                      <div class="col-lg-6 col-md-12">
                        <fieldset class="form-group">
                          <p>Tempat Meninggal</p>
                          <input type="text" class="form-control" name="tempat_meninggal" id="tempat_meninggal" value="<?php echo $data->tempat_meninggal ?>" required>
                        </fieldset>
                      </div>

                      <div class="col-xl-6 col-lg-12 col-md-12">
                        <fieldset class="form-group">
                          <p>Meninggalkan</p>
                          <input type="text" class="form-control" name="meninggalkan" id="meninggalkan" value="<?php echo $data->meninggalkan ?>" required>
                        </fieldset>
                      </div>

                      <div class="col-xl-6 col-lg-6 col-md-12">
                        <fieldset class="form-group">
                          <p>Info Bantuan</p>
                          <select type="text" class="form-control selectpicker" style="width: 100%" name="info_bantuan" required>
                            <option value="" selected disabled>Pilih nama rekomender...</option>
                            <?php foreach ($rekomender as $row) { ?>
                              <option class="text-capitalize" value="<?php echo $row->id_rekomender ?>" <?php if ($row->id_rekomender == $data->info_bantuan) {
                                                                                                          echo 'selected';
                                                                                                        } ?>>
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
                              <option class="text-capitalize" value="<?php echo $row->id_petugas ?>" <?php if ($row->id_petugas == $data->petugas) {
                                                                                                        echo 'selected';
                                                                                                      } ?>>
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