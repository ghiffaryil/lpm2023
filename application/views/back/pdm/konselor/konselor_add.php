<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar', $header); ?>

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
            <div class="card"><br>
              <div class="card-content">
                <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                <?php echo validation_errors(); ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card-body">
                      <ul class="nav nav-tabs">
                        <li class="nav-item">
                          <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1"
                            aria-expanded="true">Individu</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2"
                            aria-expanded="false">Komunitas</a>
                        </li>
                      </ul>
                      <div class="tab-content mt-4">
                        <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true"
                          aria-labelledby="base-tab1">
                          <?php echo form_open_multipart($action_individu) ?>
                          <input type="hidden" class="form-control text-capitalize" id="id_individu" name="id_individu"
                            value="<?php echo $data->id_individu ?>" readonly>
                          <div class="form-body">
                            <div class="row">
                              <div class="col-md-12">
                                <?php if ($cek_individu == 0){ ?>
                                <div class="alert alert-success alert-dismissible mb-4" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                  <strong>Warning!</strong> Nama tersebut merupakan mustahik baru.
                                </div>
                                <?php } else { ?>
                                <div class="alert alert-danger alert-dismissible mb-4" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                  <strong>Warning!</strong> Nama tersebut merupakan mustahik lama, sudah pernah
                                  mengajukan bantuan pada
                                  <?php echo date('d-m-Y H:i:s', strtotime($notif_individu[0]->created_at)) ?>.
                                </div>
                                <?php } ?>
                              </div>
                            </div>
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
                                      <p>Nama</p>
                                      <input type="text" id="nama" name="nama" value="<?php echo $data->nama ?>"
                                        class="form-control text-capitalize" aria-describedby="basic-addon4" readonly>
                                    </fieldset>
                                  </div>
                                </div>

                                <fieldset class="form-group" hidden>
                                  <p>Sifat Bantuan</p>
                                  <input type="text" class="form-control" name="sifat_bantuan"
                                    <?php if ($cek_individu == 0){echo "value='Baru'";}else{echo "value='Lama'";}?>
                                    readonly>
                                </fieldset>

                                <!-- <fieldset class="form-group">
                                  <p>Status Tinggal</p>
                                  <select type="text" class="form-control selectpicker" style="width: 100%"
                                    name="status_tinggal">
                                    <option value="" selected disabled>Pilih status tinggal...</option>
                                    <option value="Kontrak">Kontrak</option>
                                    <option value="Sendiri">Sendiri</option>
                                    <option value="Numpang">Numpang</option>
                                    <option value="Tunawisma">Tunawisma</option>
                                  </select>
                                </fieldset> -->

                                <!-- <fieldset class="form-group">
                                  <p>Kasus / Masalah</p>
                                  <textarea type="text" rows="1" class="form-control text-capitalize" id="kasus"
                                    name="kasus"></textarea>
                                </fieldset> -->
                                <fieldset class="form-group">
                                  <p>Info Bantuan</p>
                                  <select type="text" class="form-control selectpicker" style="width: 100%"
                                    name="info_bantuan">
                                    <option value="" selected disabled>Pilih nama rekomender...</option>
                                    <?php foreach($rekomender as $row) { ?>
                                    <option class="text-capitalize" value="<?php echo $row->id_rekomender ?>">
                                      <?php echo $row->jenis_rekomender.' - '.$row->nama_rekomender ?>
                                    </option>
                                    <?php } ?>
                                  </select>
                                </fieldset>
                                <fieldset class="form-group">
                                  <p>Sumber Dana</p>
                                  <input type="text" class="form-control text-capitalize" id="sumber_dana"
                                    name="sumber_dana">
                                </fieldset>

                                <div class="row">
                                  <div class="col-md-6">
                                    <fieldset class="form-group">
                                      <p>Periode Menerima Manfaat</p>
                                      <input type="date" class="form-control text-capitalize" id="periode_bantuan"
                                        name="periode_bantuan">
                                    </fieldset>
                                  </div>
                                  <div class="col-md-6">
                                    <fieldset class="form-group ditolak">
                                      <p>Total Periode</p>
                                      <input type="text" class="form-control text-capitalize mekanisme_bantuan"
                                        name="total_periode" id="total_periode" value="<?php echo $cek_individu ?>"
                                        readonly>
                                    </fieldset>
                                  </div>
                                </div>
                                <fieldset class="form-group">
                                  <p>Bidang Dan Tugas Relawan</p>
                                  <textarea type="text" rows="1" class="form-control text-capitalize" id="bidang"
                                    name="bidang_tugas"></textarea>
                                </fieldset>
                                <fieldset class="form-group">
                                  <p>PROFESI</p>
                                  <input type="text" class="form-control text-capitalize" id="profesi" name="profesi">
                                </fieldset>
                                <!-- <fieldset class="form-group">
                                  <p>Bentuk Manfaat</p>
                                  <input type="text" class="form-control text-capitalize" id="bentuk_manfaat"
                                    name="bentuk_manfaat">
                                </fieldset>

                                <fieldset class="form-group">
                                  <p>Jenis Bantuan</p>
                                  <input type="text" class="form-control text-capitalize" id="jenis_bantuan"
                                    name="jenis_bantuan">
                                </fieldset> -->

                              </div>

                              <div class="col-md-6">

                                <fieldset class="form-group mb-1">
                                  <p>Jumlah Bantuan</p>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span id="jumlah-permohonan-individu" class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" oninput="formatValue('jumlah_permohonan_individu')"
                                      id="jumlah_permohonan_individu" name="jumlah_bantuan" value="0"
                                      aria-describedby="jumlah-permohonan-individu" class="form-control">
                                  </div>
                                </fieldset>

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

                                <fieldset class="form-group" hidden>
                                  <p>Nama Program</p>
                                  <input type="text" class="form-control text-capitalize"
                                    value="<?php echo $program->nama_program ?>" readonly>
                                  <input type="hidden" class="form-control text-capitalize" id="id_program"
                                    name="id_program" value="<?php echo $program->id_program ?>">
                                </fieldset>

                                <fieldset class="form-group">
                                  <p>Sub Program</p>
                                  <select class="form-control selectpicker" name="id_subprogram">
                                    <option selected disabled>Pilih sub program...</option>
                                    <?php foreach($subprogram as $row) { ?>
                                    <option class="text-capitalize" value="<?php echo $row->id_subprogram ?>">
                                      <?php echo $row->nama_subprogram ?>
                                    </option>
                                    <?php } ?>
                                  </select>
                                </fieldset>
                                <fieldset class="form-group">
                                  <p>Jenis Bantuan</p>
                                  <input type="text" class="form-control text-capitalize" id="jenis_bantuan"
                                    name="jenis_bantuan">
                                </fieldset> 
                                <fieldset class="form-group ditolak">
                                  <p>Kopentensi</p>
                                  <input type="text" class="form-control text-capitalize mekanisme_bantuan"
                                    name="kopentensi" id="kopentensi">
                                </fieldset>

                                <!-- <fieldset class="form-group">
                                  <p>Rekomendasi Bantuan</p>
                                  <select class="form-control selectpicker rekomendasi_bantuan" style="width: 100%"
                                    name="rekomendasi_bantuan">
                                    <option value="" selected disabled>Pilih rekomendasi bantuan...</option>
                                    <option value="Dibantu">Dibantu</option>
                                    <option value="Disurvey">Disurvey</option>
                                    <option value="Lengkapi Berkas">Lengkapi Berkas</option>
                                    <option value="Datang Kembali">Datang Kembali</option>
                                    <option value="Ditolak">Ditolak</option>
                                  </select>
                                </fieldset>

                                <fieldset class="form-group ditolak">
                                  <p class="Dibantu">Tanggal Rencana Dibantu</p>
                                  <p class="DatangKembali" hidden>Tanggal Datang Kembali</p>
                                  <p class="LengkapiBerkas" hidden>Tanggal Lengkapi Berkas</p>
                                  <p class="Disurvey" hidden>Tanggal Rencana Disurvey</p>
                                  <input type="date" class="form-control rencana_bantuan" name="rencana_bantuan">
                                </fieldset> -->

                                <!-- <fieldset class="form-group ditolak">
                                  <p>Mekanisme Bantuan</p>
                                  <input type="text" class="form-control text-capitalize mekanisme_bantuan"
                                    name="mekanisme_bantuan">
                                </fieldset> -->

                              </div>

                            </div>
                            <?php echo $btn_submit ?> <?php echo $btn_back ?>
                          </div>
                          <br>
                          <?php echo form_close() ?>
                        </div>

                        <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                          <?php echo form_open_multipart($action_komunitas) ?>
                          <input type="hidden" class="form-control text-capitalize" id="id_individu" name="id_individu"
                            value="<?php echo $data->id_individu ?>" readonly>
                          <div class="form-body">
                            <div class="row">
                              <div class="col-md-12">
                                <?php if ($cek_komunitas == 0){ ?>
                                <div class="alert alert-success alert-dismissible mb-4" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                  <strong>Warning!</strong> Nama tersebut merupakan mustahik baru.
                                </div>
                                <?php } else { ?>
                                <div class="alert alert-warning alert-dismissible mb-4" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                  <strong>Warning!</strong> Nama tersebut merupakan mustahik lama, sudah pernah
                                  mengajukan bantuan pada
                                  <?php echo date('d-m-Y H:i:s', strtotime($notif_komunitas[0]->created_at)) ?>.
                                </div>
                                <?php } ?>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6 mb-1">
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
                                      <p>Nama Penanggung Jawab</p>
                                      <input type="text" class="form-control text-capitalize" name="nama"
                                        value="<?php echo $data->nama ?>" readonly>
                                    </fieldset>
                                  </div>
                                </div>

                                <fieldset class="form-group">
                                  <p>Nama Komunitas</p>
                                  <select type="text" class="form-control selectpicker" style="width: 100%"
                                    id="id_komunitas" name="id_komunitas">
                                    <option value="" selected disabled>Pilih nama komunitas...</option>
                                    <?php foreach($komunitas as $row) { ?>
                                    <option class="text-capitalize" value="<?php echo $row->id_komunitas ?>">
                                      <?php echo $row->nama_komunitas ?>
                                    </option>
                                    <?php } ?>
                                  </select>
                                </fieldset>

                                <fieldset class="form-group">
                                  <p>Rekomender</p>
                                  <select type="text" class="form-control selectpicker" style="width: 100%"
                                    name="info_bantuan">
                                    <option value="" selected disabled>Pilih nama rekomender...</option>
                                    <?php foreach($rekomender as $row) { ?>
                                    <option class="text-capitalize" value="<?php echo $row->id_rekomender ?>">
                                      <?php echo $row->jenis_rekomender.' - '.$row->nama_rekomender ?>
                                    </option>
                                    <?php } ?>
                                  </select>
                                </fieldset>
                                <fieldset class="form-group">
                                  <p>Sumber Dana</p>
                                  <input type="text" class="form-control text-capitalize" id="sumber_dana"
                                    name="sumber_dana">
                                </fieldset>

                                <div class="row">
                                  <div class="col-md-6">
                                    <fieldset class="form-group">
                                      <p>Periode Menerima Manfaat</p>
                                      <input type="date" class="form-control text-capitalize" id="periode_bantuan"
                                        name="periode_bantuan">
                                    </fieldset>
                                  </div>
                                  <div class="col-md-6">
                                    <fieldset class="form-group ditolak">
                                      <p>Total Periode</p>
                                      <input type="text" class="form-control text-capitalize mekanisme_bantuan"
                                        name="total_periode" id="total_periode" value="<?php echo $cek_komunitas ?>"
                                        readonly>
                                    </fieldset>
                                  </div>
                                </div>

                                <!-- <fieldset class="form-group">
                                  <p>Bentuk Manfaat</p>
                                  <input type="text" class="form-control text-capitalize" id="bentuk_manfaat"
                                    name="bentuk_manfaat">
                                </fieldset>

                                <fieldset class="form-group">
                                  <p>Jenis Bantuan</p>
                                  <input type="text" class="form-control text-capitalize" id="jenis_bantuan"
                                    name="jenis_bantuan">
                                </fieldset> -->



                              </div>

                              <div class="col-md-6">
                                <fieldset class="form-group" hidden>
                                  <p>Sifat Bantuan</p>
                                  <input type="text" class="form-control" name="sifat_bantuan"
                                    <?php if ($cek_komunitas == 0){echo "value='Baru'";}else{echo "value='Lama'";}?>
                                    readonly>
                                </fieldset>
                                <fieldset class="form-group mb-1">
                                  <p>Jumlah Bantuan</p>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span id="basic-addon1" class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" oninput="formatValue('jumlah_bantuan')"
                                      id="jumlah_bantuan" name="jumlah_bantuan" value="0"
                                      aria-describedby="basic-addon1" class="form-control">
                                  </div>
                                </fieldset>
                                
                                <fieldset class="form-group">
                                  <p>Jumlah Penerima Manfaat</p>
                                  <div class="input-group">
                                    <input type="number" id="jumlah_pm" name="jumlah_pm" class="form-control"
                                      aria-describedby="basic-addon3" readonly>
                                    <div class="input-group-append">
                                      <span class="input-group-text" id="basic-addon3">Orang</span>
                                    </div>
                                  </div>
                                </fieldset>
                                <!-- <fieldset class="form-group">
                                  <p>Jumlah Penerima Manfaat</p>
                                  <div class="input-group">
                                    <input type="number" id="jumlah_pm" name="jumlah_pm" class="form-control"
                                      aria-describedby="basic-addon3">
                                    <div class="input-group-append">
                                      <span class="input-group-text" id="basic-addon3">Orang</span>
                                    </div>
                                  </div>
                                </fieldset> -->

                                <fieldset class="form-group" style="margin-top: -15.8px;">
                                  <p>Asnaf</p>
                                  <select class="form-control selectpicker" style="width: 100%" name="asnaf" required>
                                    <option value="" selected disabled>Pilih asnaf...</option>
                                    <option value="Mualaf">Mualaf</option>
                                    <option value="Ghorimin">Ghorimin</option>
                                    <option value="Fisabilillah">Fisabilillah</option>
                                    <option value="Ibnu Sabil">Ibnu Sabil</option>
                                    <option value="Fakir Miskin">Fakir Miskin</option>
                                  </select>
                                </fieldset>

                                <fieldset class="form-group" hidden>
                                  <p>Nama Program</p>
                                  <input type="text" class="form-control text-capitalize"
                                    value="<?php echo $program->nama_program ?>" readonly>
                                  <input type="hidden" class="form-control text-capitalize" id="id_program"
                                    name="id_program" value="<?php echo $program->id_program ?>">
                                </fieldset>

                                <fieldset class="form-group">
                                  <p>Sub Program</p>
                                  <select class="form-control selectpicker" style="width: 100%" name="id_subprogram">
                                    <option selected disabled>Pilih sub program...</option>
                                    <?php foreach($subprogram as $row) { ?>
                                    <option class="text-capitalize" value="<?php echo $row->id_subprogram ?>">
                                      <?php echo $row->nama_subprogram ?>
                                    </option>
                                    <?php } ?>
                                  </select>
                                </fieldset>
                                <fieldset class="form-group">
                                  <p>Jenis Bantuan</p>
                                  <input type="text" class="form-control text-capitalize" id="jenis_bantuan"
                                    name="jenis_bantuan">
                                </fieldset> 
                                <!-- <fieldset class="form-group">
                                  <p>Kunjungan Ke</p>
                                  <input type="text" class="form-control text-capitalize" name="kunjungan"
                                    id="kunjungan">
                                </fieldset> -->
                              </div>
                              <div class="col-md-12">
                                <div class="card">

                                  <h5 class="card-header">Input Data Pasien</h5>

                                  <!-- /.box-tools -->
                                  <!-- /.box-header -->
                                  <div class="card-body">
                                    <div class="row">
                                      <div class="col-md-12 mb-1">
                                        <div class="row">
                                        <div class="col-md-3">
                                            <fieldset class="form-group">
                                              <p>NIK</p>
                                              <input type="text" class="form-control text-capitalize" name="det_nik"
                                                id="det_nik" value="">
                                            </fieldset>
                                          </div>
                                          <div class="col-md-3">
                                            <fieldset class="form-group">
                                              <p>Nama</p>
                                              <input type="text" class="form-control text-capitalize" name="det_nama"
                                                id="det_nama" value="">
                                            </fieldset>
                                          </div>
                                          <div class="col-md-6">
                                            <fieldset class="form-group">
                                              <p>Usia</p>
                                              <input type="text" class="form-control text-capitalize" name="usia"
                                                id="usia" value="">
                                            </fieldset>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6">
                                            <fieldset class="form-group">
                                              <p>Jenis Kelamin </p>
                                              <?php echo form_dropdown('', $jk_value, '', $jk) ?>
                                            </fieldset>
                                          </div>
                                          <div class="col-md-6">
                                            <fieldset class="form-group">
                                              <p>Status Menikah</p>
                                              <input type="text" class="form-control text-capitalize"
                                                name="status_menikah" id="status_menikah" value="">
                                            </fieldset>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6">
                                            <fieldset class="form-group">
                                              <p>Tempat Lahir </p>
                                              <input type="text" class="form-control text-capitalize"
                                                name="tempat_lahir" id="tempat_lahir">

                                            </fieldset>
                                          </div>
                                          <div class="col-md-6">
                                            <fieldset class="form-group">
                                              <p>Tanggal Lahir</p>
                                              <input type="date" class="form-control text-capitalize" name="tgl_lahir"
                                                id="tgl_lahir" value="">
                                            </fieldset>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6">
                                            <fieldset class="form-group">
                                              <p>Alamat Rumah</p>
                                              <textarea type="text" rows="1" class="form-control text-capitalize"
                                                id="alamat" name="alamat"></textarea>
                                            </fieldset>
                                          </div>

                                          <div class="col-md-6">
                                            <fieldset class="form-group">
                                              <p>Kelurahan</p>
                                              <input type="text" class="form-control text-capitalize" name="kelurahan"
                                                id="kelurahan" value="">
                                            </fieldset>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-3">
                                            <fieldset class="form-group">
                                              <p>Kecamatan </p>
                                              <input type="text" class="form-control text-capitalize" id="kecamatan"
                                                name="kecamatan" value="">
                                            </fieldset>
                                          </div>
                                          <div class="col-md-3">
                                            <fieldset class="form-group">
                                              <p>KOTA/KAB</p>
                                              <input type="text" class="form-control text-capitalize" name="kota"
                                                id="kota" value="">
                                            </fieldset>
                                          </div>
                                          <div class="col-md-6">
                                            <fieldset class="form-group">
                                              <p>Faktor Penyebab</p>
                                              <input type="text" class="form-control text-capitalize"
                                                id="faktor_penyebab" name="faktor_penyebab" value="">
                                            </fieldset>
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-md-6">
                                            <fieldset class="form-group">
                                              <p>PRA BIMBROH </p>
                                              <input type="text" class="form-control text-capitalize" id="pra_bimbroh"
                                                name="pra_bimbroh" value="">
                                            </fieldset>
                                          </div>
                                          <div class="col-md-6">
                                            <fieldset class="form-group">
                                              <p>PASCA BIMBROH</p>
                                              <input type="text" class="form-control text-capitalize"
                                                name="pasca_bimbroh" id="pasca_bimbroh" value="">
                                            </fieldset>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-actions">
                                    <button type="button" class="btn btn-primary" id="tambahitem">Tambahkan
                                      penerima</button>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="card">
                                  <!-- <div class="card-header"> -->
                                  <br>

                                  <h5 class="card-header">Data Detail</h5>
                                  <!-- /.box-tools -->
                                  <!-- /.box-header -->
                                  <div class="card-body">
                                    <div class="form-body">
                                    </div>
                                    <table class="table" id="tabelisian">
                                      <thead>
                                        <tr>
                                        <th>NIK</th>
                                          <th>Nama</th>
                                          <th>Usia</th>
                                          <th>Jenis Kelamin</th>
                                          <th>Faktor Penyebab</th>
                                          <th>Action </th>
                                        </tr>
                                      </thead>
                                      <tbody>

                                      </tbody>
                                    </table>
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
            </div>
          </div>


      </section>
      <!-- Basic Inputs end -->
    </div>
  </div>
