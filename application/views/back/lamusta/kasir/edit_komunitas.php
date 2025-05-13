<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css" integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                    <div class="card-title text-uppercase">Approval Transaksi komunitas</div>
                  </div>
                  <div class="card-content">
                    <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                    <?php echo validation_errors(); ?>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="card-body">
                              <?php echo form_open_multipart($action_kasir_komunitas) ?>
                                <input type="hidden" name="id_transaksi_komunitas" value="<?php echo $data->id_transaksi_komunitas ?>">
                                  <div class="form-body">
                                    <div class="row">
                                      <div class="col-md-12 mb-2">

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group float-right">
                                                    <span class="badge badge-success">
                                                        <div class="icheck-primary icheck-inline m-2">
                                                            <input type="radio" class="checkbox1 win" id="win" name="status" value="3" required>
                                                            <label for="win" style="font-size: 14px; color: #fff;">Setuju</label>
                                                        </div>
                                                    </span>                                                    
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="badge badge-danger">
                                                        <div class="icheck-primary icheck-inline m-2">
                                                            <input type="radio" name="status" class="checkbox2 lose" id="lose" value="4" required>
                                                            <label for="lose" style="font-size: 14px; color: #fff;">Tidak Setuju</label>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>

                                            <script type="text/javascript">
                                                $('.win').change(function() {
                                                    $('.win').prop('checked', true);
                                                    $('.lose').prop('checked', false);
                                                });
                                                $('.lose').change(function() {
                                                    $('.win').prop('checked', false);
                                                    $('.lose').prop('checked', true);
                                                });
                                            </script>                                   
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6 mb-2">

                                        <fieldset class="form-group">
                                          <p>Nama</p>
                                          <input type="text" value="<?php echo $data->nama ?>" class="form-control text-capitalize" aria-describedby="basic-addon4" readonly>
                                        </fieldset>

                                        <fieldset class="form-group mb-1 ml-1">
                                          <p>Jumlah Bantuan</p>     
                                          <div class="input-group">
                                            <div class="input-group-append">
                                              <span class="input-group-text" id="basic-addon4">Rp</span>
                                            </div>
                                            <input type="text" oninput="formatValue('jumlah_bantuan')" id="jumlah_bantuan" class="form-control jumlah_bantuan" value="<?php echo number_format($data->jumlah_bantuan) ?>" aria-describedby="basic-addon4" readonly>
                                          </div>
                                        </fieldset>
                                      </div>

                                      <div class="col-md-6 mb-2">
                                        <fieldset class="form-group">
                                          <p>Tanggal Rencana</p>
                                          <input type="date" class="form-control" value="<?php echo $data->rencana_bantuan ?>" readonly>
                                        </fieldset>

                                        <fieldset class="form-group">
                                          <p>Mekanisme Bantuan</p>
                                          <input type="text" class="form-control text-capitalize" value="<?php echo $data->mekanisme_bantuan ?>" readonly>
                                        </fieldset>

                                      </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-md">Submit</button> <?php echo $btn_back ?>
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
