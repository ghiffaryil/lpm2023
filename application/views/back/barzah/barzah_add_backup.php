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

                <div class="row">
                  <div class="col-md-12">
                    <div class="card-body">
                      <ul class="nav nav-tabs">
                        <li class="nav-item">
                          <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Individu</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Komunitas</a>
                        </li>
                      </ul>
                      <div class="tab-content mt-4">
                        <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true">

                          <?php echo form_open_multipart($action) ?>
                          <div class="form-body">
                            <div class="row">

                              <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                  <p>No KTP</p>
                                  <select class="form-control selectpicker text-capitalize" id="nik" name="nik">
                                    <option>Silahkan pilih</option>
                                    <?php foreach ($get_penduduk as $row) {
                                      echo '<option value="' . $row->nik . '">' . ($row->nik) . ' - ' . ($row->nama) . '</option>';
                                    } ?>
                                  </select>
                                </fieldset>
                              </div>

                              <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                  <p>Nama Jenazah</p>
                                  <?php echo form_input($nama); ?>
                                </fieldset>
                              </div>

                              <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                  <p>Sebab Kematian</p>
                                  <?php echo form_input($sebab_kematian); ?>
                                </fieldset>
                              </div>

                              <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                  <p>Bentuk Layanan</p>
                                  <?php echo form_input($bentuk_layanan); ?>
                                </fieldset>
                              </div>

                              <div class="col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                  <p>Tempat Meninggal</p>
                                  <?php echo form_textarea($tempat_meninggal); ?>
                                </fieldset>
                              </div>

                              <div class="col-xl-6 col-lg-12 col-md-12 mb-1">
                                <fieldset class="form-group">
                                  <p>Meninggalkan</p>
                                  <?php echo form_textarea($meninggalkan); ?>
                                </fieldset>
                              </div>

                            </div>

                            <div class="row">
                              <div class="col-xl-12 col-lg-12 col-md-12">
                                <fieldset class="form-group">
                                  <hr>
                                  <h2>Rekomender</h2>
                                </fieldset>
                              </div>
                              <div class="col-xl-12 col-lg-12 col-md-12">
                                <fieldset class="form-group">
                                  <input name="check_domisili" type="radio" id="check_individu" checked>
                                  <span class="checkbox-label" for="check_individu">
                                    &nbsp; Individu
                                  </span><br>
                                  <input name="check_domisili" type="radio" id="check_lembaga">
                                  <span class="checkbox-label" for="check_lembaga">
                                    &nbsp; Lembaga
                                  </span>
                                </fieldset>
                              </div>
                            </div>

                            <div class="row">

                              <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                  <p>Nama <span id="labelLembaga" hidden>Lembaga</span></p>
                                  <?php echo form_input($bentuk_layanan); ?>
                                </fieldset>
                              </div>

                              <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                  <p>Alamat</p>
                                  <?php echo form_input($bentuk_layanan); ?>
                                </fieldset>
                              </div>

                              <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                  <p>Status Hubungan</p>
                                  <input type="text" name="status_hubungan" class="form-control" id="status_hubungan">
                                </fieldset>
                              </div>

                              <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                  <p>No Telpon</p>
                                  <?php echo form_input($sebab_kematian); ?>
                                </fieldset>
                              </div>

                            </div>

                            <?= $btn_submit ?>
                            <?php echo form_close() ?>
                            <?= $btn_back ?>
                          </div>
                          <br>

                          <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                            <div class="form-body">
                              <div class="row">

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                  <fieldset class="form-group">
                                    <p>No KTP22</p>
                                    <select class="form-control selectpicker text-capitalize" id="nik" name="nik">
                                      <option>Silahkan pilih</option>
                                      <?php foreach ($get_penduduk as $row) {
                                        echo '<option value="' . $row->nik . '">' . ($row->nik) . ' - ' . ($row->nama) . '</option>';
                                      } ?>
                                    </select>
                                  </fieldset>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                  <fieldset class="form-group">
                                    <p>Nama Jenazah</p>
                                    <?php echo form_input($nama); ?>
                                  </fieldset>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                  <fieldset class="form-group">
                                    <p>Sebab Kematian</p>
                                    <?php echo form_input($sebab_kematian); ?>
                                  </fieldset>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                  <fieldset class="form-group">
                                    <p>Bentuk Layanan</p>
                                    <?php echo form_input($bentuk_layanan); ?>
                                  </fieldset>
                                </div>

                                <div class="col-lg-6 col-md-12 mb-1">
                                  <fieldset class="form-group">
                                    <p>Tempat Meninggal</p>
                                    <?php echo form_textarea($tempat_meninggal); ?>
                                  </fieldset>
                                </div>

                                <div class="col-xl-6 col-lg-12 col-md-12 mb-1">
                                  <fieldset class="form-group">
                                    <p>Meninggalkan</p>
                                    <?php echo form_textarea($meninggalkan); ?>
                                  </fieldset>
                                </div>

                              </div>

                              <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                  <fieldset class="form-group">
                                    <hr>
                                    <h2>Rekomender</h2>
                                  </fieldset>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                  <fieldset class="form-group">
                                    <input name="check_domisili" type="radio" id="check_individu" checked>
                                    <span class="checkbox-label" for="check_individu">
                                      &nbsp; Individu
                                    </span><br>
                                    <input name="check_domisili" type="radio" id="check_lembaga">
                                    <span class="checkbox-label" for="check_lembaga">
                                      &nbsp; Lembaga
                                    </span>
                                  </fieldset>
                                </div>
                              </div>

                              <div class="row">

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                  <fieldset class="form-group">
                                    <p>Nama <span id="labelLembaga" hidden>Lembaga</span></p>
                                    <?php echo form_input($bentuk_layanan); ?>
                                  </fieldset>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                  <fieldset class="form-group">
                                    <p>Alamat</p>
                                    <?php echo form_input($bentuk_layanan); ?>
                                  </fieldset>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                  <fieldset class="form-group">
                                    <p>Status Hubungan</p>
                                    <input type="text" name="status_hubungan" class="form-control" id="status_hubungan">
                                  </fieldset>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                  <fieldset class="form-group">
                                    <p>No Telpon</p>
                                    <?php echo form_input($sebab_kematian); ?>
                                  </fieldset>
                                </div>

                              </div>

                              <?= $btn_submit ?>
                              <?php echo form_close() ?>
                              <?= $btn_back ?>
                            </div>
                          </div>

                        </div>
                      </div>
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
            $('#sebab_kematian').val(data.sebab_kematian);
            $('#bentuk_layanan').val(data.bentuk_layanan);
            $('#tempat_meninggal').val(data.tempat_meninggal);
            $('#meninggalkan').val(data.meninggalkan);
          });
        }
      });
      return false;
    });
  });
</script>
<script type="text/javascript">
  $('#check_individu').on('change', function() {
    if ($(this).is(':checked')) {
      $('#status_hubungan').attr('disabled', false)
      $('#labelLembaga').attr('hidden', true)
    } else {
      $('#status_hubungan').attr('disabled', true)
    }
  })

  $('#check_lembaga').on('change', function() {
    if ($(this).is(':checked')) {
      $('#status_hubungan').attr('disabled', true)
      $('#labelLembaga').attr('hidden', false)
    } else {
      $('#status_hubungan').attr('disabled', false)
    }
  })
</script>

</body>

</html>