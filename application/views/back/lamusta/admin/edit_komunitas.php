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
                    <div class="card-title text-uppercase">Edit Transaksi Komunitas</div>
                  </div>
                  <div class="card-content">
                    <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                    <?php echo validation_errors(); ?>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="card-body">
                              <?php echo form_open_multipart($action_admin_komunitas) ?>
                                <input type="hidden" name="id_transaksi_komunitas" value="<?php echo $data->id_transaksi_komunitas ?>">
                                  <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <div class="row">
                                              <div class="col-md-12">
                                                <fieldset class="form-group">
                                                  <p>Nama Komunitas</p>
                                                  <input type="text" value="<?php echo $data->nama_komunitas ?>" class="form-control text-capitalize" aria-describedby="basic-addon4" readonly>
                                                </fieldset>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6 mb-2">

                                        <fieldset class="form-group">
                                          <p>Nama Pemohon</p>
                                          <input type="text" value="<?php echo $data->nama ?>" class="form-control text-capitalize" aria-describedby="basic-addon4" readonly>
                                        </fieldset>

                                        <fieldset class="form-group">
                                          <p>Rekomendasi Bantuan</p>
                                          <select class="form-control selectpicker rekomendasi_bantuan" style="width: 100%" name="rekomendasi_bantuan">
                                            <option selected disabled>Pilih rekomendasi bantuan...</option>
                                            <option value="Dibantu" <?php if ($data->rekomendasi_bantuan == 'Dibantu'){echo "selected";} ?>>Dibantu</option>
                                            <option value="Disurvey" <?php if ($data->rekomendasi_bantuan == 'Disurvey'){echo "selected";} ?>>Disurvey</option>
                                            <option value="Lengkapi Berkas" <?php if ($data->rekomendasi_bantuan == 'Lengkapi Berkas'){echo "selected";} ?>>Lengkapi Berkas</option>
                                            <option value="Datang Kembali" <?php if ($data->rekomendasi_bantuan == 'Datang Kembali'){echo "selected";} ?>>Datang Kembali</option>
                                            <option value="Ditolak" <?php if ($data->rekomendasi_bantuan == 'Ditolak'){echo "selected";} ?>>Ditolak</option>
                                          </select>
                                        </fieldset>

                                        <fieldset class="form-group mb-1 ml-1 ditolak" <?php if ($data->rekomendasi_bantuan == 'Ditolak'){echo "hidden";} ?>>
                                          <p>Jumlah Bantuan</p>     
                                          <div class="input-group">
                                            <div class="input-group-append">
                                              <span class="input-group-text" id="basic-addon4">Rp</span>
                                            </div>
                                            <input type="text" oninput="formatValue('jumlah_bantuan')" id="jumlah_bantuan" name="jumlah_bantuan" class="form-control jumlah_bantuan" value="<?php echo number_format($data->jumlah_bantuan) ?>" aria-describedby="basic-addon4">
                                          </div>
                                        </fieldset>
                                      </div>
                                      
                                      <div class="col-md-6 mb-2">
                                        <fieldset class="form-group ditolak" <?php if ($data->rekomendasi_bantuan == 'Ditolak'){echo "hidden";} ?>>
                                          <?php if ($data->rekomendasi_bantuan == 'Dibantu'){ ?>
                                              <p class="Dibantu">Tanggal Rencana Dibantu</p>
                                              <p class="DatangKembali" hidden>Tanggal Datang Kembali</p>
                                              <p class="LengkapiBerkas" hidden>Tanggal Lengkapi Berkas</p>
                                              <p class="Disurvey" hidden>Tanggal Rencana Disurvey</p>
                                          <?php }else if($data->rekomendasi_bantuan == 'Datang Kembali'){ ?>
                                              <p class="Dibantu" hidden>Tanggal Rencana Dibantu</p>
                                              <p class="DatangKembali">Tanggal Datang Kembali</p>
                                              <p class="LengkapiBerkas" hidden>Tanggal Lengkapi Berkas</p>
                                              <p class="Disurvey" hidden>Tanggal Rencana Disurvey</p>
                                          <?php }else if($data->rekomendasi_bantuan == 'Lengkapi Berkas'){ ?>
                                              <p class="Dibantu" hidden>Tanggal Rencana Dibantu</p>
                                              <p class="DatangKembali">Tanggal Datang Kembali</p>
                                              <p class="LengkapiBerkas" hidden>Tanggal Lengkapi Berkas</p>
                                              <p class="Disurvey" hidden>Tanggal Rencana Disurvey</p>
                                          <?php }else if($data->rekomendasi_bantuan == 'Disurvey'){ ?>
                                              <p class="Dibantu" hidden>Tanggal Rencana Dibantu</p>
                                              <p class="DatangKembali" hidden>Tanggal Datang Kembali</p>
                                              <p class="LengkapiBerkas" hidden>Tanggal Lengkapi Berkas</p>
                                              <p class="Disurvey">Tanggal Rencana Disurvey</p>
                                          <?php }else if($data->rekomendasi_bantuan == 'Ditolak'){ ?>
                                              <p class="Dibantu" hidden>Tanggal Rencana Dibantu</p>
                                              <p class="DatangKembali" hidden>Tanggal Datang Kembali</p>
                                              <p class="LengkapiBerkas" hidden>Tanggal Lengkapi Berkas</p>
                                              <p class="Disurvey" hidden>Tanggal Rencana Disurvey</p>
                                          <?php } ?>
                                          <input type="date" class="form-control rencana_bantuan" name="rencana_bantuan" value="<?php echo $data->rencana_bantuan ?>">
                                        </fieldset>

                                        <fieldset class="form-group ditolak" <?php if ($data->rekomendasi_bantuan == 'Ditolak'){echo "hidden";} ?>>
                                          <p>Mekanisme Bantuan</p>
                                          <input type="text" class="form-control text-capitalize mekanisme_bantuan" name="mekanisme_bantuan" value="<?php echo $data->mekanisme_bantuan ?>">
                                        </fieldset>

                                        <fieldset class="form-group ditolak" <?php if ($data->rekomendasi_bantuan == 'Ditolak'){echo "hidden";} ?>>
                                          <p>Petugas</p>
                                          <input type="text" class="form-control text-capitalize mekanisme_bantuan" name="penyalur" value="<?php echo $data->penyalur ?>">
                                        </fieldset>

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
  $('.rekomendasi_bantuan').on('change', function(){
    if(this.value == 'Dibantu') {
      $('.ditolak').attr('hidden', false);
      $('.Dibantu').attr('hidden', false);
      $('.Disurvey').attr('hidden', true);
      $('.DatangKembali').attr('hidden', true);      
      $('.LengkapiBerkas').attr('hidden', true);
      $('.rencana_bantuan').attr('disabled', false);
      $('.mekanisme_bantuan').attr('disabled', false);
      $('.jumlah_bantuan').attr('disabled', false);
    } 
    else if(this.value == 'Disurvey') {
      $('.ditolak').attr('hidden', false);
      $('.Dibantu').attr('hidden', true);
      $('.Disurvey').attr('hidden', false);
      $('.DatangKembali').attr('hidden', true);      
      $('.LengkapiBerkas').attr('hidden', true);
      $('.rencana_bantuan').attr('disabled', false);
      $('.mekanisme_bantuan').attr('disabled', false);
      $('.jumlah_bantuan').attr('disabled', false);
    }
    else if(this.value == 'Datang Kembali') {
      $('.ditolak').attr('hidden', false);
      $('.Dibantu').attr('hidden', true);
      $('.Disurvey').attr('hidden', true);
      $('.DatangKembali').attr('hidden', false);      
      $('.LengkapiBerkas').attr('hidden', true);      
      $('.rencana_bantuan').attr('disabled', false);
      $('.mekanisme_bantuan').attr('disabled', false);
      $('.jumlah_bantuan').attr('disabled', false);
    }
    else if(this.value == 'Lengkapi Berkas') {
      $('.ditolak').attr('hidden', false);
      $('.Dibantu').attr('hidden', true);
      $('.Disurvey').attr('hidden', true);
      $('.DatangKembali').attr('hidden', true);      
      $('.LengkapiBerkas').attr('hidden', false);
      $('.rencana_bantuan').attr('disabled', false);
      $('.mekanisme_bantuan').attr('disabled', false);
      $('.jumlah_bantuan').attr('disabled', false);
    }
    else if(this.value == 'Ditolak') {
      $('.ditolak').attr('hidden', true);
      $('.Dibantu').attr('hidden', false);
      $('.Disurvey').attr('hidden', true);
      $('.DatangKembali').attr('hidden', true);      
      $('.LengkapiBerkas').attr('hidden', true);
      $('.rencana_bantuan').attr('disabled', true);
      $('.mekanisme_bantuan').attr('disabled', true);
      $('.jumlah_bantuan').attr('disabled', true);
    } 
  })
</script>
