<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<div class="main-panel">
  <!-- BEGIN : Main Content-->
  <div class="main-content">
    <div class="content-wrapper">
      <section class="basic-elements">
        <div class="row">
          <div class="col-sm-12">
            <div class="content-header text-capitalize">Detail Data</div>
          </div>
        </div>
        <?php if ($this->session->flashdata('message')) {
          echo $this->session->flashdata('message');
        } ?>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <a href="<?php echo base_url('komunitas/view/' . $get_all[0]->nik) ?>" class="btn btn-primary text-capitalize"><i class="fa fa-eye"></i> Lihat Data Penduduk</a>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6 text-capitalize">
                    <p class="text-bold-500 primary"><a><i class="ft ft-user"></i> Nama (Penanggung Jawab)</a></p>
                    <p class="d-block overflow-hidden"><?php echo $get_all[0]->nama ?></p>
                    <p class="text-bold-500 primary"><a><i class="ft ft-layers"></i> Nama Komunitas</a></p>
                    <p class="d-block overflow-hidden"><?php echo $get_all[0]->nama_komunitas ?></p>
                    <p class="text-bold-500 primary"><a><i class="ft ft-book"></i> Kategori Komunitas</a></p>
                    <p class="d-block overflow-hidden"><?php echo $get_all[0]->nama_kategori_komunitas ?></p>
                    <p class="text-bold-500 primary"><a><i class="ft ft-phone"></i> No Telpon</a></p>
                    <p class="d-block overflow-hidden"><?php echo $get_all[0]->no_telpon ?></p>
                  </div>
                  <div class="col-md-6 text-capitalize">
                    <p class="text-bold-500 primary"><a><i class="ft ft-file"></i> Profile Komunitas </a></p>
                    <p class="d-block overflow-hidden"><?php echo $get_all[0]->profil_komunitas ?></p>
                    <p class="text-bold-500 primary"><a><i class="ft ft-map-pin"></i> Alamat Komunitas</a></p>
                    <p class="d-block overflow-hidden"><?php echo $get_all[0]->alamat . ' ' . $get_all[0]->desa_kelurahan . ', ' . $get_all[0]->kecamatan_name . ' - ' . $get_all[0]->kota_kab . ', ' . $get_all[0]->provinsi . '. ' . $get_all[0]->negara . ' ' . $get_all[0]->kodepos ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                    <fieldset class="form-group">
                      <hr>
                      <h4 class="card-title mb-0">Legalitas</h4>
                    </fieldset>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-4 col-lg-6 col-md-6">
                    <?php if (empty($get_all[0]->legalitas_1)) { ?>
                      <img class="img-fluid image" src="<?= base_url('app-assets/img/bg.png') ?>" width="100%" />
                    <?php } else { ?>
                      <div class="container-image">
                        <img class="img-fluid image" src="<?php echo base_url('assets/lampiran/' . $get_all[0]->legalitas_1) ?>" width="100%" />
                        <div class="middle">
                          <div class="lihat">
                            <a href="<?php echo base_url('assets/lampiran/' . $get_all[0]->legalitas_1) ?>" class="btn btn-success" target="_blank"><i class="fa fa-eye"></i></a>
                            <a href="<?php echo base_url('assets/lampiran/' . $get_all[0]->legalitas_1) ?>" class="btn btn-success" target="_blank" download><i class="fa fa-download"></i></a>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                  <div class="col-xl-4 col-lg-6 col-md-6">
                    <?php if (empty($get_all[0]->legalitas_2)) { ?>
                      <img class="img-fluid image" src="<?= base_url('app-assets/img/bg.png') ?>" width="100%" />
                    <?php } else { ?>
                      <div class="container-image">
                        <img class="img-fluid image" src="<?php echo base_url('assets/lampiran/' . $get_all[0]->legalitas_2) ?>" width="100%" />
                        <div class="middle">
                          <div class="lihat">
                            <a href="<?php echo base_url('assets/lampiran/' . $get_all[0]->legalitas_2) ?>" class="btn btn-success" title="Lihat" target="_blank"><i class="fa fa-eye"></i></a>
                            <a href="<?php echo base_url('assets/lampiran/' . $get_all[0]->legalitas_2) ?>" class="btn btn-success" title="Unduh" target="_blank" download><i class="fa fa-download"></i></a>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                  <div class="col-xl-4 col-lg-6 col-md-6">
                    <?php if (empty($get_all[0]->legalitas_3)) { ?>
                      <img class="img-fluid image" src="<?= base_url('app-assets/img/bg.png') ?>" width="100%" />
                    <?php } else { ?>
                      <div class="container-image">
                        <img class="img-fluid image" src="<?php echo base_url('assets/lampiran/' . $get_all[0]->legalitas_3) ?>" width="100%" />
                        <div class="middle">
                          <div class="lihat">
                            <a href="<?php echo base_url('assets/lampiran/' . $get_all[0]->legalitas_3) ?>" class="btn btn-success" target="_blank"><i class="fa fa-eye"></i></a>
                            <a href="<?php echo base_url('assets/lampiran/' . $get_all[0]->legalitas_3) ?>" class="btn btn-success" target="_blank" download><i class="fa fa-download"></i></a>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button class="btn btn-success" onclick="history.back()">Kembali</button>
              </div>
            </div>
          </div>
        </div>

      </section>
      <br><br><br><br>
    </div>
  </div>
</div>

<?php $this->load->view('back/template/footer'); ?>

<script type="text/javascript">
  $(document).ready(function() {
    $('#datatable_1').DataTable({
      "dom": '',
      "scrollX": true,
      "scrollY": false
    });
  });
</script>