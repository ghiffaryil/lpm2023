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
                <?php if ($this->session->flashdata('message')) {
                  echo $this->session->flashdata('message');
                } ?>
                <?php echo validation_errors(); ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card-body">
                      <!-- <ul class="nav nav-tabs">
                        <li class="nav-item">
                          <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1"
                            aria-expanded="true">Individu</a>
                        </li>
                      </ul> -->
                      <div class="tab-content mt-4">
                        <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                          <?php echo form_open_multipart($action_individu) ?>
                          <input type="hidden" class="form-control text-capitalize" id="id_individu" name="id_individu" value="<?php echo $data->id_individu ?>" readonly>
                          <div class="form-body">
                            <div class="row">
                              <div class="col-md-12">
                                <?php if ($cek_individu == 0) { ?>
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
                                      <input type="text" class="form-control text-capitalize" id="nik" name="nik" value="<?php echo $data->nik ?>" readonly>
                                    </fieldset>
                                  </div>
                                  <div class="col-md-6">
                                    <fieldset class="form-group">
                                      <p>Nama Passien</p>
                                      <input type="text" id="nama" name="nama" value="<?php echo $data->nama ?>" class="form-control text-capitalize" aria-describedby="basic-addon4" readonly>
                                    </fieldset>
                                  </div>
                                </div>

                                <fieldset class="form-group" hidden>
                                  <p>Sifat Bantuan</p>
                                  <input type="text" class="form-control" name="sifat_bantuan" <?php if ($cek_individu == 0) {
                                                                                                  echo "value='Baru'";
                                                                                                } else {
                                                                                                  echo "value='Lama'";
                                                                                                } ?> readonly>
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
                                  <select type="text" class="form-control selectpicker" style="width: 100%" name="info_bantuan">
                                    <option value="" selected disabled>Pilih nama rekomender...</option>
                                    <?php foreach ($rekomender as $row) { ?>
                                      <option class="text-capitalize" value="<?php echo $row->id_rekomender ?>">
                                        <?php echo $row->jenis_rekomender . ' - ' . $row->nama_rekomender ?>
                                      </option>
                                    <?php } ?>
                                  </select>
                                </fieldset>
                                <!-- <fieldset class="form-group">
                                  <p>Jumlah Anggota Keluarga</p>
                                  <input type="number" class="form-control text-capitalize" id="jumlah_kk"
                                    name="jumlah_kk">
                                </fieldset> -->
                                <fieldset class="form-group">
                                  <p>Jumlah Penghasilan Perbulan</p>
                                  <input type="number" class="form-control text-capitalize" id="bentuk_manfaat" name="penghasilan_bulan">
                                </fieldset>
                                <div class="row">
                                  <div class="col-md-6">
                                    <fieldset class="form-group ditolak">
                                      <p>Periode Penerima Bantuan</p>
                                      <input type="date" class="form-control text-capitalize periode_bantuan " name="periode_bantuan" id="periode_bantuan">
                                    </fieldset>
                                  </div>
                                  <div class="col-md-6">
                                    <fieldset class="form-group">
                                      <p>Total Periode</p>
                                      <input type="text" class="form-control text-capitalize periode_bantuan " name="total_periode" id="total_periode" value="<?php echo (int)$cek_individu + 1 ?>" readonly>
                                    </fieldset>
                                  </div>
                                </div>
                                <fieldset class="form-group">
                                  <p>Penyakit</p>
                                  <input type="text" class="form-control text-capitalize" id="penyakit" name="penyakit">
                                </fieldset>


                              </div>

                              <div class="col-md-6">

                                <!-- <fieldset class="form-group mb-1">
                                  <p>Pengajuan</p>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span id="jumlah-permohonan-individu" class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" oninput="formatValue('jumlah_permohonan_individu')"
                                      id="jumlah_permohonan_individu" name="jumlah_permohonan" value="0"
                                      aria-describedby="jumlah-permohonan-individu" class="form-control">
                                  </div>
                                </fieldset> -->

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
                                  <input type="text" class="form-control text-capitalize" value="<?php echo $program->nama_program ?>" readonly>
                                  <input type="hidden" class="form-control text-capitalize" id="id_program" name="id_program" value="<?php echo $program->id_program ?>">
                                </fieldset>

                                <fieldset class="form-group">
                                  <p>Sub Program</p>
                                  <select class="form-control selectpicker" name="id_subprogram">
                                    <option selected disabled>Pilih sub program...</option>
                                    <?php foreach ($subprogram as $row) { ?>
                                      <option class="text-capitalize" value="<?php echo $row->id_subprogram ?>">
                                        <?php echo $row->nama_subprogram ?>
                                      </option>
                                    <?php } ?>
                                  </select>
                                </fieldset>
                                <fieldset class="form-group">
                                  <p>Sumber Dana</p>
                                  <input type="text" class="form-control text-capitalize" id="sumber_dana" name="sumber_dana">
                                </fieldset>
                                <fieldset class="form-group">
                                  <p>Jumlah Pendamping</p>
                                  <input type="text" class="form-control text-capitalize" id="total_pendamping" name="total_pendamping">
                                </fieldset>
                                <div class="row">
                                  <div class="col-md-6">
                                    <fieldset class="form-group">
                                      <p>Jenis Bantuan</p>
                                      <input type="text" class="form-control text-capitalize" id="jenis_bantuan" name="jenis_bantuan">
                                    </fieldset>

                                  </div>
                                  <div class="col-md-6">
                                    <fieldset class="form-group">
                                      <p>Lama inap</p>
                                      <input type="text" class="form-control text-capitalize" id="lama_inap" name="lama_inap">
                                    </fieldset>
                                  </div>
                                </div>
                                <!-- <fieldset class="form-group">
                                  <p>Rekomendasi</p>
                                  <input type="text" class="form-control text-capitalize" id="rekomendasi"
                                    name="rekomendasi">
                                </fieldset> -->
                                <!--
                                <fieldset class="form-group">
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
                                </fieldset> -->

                                <!-- <fieldset class="form-group ditolak">
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
                                                <?php foreach ($datapenduduk as $row) { ?>
                                                  <option class="text-capitalize" id="peng-<?php echo $row->id_penduduk ?>" data-nama="<?php echo $row->nama ?>" data-jk="<?php echo $row->jk ?>" value="<?php echo $row->id_penduduk ?>">
                                                    <?php echo $row->nik . '-' . $row->nama ?>
                                                  </option>
                                                <?php } ?>
                                              </select>
                                            </fieldset>

                                          </div>
                                          <div class="col-md-6">
                                            <fieldset class="form-group">
                                              <p>Nama Pendaping 1</p>
                                              <input type="text" class="form-control text-capitalize" name="det_nama1" id="det_nama1" value="" readonly>
                                            </fieldset>
                                          </div>

                                          <div class="col-md-3">
                                            <fieldset class="form-group">
                                              <p>Jenis Kelamin</p>
                                              <input type="text" class="form-control text-capitalize" name="jk1" id="jk1" value="" readonly>
                                            </fieldset>
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
                                                <?php foreach ($datapenduduk as $row) { ?>
                                                  <option class="text-capitalize" id="peng2-<?php echo $row->id_penduduk ?>" data-nama="<?php echo $row->nama ?>" data-jk="<?php echo $row->jk ?>" value="<?php echo $row->id_penduduk ?>">
                                                    <?php echo $row->nik . '-' . $row->nama ?>
                                                  </option>
                                                <?php } ?>
                                              </select>
                                            </fieldset>

                                          </div>
                                          <div class="col-md-6">
                                            <fieldset class="form-group">
                                              <p>Nama Pendaping 2</p>
                                              <input type="text" class="form-control text-capitalize" name="det_nama2" id="det_nama2" value="" readonly>
                                            </fieldset>
                                          </div>

                                          <div class="col-md-3">
                                            <fieldset class="form-group">
                                              <p>Jenis Kelamin</p>
                                              <input type="text" class="form-control text-capitalize" name="jk2" id="jk2" value="" readonly>
                                            </fieldset>
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
            </div>
          </div>


      </section>
      <!-- Basic Inputs end -->
    </div>
  </div>
</div>
<?php $this->load->view('back/template/footer'); ?>

<script type="text/javascript">
  $('.rekomendasi_bantuan').on('change', function() {
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
  $("#det_ktp1").change(function() {
    var ambilnama = $("#peng-" + this.value).data('nama');
    $("#det_nama1").val(ambilnama);
    var ambilnama = $("#peng-" + this.value).data('jk');
    $("#jk1").val(ambilnama);
  });
  $("#det_ktp2").change(function() {
    var ambilnama = $("#peng2-" + this.value).data('nama');
    $("#det_nama2").val(ambilnama);
    var ambilnama = $("#peng2-" + this.value).data('jk');
    $("#jk2").val(ambilnama);
  });
  $(document).on('click', '#tambahitem', function(e) {
    var nik = $('#det_ktp').val();
    var Nama = $('#det_nama').val();
    var JenisPasal = $('#det_jenis_pasal').val();
    var PidanaKeterangan = $('#det_pidana_keterangan').val();
    var Masahukuman = $('#det_masahukuman').val();
    var Blok = $('#det_blok').val();

    console.log(nik);
    // var status_pengeriman = $('#id').val();

    tempRow = "<tr id='tr-" + nik + "'>";
    tempRow += "<input type='hidden' value='" + nik + "' name='unik[]'/>";
    // tempRow += "<input type='hidden' value='"+id+"' name='item_id[]'/>";
    // tempRow += "<input type='hidden' value='"+pengiriman+"' name='pengiriman[]'/>";
    tempRow += "<input type='hidden' value='" + Nama + "' name='unama[]'/>";
    tempRow += "<input type='hidden' value='" + JenisPasal + "' name='ujenispasal[]'/>";
    tempRow += "<input type='hidden' value='" + PidanaKeterangan + "' name='uketerangan[]'/>";
    tempRow += "<input type='hidden' value='" + Masahukuman + "' name='umasahukuman[]'/>";
    tempRow += "<input type='hidden' value='" + Blok + "' name='ublok[]'/>";


    tempRow += "<td>" + nik + "</td><td>" + Nama + "</td><td>" + JenisPasal + "</td>";
    // tempRow += "<td>"+Komoditas+"</td><td>"+Nama+"</td><td>"+berat+"</td><td>"+Price_brt+"</td>";
    // tempRow += "<td>"+row.stock_awal+"</td><td>"+row.penggunaan+"</td><td>"+row.stock_akhir+"</td><td><input class='form-control input-sm qty-text' type='number' name='req[]' value='0'/></td>";
    tempRow += "<td><a class='delete-data' id='" + nik + "'><i class='ft ft-delete' data-toggle='tooltip' title='Hapus'></i></a></td></tr>";
    // alert(po_tujuan);



    // var qty = $("#txtQTY").val(); //check qty=
    $("#tabelisian tbody").append(tempRow).show('slow', function() {
      //  $('.qty-text:last').val(qty); //override qty
    });
    //reset input text and tempRow
    $('#det_ktp').val('');
    $('#det_nama').val('');
    $('#det_jenis_pasal').val('');
    $('#det_pidana_keterangan').val('');
    $('#det_masahukuman').val('');
    $('#det_blok').val('');

    tempRow = '';
  })
  //delete row
  $(document).on('click', '.delete-data', function(e) {
    var id = $(this).attr('id');
    $('#tr-' + id).remove();
  })
</script>