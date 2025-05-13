<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<div class="main-panel">
  <!-- BEGIN : Main Content-->
  <div class="main-content">
    <div class="content-wrapper">
      <!-- Basic Elements start -->
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
                <div class="card-title text-uppercase">Edit Transaksi Individu</div>
              </div>
              <div class="card-content">
                <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                <?php echo validation_errors(); ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card-body">
                      <?php echo form_open_multipart($update_action_individu) ?>
                      <input type="hidden" name="id_individu" value="<?php echo $data->id_individu ?>">
                      <input type="hidden" name="id_transaksi_individu"
                        value="<?php echo $data->id_transaksi_individu ?>">
                      <div class="form-body">
                        <div class="row">
                          <div class="col-md-6 mb-2">
                            <div class="row">
                              <div class="col-md-6">
                                <fieldset class="form-group">
                                  <p>No KTP</p>
                                  <input type="text" class="form-control text-capitalize" id="nik" name="nik"
                                    value="<?php echo $data->nik ?>" readonly>
                                </fieldset>
                              </div>
                              <div class="col-md-6">
                                <fieldset class="form-group">
                                  <p>Nama Passien</p>
                                  <input type="text" id="nama" name="nama" value="<?php echo $data->nama ?>"
                                    class="form-control text-capitalize" aria-describedby="basic-addon4" readonly>
                                </fieldset>
                              </div>
                            </div>
                            <fieldset class="form-group">
                              <p>Info Bantuan</p>
                              <select type="text" class="form-control selectpicker" style="width: 100%"
                                name="info_bantuan">
                                <option value="" selected disabled>Pilih nama rekomender...</option>
                                <?php foreach($rekomender as $row) { ?>
                                <option class="text-capitalize" value="<?php echo $row->id_rekomender ?>"
                                  <?php if ($data->info_bantuan == $row->id_rekomender){echo "selected";} ?>>
                                  <?php echo $row->jenis_rekomender.' - '.$row->nama_rekomender ?>
                                </option>
                                <?php } ?>
                              </select>
                            </fieldset>
                            <fieldset class="form-group">
                              <p>Jumlah Penghasilan Perbulan</p>
                              <input type="number" class="form-control text-capitalize" id="bentuk_manfaat"
                                name="penghasilan_bulan" value="<?php echo $data->penghasilan_bulan ?>">
                            </fieldset>
                            <div class="row">
                              <div class="col-md-6">
                                <fieldset class="form-group ditolak">
                                  <p>Periode Penerima Bantuan</p>
                                  <input type="date" class="form-control text-capitalize periode_bantuan "
                                    name="periode_bantuan" id="periode_bantuan"
                                    value="<?php echo $data->periode_bantuan ?>">
                                </fieldset>
                              </div>
                              <div class="col-md-6">
                                <fieldset class="form-group" disabled>
                                  <p>Total Periode</p>
                                  <input type="text" class="form-control text-capitalize periode_bantuan "
                                    name="total_periode" id="total_periode" value="<?php echo $data->total_periode ?>">
                                </fieldset>
                              </div>
                            </div>
                            <fieldset class="form-group">
                              <p>Penyakit</p>
                              <input type="text" class="form-control text-capitalize" id="penyakit" name="penyakit"
                                value="<?php echo $data->penyakit ?>">
                            </fieldset>
                          </div>
                          <div class="col-md-6">
                            <fieldset class="form-group">
                              <p>Asnaf</p>
                              <select class="form-control selectpicker" name="asnaf" required>
                                <option value="" selected disabled>Pilih asnaf...</option>
                                <option value="Mualaf" <?php if ($data->asnaf == 'Mualaf'){echo "selected";}?>>Mualaf
                                </option>
                                <option value="Ghorimin" <?php if ($data->asnaf == 'Ghorimin'){echo "selected";}?>>
                                  Ghorimin</option>
                                <option value="Fisabilillah"
                                  <?php if ($data->asnaf == 'Fisabilillah'){echo "selected";}?>>Fisabilillah</option>
                                <option value="Ibnu Sabil" <?php if ($data->asnaf == 'Ibnu Sabil'){echo "selected";}?>>
                                  Ibnu Sabil</option>
                                <option value="Fakir Miskin"
                                  <?php if ($data->asnaf == 'Fakir Miskin'){echo "selected";}?>>Fakir Miskin</option>
                              </select>
                            </fieldset>
                            <fieldset class="form-group" hidden>
                              <p>Nama Program</p>
                              <input type="hidden" class="form-control text-capitalize" id="id_program"
                                name="id_program" value="<?php echo $data->id_program ?>">
                            </fieldset>

                            <fieldset class="form-group">
                              <p>Sub Program</p>
                              <select class="form-control selectpicker" name="id_subprogram">
                                <option selected disabled>Pilih sub program...</option>
                                <?php foreach($subprogram as $row) { ?>
                                <option value="<?php echo $row->id_subprogram ?>"
                                  <?php if ($data->id_subprogram == $data->id_subprogram){echo "selected";}?>>
                                  <?php echo $row->nama_subprogram ?>
                                </option>
                                <?php } ?>
                              </select>
                            </fieldset>
                            <fieldset class="form-group">
                              <p>Sumber Dana</p>
                              <input type="text" class="form-control text-capitalize" id="sumber_dana"
                                name="sumber_dana" value="<?php echo $data->sumber_dana ?>">
                            </fieldset>
                            <fieldset class="form-group">
                              <p>Jumlah Pendamping</p>
                              <input type="text" class="form-control text-capitalize" id="total_pendamping"
                                name="total_pendamping" value="<?php echo $data->total_pendamping ?>">
                            </fieldset>
                            <div class="row">
                              <div class="col-md-6">
                                <fieldset class="form-group">
                                  <p>Jenis Bantuan</p>
                                  <input type="text" class="form-control text-capitalize" id="jenis_bantuan"
                                    name="jenis_bantuan" value="<?php echo $data->jenis_bantuan ?>">
                                </fieldset>

                              </div>
                              <div class="col-md-6">
                                <fieldset class="form-group">
                                  <p>Lama inap</p>
                                  <input type="text" class="form-control text-capitalize" id="lama_inap"
                                    name="lama_inap" value="<?php echo $data->lama_inap ?>">
                                </fieldset>
                              </div>
                            </div>

                          </div>
                          <div class="col-md-12">
                                <div class="card">

                                  <h5 class="card-header">Input Data Pendaping 2 Orang</h5>

                                  <!-- /.box-tools -->
                                  <!-- /.box-header -->
                                  <div class="card-body">
                                    <div class="row">
                                      <div class="col-md-12 mb-1">
                                        <div class="row">
                                          <div class="col-md-3">
                                            <fieldset class="form-group">
                                              <p>NIK Pendamping 1</p>
                                              <select class="form-control selectpicker" style="width: 100%" name="det_ktp1" id="det_ktp1">
                                                <option selected disabled>Pilih NIK...</option>
                                                <?php foreach($datapenduduk as $row) { ?>
                                                <option class="text-capitalize" <?php if ($row->id_penduduk == $data->pendamping1){echo "selected";}?> id="peng-<?php echo $row->id_penduduk ?>" data-nama="<?php echo $row->nama ?>" data-jk="<?php echo $row->jk ?>"  value="<?php echo $row->id_penduduk ?>">
                                                <?php echo $row->nik.'-'.$row->nama ?>
                                                </option>
                                                <?php } ?>
                                              </select>
                                            </fieldset>

                                          </div>
                                          <div class="col-md-6">
                                          <fieldset class="form-group" >
                                              <p>Nama Pendaping 1</p>
                                              <input type="text" class="form-control text-capitalize" name="det_nama1"
                                                id="det_nama1" value="<?php echo $data->pen1_nama ?>" readonly>
                                            </fieldset>
                                          </div>

                                          <div class="col-md-3">
                                            <fieldset class="form-group">
                                              <p>Jenis Kelamin</p>
                                              <input type="text" class="form-control text-capitalize" name="jk1"
                                                id="jk1" value="<?php echo $data->pen1_jk ?>" readonly>
                                            </fieldset >
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-12 mb-1">
                                        <div class="row">
                                          <div class="col-md-3">
                                            <fieldset class="form-group">
                                              <p>NIK Pendamping 2</p>
                                              <select class="form-control selectpicker" style="width: 100%" name="det_ktp2" id="det_ktp2">
                                                <option selected disabled>Pilih NIK...</option>
                                                <?php foreach($datapenduduk as $row) { ?>
                                                <option class="text-capitalize"  <?php if ($row->id_penduduk == $data->pendamping2){echo "selected";}?> id="peng2-<?php echo $row->id_penduduk ?>" data-nama="<?php echo $row->nama ?>" data-jk="<?php echo $row->jk ?>"  value="<?php echo $row->id_penduduk ?>">
                                                  <?php echo $row->nik.'-'.$row->nama ?>
                                                </option>
                                                <?php } ?>
                                              </select>
                                            </fieldset>

                                          </div>
                                          <div class="col-md-6">
                                          <fieldset class="form-group" >
                                              <p>Nama Pendaping 2</p>
                                              <input type="text" class="form-control text-capitalize" name="det_nama2"
                                                id="det_nama2"value="<?php echo $data->pen2_nama ?>" readonly>
                                            </fieldset>
                                          </div>

                                          <div class="col-md-3">
                                            <fieldset class="form-group">
                                              <p>Jenis Kelamin</p>
                                              <input type="text" class="form-control text-capitalize" name="jk2"
                                                id="jk2" value="<?php echo $data->pen2_jk ?>" readonly>
                                            </fieldset >
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                        <?php echo $btn_submit ?> <?php echo $btn_back ?>
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
  $('.rekomendasi_bantuan').on('change', function () {
    if (this.value == 'Dibantu') {
      $('.ditolak').attr('hidden', false);
      $('.Dibantu').attr('hidden', false);
      $('.Disurvey').attr('hidden', true);
      $('.DatangKembali').attr('hidden', true);
      $('.LengkapiBerkas').attr('hidden', true);
      $('.rencana_bantuan').attr('disabled', false);
      $('.mekanisme_bantuan').attr('disabled', false);
    } else if (this.value == 'Disurvey') {
      $('.ditolak').attr('hidden', false);
      $('.Dibantu').attr('hidden', true);
      $('.Disurvey').attr('hidden', false);
      $('.DatangKembali').attr('hidden', true);
      $('.LengkapiBerkas').attr('hidden', true);
      $('.rencana_bantuan').attr('disabled', false);
      $('.mekanisme_bantuan').attr('disabled', false);
    } else if (this.value == 'Datang Kembali') {
      $('.ditolak').attr('hidden', false);
      $('.Dibantu').attr('hidden', true);
      $('.Disurvey').attr('hidden', true);
      $('.DatangKembali').attr('hidden', false);
      $('.LengkapiBerkas').attr('hidden', true);
      $('.rencana_bantuan').attr('disabled', false);
      $('.mekanisme_bantuan').attr('disabled', false);
    } else if (this.value == 'Lengkapi Berkas') {
      $('.ditolak').attr('hidden', false);
      $('.Dibantu').attr('hidden', true);
      $('.Disurvey').attr('hidden', true);
      $('.DatangKembali').attr('hidden', true);
      $('.LengkapiBerkas').attr('hidden', false);
      $('.rencana_bantuan').attr('disabled', false);
      $('.mekanisme_bantuan').attr('disabled', false);
    } else if (this.value == 'Ditolak') {
      $('.ditolak').attr('hidden', true);
      $('.Dibantu').attr('hidden', false);
      $('.Disurvey').attr('hidden', true);
      $('.DatangKembali').attr('hidden', true);
      $('.LengkapiBerkas').attr('hidden', true);
      $('.rencana_bantuan').attr('disabled', true);
      $('.mekanisme_bantuan').attr('disabled', true);
    }
  })
  $("#det_ktp1").change(function () {
            var ambilnama = $("#peng-"+this.value).data('nama');
            $("#det_nama1").val(ambilnama);
            var ambilnama = $("#peng-"+this.value).data('jk');
            $("#jk1").val(ambilnama);
    });
    $("#det_ktp2").change(function () {
            var ambilnama = $("#peng2-"+this.value).data('nama');
            $("#det_nama2").val(ambilnama);
            var ambilnama = $("#peng2-"+this.value).data('jk');
            $("#jk2").val(ambilnama);
    });
</script>