</div>
<?php $this->load->view('back/template/footer'); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
  // $('#tgl_lahir').datepicker({
  //   autoclose: true,
  //   zIndexOffset: 9999
  // });
  // $('#periode_bantuan').datepicker({
  //       autoclose: true,
  //       zIndexOffset: 9999
  //   });
 
  var counts = 1;
  $(document).on('click', '#tambahitem', function (e) {
    var Nama = $('#det_nama').val();
    var Nik = $('#det_nik').val();
    var usia = $('#usia').val();
    var jeniskelamin = $('#jk').val();
    var tempatlahir = $('#tempat_lahir').val();
    var tgllahir = $('#tgl_lahir').val();
    var statusmenikah = $('#status_menikah ').val();
    var faktorpenyebab = $('#faktor_penyebab').val();
    var prabimroh = $('#pra_bimbroh').val();
    var pascabimroh = $('#pasca_bimbroh').val();
    var alamat = $('#alamat').val();
    var kelurahan = $('#kelurahan').val();
    var kecamatan = $('#kecamatan').val();
    var kota = $('#kota').val();
    $('#jumlah_pm').val(counts++);
    console.log(Nama);
    // var status_pengeriman = $('#id').val();

    if (Nik == "") {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Nik Tidak Boleh Kosong'

      })

    } 
    else if (Nama == "") {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Nama Tidak Boleh Kosong'

      })
    }
    else {
      tempRow = "<tr id='tr-" + Nik + "'>";
      // tempRow += "<input type='hidden' value='"+id+"' name='item_id[]'/>";
      // tempRow += "<input type='hidden' value='"+pengiriman+"' name='pengiriman[]'/>";
      tempRow += "<input type='hidden' value='" + Nik + "' name='unik[]'/>";
      tempRow += "<input type='hidden' value='" + Nama + "' name='unama[]'/>";
      tempRow += "<input type='hidden' value='" + usia + "' name='uusia[]'/>";
      tempRow += "<input type='hidden' value='" + jeniskelamin + "' name='ujeniskelamin[]'/>";
      tempRow += "<input type='hidden' value='" + tempatlahir + "' name='utempatlahir[]'/>";
      tempRow += "<input type='hidden' value='" + tgllahir + "' name='utgllahir[]'/>";
      tempRow += "<input type='hidden' value='" + faktorpenyebab + "' name='ufaktorpenyebab[]'/>";
      tempRow += "<input type='hidden' value='" + prabimroh + "' name='uprabimroh[]'/>";
      tempRow += "<input type='hidden' value='" + pascabimroh + "' name='upascabimroh[]'/>";
      tempRow += "<input type='hidden' value='" + alamat + "' name='ualamat[]'/>";
      tempRow += "<input type='hidden' value='" + kelurahan + "' name='ukelurahan[]'/>";
      // tempRow += "<input type='hidden' value='" + kelaskamar + "' name='ukelaskamar[]'/>";
      tempRow += "<input type='hidden' value='" + kecamatan + "' name='ukecamatan[]'/>";
      tempRow += "<input type='hidden' value='" + kota + "' name='ukota[]'/>";
      // tempRow += "<input type='hidden' value='" + kesan + "' name='ukesan[]'/>";


      tempRow += "<td>" + Nik + "</td><td>" + Nama + "</td><td>" + usia + "</td><td>" + jeniskelamin + "</td><td>" + faktorpenyebab +
        "</td>";
      // tempRow += "<td>"+Komoditas+"</td><td>"+Nama+"</td><td>"+berat+"</td><td>"+Price_brt+"</td>";
      // tempRow += "<td>"+row.stock_awal+"</td><td>"+row.penggunaan+"</td><td>"+row.stock_akhir+"</td><td><input class='form-control input-sm qty-text' type='number' name='req[]' value='0'/></td>";
      tempRow += "<td><a class='delete-data' id='" + Nik +
        "'><i class='ft ft-delete' data-toggle='tooltip' title='Hapus'></i></a></td></tr>";
      // alert(po_tujuan);



      // var qty = $("#txtQTY").val(); //check qty=
      $("#tabelisian tbody").append(tempRow).show('slow', function () {
        //  $('.qty-text:last').val(qty); //override qty
      });
      //reset input text and tempRow
      $('#det_nik').val('');
      $('#det_nama').val('');
      $('#usia').val('');
      $('#jk').val('');
      $('#tempat_lahir').val('');
      $('#tgl_lahir').val('');
      $('#status_menikah').val('');
      $('#faktor_penyebab').val('');
      $('#alamat').val('');
      $('#kelurahan').val('');
      $('#kecamatan').val('');
      $('#kota').val('');
      $('#kesan').val('');
      $('#pra_bimbroh').val('');
      $('#pasca_bimbroh').val('');



      tempRow = '';
    }
  })
  //delete row
  $(document).on('click', '.delete-data', function (e) {
      $('#jumlah_pm').val($('#jumlah_pm').val() - 1);
      console.log($('#jumlah_pm').val() - 1)
      var id = $(this).attr('id');
      $('#tr-' + id).remove();

    }) 
    </script>